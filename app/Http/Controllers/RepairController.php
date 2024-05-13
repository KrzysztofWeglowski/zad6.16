<?php

// app/Http/Controllers/RepairController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repair;
use App\Models\Device;
use App\Models\Client;

class RepairController extends Controller
{
    public function index()
    {
        $repairs = Repair::with(['device.client'])->get();
        $devices = Device::all();
        return view('repairs.index', compact('repairs', 'devices'));
    }

    public function update(Request $request, Repair $repair)
    {
        $validatedData = $request->validate([
            // client table
            'description' => 'required|string|max:255',
            'repair_date' => 'required|date',
            'repair_cost' => 'required|numeric|min:0',

            // Devices table
            'device.model' => 'required|string|max:255',
            'device.brand' => 'required|string|max:255',
            'device.serial_number' => 'required|string|max:255',
            'device.warranty_expiry_date' => 'required|date',
            'device.warranty_provider' => 'required|string|max:255',
            'device.warranty_claim_number' => 'required|string|max:255',
            // client table
            'device.client.name' => 'required|string|max:255',
            'device.client.email' => 'required|string|max:255',
            'device.client.phone' => 'required|numeric|min:100000000',
            'device.client.address' => 'required|string|max:255',

        ]);

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




        return redirect()->route('repairs.index')->with('success', 'Repair updated successfully.');
    }

public function destroy(Repair $repair)
    {
        $repair->delete();
        return redirect()->route('repairs.index')->withSuccess('Repair deleted successfully.');
    }

    public function edit(Repair $repair)
    {
        return view('repairs.edit', compact('repair'));
    }

    public function create()
{
    return view('repairs.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'description' => 'required|string|max:255',
        'repair_date' => 'required|date',
        'repair_cost' => 'required|numeric|min:0',

        'device_model' => 'required|string|max:255',
        'device_brand' => 'required|string|max:255',
        'device_serial_number' => 'required|string|max:255',
        'device_warranty_expiry_date' => 'required|date',
        'device_warranty_provider' => 'required|string|max:255',
        'device_warranty_claim_number' => 'required|string|max:255',

        'client_name' => 'required|string|max:255',
        'client_email' => 'required|string|max:255',
        'client_phone' => 'required|numeric|min:100000000',
        'client_address' => 'required|string|max:255',
    ]);

    
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
    return redirect()->route('repairs.index')->with('success', 'Repair created successfully.');
}





}
