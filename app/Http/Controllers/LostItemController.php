<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LostItem;

class LostItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve lost items from the database
        $lostItems = LostItem::get();

        // Pass the lost items to the view
        return view('lost-items.index', compact('lostItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the create form view for adding a new lost item
        return view('lost-items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_found' => 'required|date',
            'location' => 'required',
            'image' => 'required',
            // Add any other validation rules you need
        ]);

        // Create a new lost item with the validated data
        LostItem::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('lost-items.index')->with('success', 'Lost item created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(LostItem $lostItem)
    {
        // Retrieve the specific lost item from the database
        $lostItem = LostItem::findOrFail($lostItem);

        // Return the view to display the specific lost item
        return view('lost-items.show', compact('lostItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LostItem $lostItem)
    {
        // Retrieve the specific lost item from the database
        $lostItem = LostItem::findOrFail($lostItem);

        // Return the edit form view for the specific lost item
        return view('lost-items.edit', compact('lostItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LostItem $lostItem)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'time_lost' => 'required',
            'date_found' => 'required',
            'location' => 'required',
            // Add any other validation rules you need
        ]);

        // Retrieve the specific lost item from the database
        $lostItem = LostItem::findOrFail($lostItem);

        // Update the lost item with the validated data
        $lostItem->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('lost-items.index')->with('success', 'Lost item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LostItem $lostItem)
    {
        // Retrieve the specific lost item from the database
        $lostItem = LostItem::findOrFail($lostItem);

        // Delete the lost item from the database
        $lostItem->delete();

        // Redirect to the index page with a success message
        return redirect()->route('lost-items.index')->with('success', 'Lost item deleted successfully');
    }
}
