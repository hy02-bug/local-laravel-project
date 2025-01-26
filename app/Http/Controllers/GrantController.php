<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use App\Models\Academician;
use App\Models\Milestone;
use Illuminate\Http\Request;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('grants.index', [
            'grants' => Grant::paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academicians = Academician::all(); // Fetch all users or filter based on role
        return view('grants.create', compact('academicians'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // // Validate the input data
        //   $validatedData = $request->validate([
        //   'Title' => 'required|string|max:255',
        //     'Amount' => 'required|numeric|min:0',
        //     'Provider' => 'required|string|max:255',
        //     'Start_Date' => 'required|date',
        //     'Duration_months' => 'required|integer|min:1',
        //      'project_leader_id' => 'required|exists:academicians,id', // Ensure project leader exists
        //     // 'project_members' => 'required|array|min:1',
        //     // 'project_members.*' => 'exists:academicians,id',
        //  ]);

            try {
                // Create a new Product record
                    Grant::create([
                    'Title' => $request->Title,
                    'Amount' => $request->Amount,
                    'Provider' => $request->Provider,
                    'Start_Date' => $request->Start_Date,
                    'Duration_months' => $request->Duration_months,
                    'project_leader_id' => $request->project_leader_id,
                ]);

        //      Redirect back with a success message
                    return redirect()->route('grants.index')->with('success', 'Grant created successfully!');
                    } catch (\Exception $e) {
        //     // Redirect back with an error message in case of failure
                    return redirect()->back()->with('error', 'Failed to create grant. Error: ' . $e->getMessage());
                    }
        // // Attach project members to the grant
        // // $grant->projectMember()->attach($validatedData['project_members']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Grant $grant)
    {
         // Eager load
                $grant->load('projectLeader','projectMember'); // Eager-load subjects
                $academicians = Academician::all();
                $grant->load('milestone');
                $milestones = Milestone::all();
                return view('grants.show', compact('grant', 'academicians','milestones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grant $grant)
    {
        return view('grants.edit', compact('grant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grant $grant)
    {
            // Validate the input data
            $validated = $request->validate([
            'Title' => 'required|string|max:255',
            'Amount' => 'required|decimal:2|min:0', // Ensure Amount is numeric and non-negative
            'Provider' => 'required|string|max:255', // Provider should be a string with a max length
            'Start_Date' => 'required|date', // Ensure Start_Date is a valid date
            'Duration_months' => 'required|integer|min:1', // Ensure Duration_months is an integer >= 1
            ]);

        $grant->update($validated);

        return redirect()->route('grants.show',$grant->id)->with('success', 'Grant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grant $grant)
    {
        $grant->delete();

        return redirect()->route('grants.index')->with('success', 'Grant deleted successfully.');
    }

    public function editLeader(Grant $grant)
    {
        $academicians = Academician::all(); // Fetch all academician options
        return view('grants.editLeader', compact('grant', 'academicians'));
    }

    /**
     * Update the project leader.
     */
    public function updateLeader(Request $request, Grant $grant)
    {
        $validated = $request->validate([
            'project_leader_id' => 'required|exists:academicians,id',
        ]);

        $grant->update(['project_leader_id' => $validated['project_leader_id']]);

        return redirect()->route('grants.show', $grant->id)->with('success', 'Project Leader updated successfully.');
    }

    /**
     * Show the form for adding project members.
     */
    public function showAddMemberForm(Grant $grant)
    {
        $currentMemberIds = $grant->projectMember()->pluck('academicians.id')->toArray();
        $excludeIds = $currentMemberIds;
        if ($grant->project_leader_id) {
            $excludeIds[] = $grant->project_leader_id;
        }

        $availableAcademicians = Academician::whereNotIn('id', $excludeIds)->get();

        return view('grants.showAddMemberForm', compact('grant', 'availableAcademicians'));
    }


    /**
     * Remove a member from the grant.
     */
    public function removeMember(Grant $grant, Academician $academician)
    {
        // Detach the academician from the grant
        $grant->projectMember()->detach($academician->id);

        // Redirect back to the grant's detail page
        return redirect()->route('grants.show', $grant->id)
            ->with('success', 'Member removed successfully.');
    }
    /**
     * Store members for the grant.
     */public function storeMember(Request $request, Grant $grant)
{
    // Validate the input
    $validated = $request->validate([
        'project_member' => 'required|exists:academicians,id',
    ]);

    // Check grant ID is not null
    if (!$grant->id) {
        return redirect()->back()->withErrors('Grant not found.');
    }

    // Attach the member to the grant
    $grant->projectMember()->attach($validated['project_member']);

    // Redirect back with success message
    return redirect()->route('grants.show', $grant->id)
                    ->with('success', 'Project member added successfully.');
}


}
