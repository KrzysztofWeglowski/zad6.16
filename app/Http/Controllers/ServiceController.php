<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Wyświetla listę zasobów.
     */
    public function index()
    {
        $services = Service::all();

        return view('RepairVault.main', [
            'services' => $services
        ]);
    }

    public function create()
    {
        return view('RepairVault.create');
    }

    /**
     * Przechowuje nowo utworzoną usługę w magazynie.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:1',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'name.required' => 'Pole nazwa jest wymagane.',
            'name.string' => 'Nazwa musi być ciągiem znaków.',
            'name.max' => 'Nazwa nie może przekraczać 255 znaków.',
            'price.numeric' => 'Cena musi być liczbą.',
            'price.min' => 'Cena musi wynosić co najmniej 1.',
            'img.image' => 'Plik musi być obrazem.',
            'img.mimes' => 'Obraz musi być w formacie: jpg, jpeg, png.',
            'img.max' => 'Obraz nie może przekraczać 2048 kilobajtów.',
        ]);

        if ($request->hasFile('img')) {
            $validatedData['img'] = $this->uploadImage($request->file('img'));
        }

        Service::create($validatedData);

        return redirect()->route('RepairVault.main')->with('success', 'Usługa utworzona pomyślnie.');
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:1',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'name.required' => 'Pole nazwa jest wymagane.',
            'name.string' => 'Nazwa musi być ciągiem znaków.',
            'name.max' => 'Nazwa nie może przekraczać 255 znaków.',
            'price.numeric' => 'Cena musi być liczbą.',
            'price.min' => 'Cena musi wynosić co najmniej 1.',
            'img.image' => 'Plik musi być obrazem.',
            'img.mimes' => 'Obraz musi być w formacie: jpg, jpeg, png.',
            'img.max' => 'Obraz nie może przekraczać 2048 kilobajtów.',
        ]);

        if ($request->hasFile('img')) {
            // Usunięcie starego obrazu, jeśli istnieje
            if ($service->img && Storage::exists('public/images/' . $service->img)) {
                Storage::delete('public/images/' . $service->img);
            }

            $validatedData['img'] = $this->uploadImage($request->file('img'));
        }

        $service->update($validatedData);

        return redirect()->route('RepairVault.main')->with('success', 'Usługa zaktualizowana pomyślnie.');
    }

    public function destroy(Service $service)
    {
        // Usunięcie obrazu, jeśli istnieje
        if ($service->img && Storage::exists('public/images/' . $service->img)) {
            Storage::delete('public/images/' . $service->img);
        }

        $service->delete();

        return redirect()->route('RepairVault.main')->with('success', 'Usługa usunięta pomyślnie.');
    }

    private function uploadImage($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        return $imageName;
    }

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'search' => 'required|string|max:255',
        ], [
            'search.required' => 'Pole wyszukiwania jest wymagane.',
            'search.string' => 'Wyszukiwanie musi być ciągiem znaków.',
            'search.max' => 'Wyszukiwanie nie może przekraczać 255 znaków.',
        ]);

        $services = Service::where('name', 'like', '%' . $validatedData['search'] . '%')
            ->orWhere('description', 'like', '%' . $validatedData['search'] . '%')
            ->orWhere('price', 'like', '%' . $validatedData['search'] . '%')
            ->get();

        return view('RepairVault.main', compact('services'));
    }

    public function edit(Service $service)
    {
        return view('RepairVault.edit', compact('service'));
    }
}
