<?php

// app/Http/Controllers/ServiceController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

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
            'img' => 'nullable|string|max:255',
        ]);

        Service::create($validatedData);

        return redirect()->route('RepairVault.main')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified service.
     */
    public function show(Service $service)
    {
        return view('RepairVault.show', compact('service'));
    }

    /**
     * Display the form for editing the specified service.
     */
    public function edit(Service $service)
    {
        return view('RepairVault.edit', compact('service'));
    }

    /**
     * Update the specified service in the storage.
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:1',
            'img' => 'nullable|string|max:255',
        ]);

        $service->update($validatedData);

        return redirect()->route('RepairVault.main')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified service from the storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('RepairVault.main')->with('success', 'Service deleted successfully.');
    }

    //...
}
