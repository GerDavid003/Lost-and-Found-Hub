<?php
        // Item submission controller
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'description' => 'required',
            'category' => 'required|in:laptop,charger',
            'location' => 'required',
            'contact' => 'required',
        ]);

        // Store the form data in the database or perform any necessary operations

        return 'Item submitted successfully!';
    }
}
