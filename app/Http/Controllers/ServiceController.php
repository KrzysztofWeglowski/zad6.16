<?php

// app/Http/Controllers/ServiceController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Display a listing of the resource.
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
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:1',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $validatedData['img'] = $this->uploadImage($request->file('img'));
        }

        Service::create($validatedData);

        return redirect()->route('RepairVault.main')->with('success', 'Service created successfully.');
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:1',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $validatedData['img'] = $this->uploadImage($request->file('img'));
        }

        $service->update($validatedData);

        return redirect()->route('RepairVault.main')->with('success', 'Service updated successfully.');
    }
    public function destroy(Service $service)
    {
        
            $service->delete();
            return redirect()->route('RepairVault.main')->with('success', 'Service updated successfully.');       
    }

    private function uploadImage($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('public/images', $imageName);
        return $imageName;
    }

    public function search(Request $request)
    {
        $services = Service::where('name', 'like', '%' . $request->input('search') . '%')
            ->orWhere('description', 'like', '%' . $request->input('search') . '%')
            ->orWhere('price', 'like', '%' . $request->input('search') . '%')
            ->get();

        return view('RepairVault.main', compact('services'));
    }
    public function edit(Request $request, Service $service)
    {
        return view('RepairVault.edit', compact('service'));
    }
}