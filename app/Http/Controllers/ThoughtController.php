<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageThoughts;
use App\Thought;
use Illuminate\Support\Facades\Auth;

class ThoughtController extends Controller
{
    /**
     * Load user dashboard with all thoughts
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $thoughts = Thought::orderBy('sort_order', 'DESC')->get()->toArray();
        return view('dashboard', compact('thoughts'));
    }

    /**
     * Store new Thought
     */
    public function create(ManageThoughts $request)
    {
        // Retrieve the validated input data
        $validated = $request->validated();
        $validated['published_by'] = Auth::id();
        $validated['sort_order'] = Thought::getMaxSortOrder(Auth::id());

        if ($newRecord = Thought::create($validated)) {
            return response()->json(['result'=> true, 'id' => $newRecord->id]);
        } else {
            return response()->json(['result' => false]);
        }
    }

    /**
     * Get thought details to update
     */
    public function edit(Thought $thought)
    {
        return response()->json($thought);
    }

    /**
     * Update existing Thought details
     */
    public function update(Thought $thought, ManageThoughts $request)
    {
        // Retrieve the validated input data
        $validated = $request->validated();

        if ($thought->update($validated)) {
            return response()->json(['result'=> true]);
        } else {
            return response()->json(['result' => false]);
        }
    }

    /**
     * Delete the given Thought from database.
     */
    public function delete(Thought $thought)
    {
        if ($thought->delete()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
