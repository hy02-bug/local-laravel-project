<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            return view('milestones.index', [
                'milestones' => Milestone::paginate(25),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('milestones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Milestone $milestone)
    {
        // Validate the input data
        $validated = $request->validate([
            // 'grant_id' => 'required|exists:grants,id', // Ensure grant_id exists in the grants table
            'milestone_name' => 'required|string|max:255',
            'target_completion_date' => 'required|date',
            'deliverable' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'remark' => 'nullable|string|max:255',
        ]);

        try {
            // Create a new Milestone record
            Milestone::create($validated);

           // Redirect based on the source parameter
        if ($request->has('source') && $request->input('source') === 'grant.show') {
            return redirect()->route('milestones.index')
                            ->with('success', 'Milestone created successfully.');
        }
        } catch (\Exception $e) {
            // Redirect back with an error message in case of failure
            return redirect('milestones.index')->back()->with('error', 'Failed to create milestone. Error: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Milestone $milestone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Milestone $milestone)
    {
        return view('milestones.edit', compact('milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        // Validate the input data
        $validated = $request->validate([
            'milestone_name' => 'required|string|max:255',
            'target_completion_date' => 'required|date',
            'deliverable' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'remark' => 'nullable|string|max:255',
        ]);

        // Update the milestone
        $milestone->update($validated);

        // Redirect based on the source parameter
        if ($request->has('source') && $request->input('source') === 'grant.show') {
            return redirect()->route('grants.show', $milestone->grant_id)
                            ->with('success', 'Milestone updated successfully.');
        }

        // Default redirection to milestones.index
        return redirect()->route('milestones.index')->with('success', 'Milestone updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        $milestone->delete();

        return redirect()->route('milestones.index')->with('success', 'Grant deleted successfully.');
    }
}
