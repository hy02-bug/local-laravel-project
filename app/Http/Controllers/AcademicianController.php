<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use App\Models\Grant;
use Illuminate\Http\Request;

class AcademicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('academicians.index', [
            'academicians' => Academician::paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('academicians.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Create a new Product record
                Academician::create([
                'Name' => $request->Name,
                'Email' => $request->Email,
                'College' => $request->College,
                'Department' => $request->Department,
                'Position' => $request->Position,
            ]);

    //      Redirect back with a success message
                return redirect()->route('academicians.index')->with('success', 'Grant created successfully!');
                } catch (\Exception $e) {
    //     // Redirect back with an error message in case of failure
                return redirect()->back()->with('error', 'Failed to create grant. Error: ' . $e->getMessage());
                }
    }

    /**
     * Display the specified resource.
     */
    public function show(Academician $academician)
    {
        $grants = $academician->grants;

        return view('academicians.show', compact('academician', 'grants'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Academician $academician)

    {
        $this->authorize('update', $academician);
        return view('academicians.edit', compact('academician'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academician $academician)
    {
        $this->authorize('update', $academician);
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => 'required|email|unique:academicians,Email,' . $academician->id,
            'College' => 'required|string',
            'Department' => 'required|string',
            'Position' => 'required|string',
        ]);

        $academician->update($validated);

        return redirect()->route('academicians.index')->with('success', 'Academician updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academician $academician)
    {
        $academician->delete();

        return redirect()->route('academicians.index')->with('success', 'Deleted successfully.');
    }

    public function search(Request $request)
{
    $query = $request->input('q'); // Search term from Select2
    $academicians = Academician::where('Name', 'like', '%' . $query . '%')
        ->limit(10) // Limit results for better performance
        ->get(['id', 'Name']); // Return only necessary fields (id and Name)

    return response()->json($academicians); // Return results as JSON
}


}
