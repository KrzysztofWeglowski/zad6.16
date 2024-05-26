<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repair;
use App\Models\Device;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class RepairController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $repairs = Repair::with(['device.client'])
            ->when($search, function ($query) use ($search) {
                $query->where('description', 'like', "%{$search}%")
                    ->orWhereHas('device', function ($query) use ($search) {
                        $query->where('model', 'like', "%{$search}%")
                            ->orWhere('brand', 'like', "%{$search}%")
                            ->orWhere('serial_number', 'like', "%{$search}%");
                    })
                    ->orWhereHas('device.client', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('phone', 'like', "%{$search}%")
                            ->orWhere('address', 'like', "%{$search}%");
                    });
            })
            ->get();

        return view('repairs.index', compact('repairs'));
    }

    public function update(Request $request, Repair $repair)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'repair_date' => 'required|date',
            'repair_cost' => 'required|numeric|min:0',
            'device.model' => 'required|string|max:255',
            'device.brand' => 'required|string|max:255',
            'device.serial_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('devices', 'serial_number')->ignore($repair->device->id),
            ],
            'device.warranty_expiry_date' => 'required|date',
            'device.warranty_provider' => 'required|string|max:255',
            'device.warranty_claim_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('devices', 'warranty_claim_number')->ignore($repair->device->id),
            ],
            'device.client.name' => 'required|string|max:255',
            'device.client.email' => 'required|string|email|max:255',
            'device.client.phone' => 'required|numeric|digits_between:9,15',
            'device.client.address' => 'required|string|max:255',
        ], $this->messages(), $this->attributes());

        try {
            DB::beginTransaction();

            $repair->update([
                'description' => $validatedData['description'],
                'repair_date' => $validatedData['repair_date'],
                'repair_cost' => $validatedData['repair_cost'],
            ]);

            $repair->device->update([
                'model' => $validatedData['device']['model'],
                'brand' => $validatedData['device']['brand'],
                'serial_number' => $validatedData['device']['serial_number'],
                'warranty_expiry_date' => $validatedData['device']['warranty_expiry_date'],
                'warranty_provider' => $validatedData['device']['warranty_provider'],
                'warranty_claim_number' => $validatedData['device']['warranty_claim_number'],
            ]);

            $repair->device->client->update([
                'name' => $validatedData['device']['client']['name'],
                'email' => $validatedData['device']['client']['email'],
                'phone' => $validatedData['device']['client']['phone'],
                'address' => $validatedData['device']['client']['address'],
            ]);

            DB::commit();

            return redirect()->route('repairs.index')->with('success', 'Naprawa została pomyślnie zaktualizowana.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Nie udało się zaktualizować naprawy. Proszę spróbować ponownie.');
        }
    }

    public function destroy(Repair $repair)
    {
        $repair->delete();
        return redirect()->route('repairs.index')->with('success', 'Naprawa została pomyślnie usunięta.');
    }

    public function edit(Repair $repair)
    {
        $deviceModels = Device::distinct('model')->pluck('model');
        $deviceBrands = Device::distinct('brand')->pluck('brand');
        $warrantyProviders = Device::distinct('warranty_provider')->pluck('warranty_provider');
        return view('repairs.edit', compact('repair', 'deviceModels', 'deviceBrands', 'warrantyProviders'));
    }

    public function create()
    {
        $deviceModels = Device::distinct('model')->pluck('model');
        $deviceBrands = Device::distinct('brand')->pluck('brand');
        $warrantyProviders = Device::distinct('warranty_provider')->pluck('warranty_provider');
        return view('repairs.create', compact('deviceModels', 'deviceBrands', 'warrantyProviders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'repair_date' => 'required|date',
            'repair_cost' => 'required|numeric|min:0',
            'device_model' => 'required|string|max:255',
            'device_brand' => 'required|string|max:255',
            'device_serial_number' => 'required|string|max:255|unique:devices,serial_number',
            'device_warranty_expiry_date' => 'required|date',
            'device_warranty_provider' => 'required|string|max:255',
            'device_warranty_claim_number' => 'required|string|max:255|unique:devices,warranty_claim_number',
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|string|email|max:255',
            'client_phone' => 'required|numeric|digits_between:9,15',
            'client_address' => 'required|string|max:255',
        ], $this->messages(), $this->attributes());

        try {
            DB::beginTransaction();

            $client = Client::create([
                'name' => $validatedData['client_name'],
                'email' => $validatedData['client_email'],
                'phone' => $validatedData['client_phone'],
                'address' => $validatedData['client_address'],
            ]);

            $device = Device::create([
                'model' => $validatedData['device_model'],
                'brand' => $validatedData['device_brand'],
                'serial_number' => $validatedData['device_serial_number'],
                'warranty_expiry_date' => $validatedData['device_warranty_expiry_date'],
                'warranty_provider' => $validatedData['device_warranty_provider'],
                'warranty_claim_number' => $validatedData['device_warranty_claim_number'],
                'client_id' => $client->id,
            ]);

            $repair = Repair::create([
                'description' => $validatedData['description'],
                'repair_date' => $validatedData['repair_date'],
                'repair_cost' => $validatedData['repair_cost'],
                'device_id' => $device->id,
            ]);

            DB::commit();

            return redirect()->route('repairs.index')->with('success', 'Naprawa została pomyślnie utworzona.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Nie udało się utworzyć naprawy. Proszę spróbować ponownie.');
        }
    }

    protected function messages()
    {
        return [
            'required' => 'Pole :attribute jest wymagane.',
            'string' => 'Pole :attribute musi być ciągiem znaków.',
            'max' => 'Pole :attribute nie może być dłuższe niż :max znaków.',
            'date' => 'Pole :attribute musi być prawidłową datą.',
            'numeric' => 'Pole :attribute musi być liczbą.',
            'min' => 'Pole :attribute musi mieć wartość co najmniej :min.',
            'email' => 'Pole :attribute musi być prawidłowym adresem e-mail.',
            'unique' => 'Pole :attribute musi być unikalne.',
            'digits_between' => 'Pole :attribute musi mieć od :min do :max cyfr.',
        ];
    }

    protected function attributes()
    {
        return [
            'description' => 'Opis',
            'repair_date' => 'Data naprawy',
            'repair_cost' => 'Koszt naprawy',
            'device_model' => 'Model urządzenia',
            'device_brand' => 'Marka urządzenia',
            'device_serial_number' => 'Numer seryjny urządzenia',
            'device_warranty_expiry_date' => 'Data wygaśnięcia gwarancji urządzenia',
            'device_warranty_provider' => 'Dostawca gwarancji urządzenia',
            'device_warranty_claim_number' => 'Numer gwarancji urządzenia',
            'client_name' => 'Imię i nazwisko klienta',
            'client_email' => 'Email klienta',
            'client_phone' => 'Telefon klienta',
            'client_address' => 'Adres klienta',
        ];
    }
}
