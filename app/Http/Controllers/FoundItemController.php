<?php
namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoundItem;

class FoundItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all found items from the database
        $foundItems = FoundItem::all();

        // Pass the found items to the view
        return view('found-items.index', compact('foundItems'));
    }

    public function create()
    {
        // Return the create form view for adding a new found item
        return view('found-items.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            // Add any other validation rules you need
        ]);

        // Create a new found item with the validated data
        FoundItem::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('found-items.index')->with('success', 'Found item created successfully');
    }

    public function show(FoundItem $foundItem)
    {
        // Return the view to display a specific found item
        return view('found-items.show', compact('foundItem'));
    }

    public function edit(FoundItem $foundItem)
    {
        // Return the edit form view for a specific found item
        return view('found-items.edit', compact('foundItem'));
    }

    public function update(Request $request, FoundItem $foundItem)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            // Add any other validation rules you need
        ]);

        // Update the found item with the validated data
        $foundItem->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('found-items.index')->with('success', 'Found item updated successfully');
    }

    public function destroy(FoundItem $foundItem)
    {
        // Delete the found item from the database
        $foundItem->delete();

        // Redirect to the index page with a success message
        return redirect()->route('found-items.index')->with('success', 'Found item deleted successfully');
    }
}