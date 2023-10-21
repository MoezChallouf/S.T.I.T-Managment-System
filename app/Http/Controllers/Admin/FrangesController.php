<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrangesController extends Controller
{
    public function Index()
    { 
        $franges = Frange::all();
        return view('admin.franges.allfranges',compact('franges'));
    }
    public function AddFrange()
    {
        return view('admin.franges.addfrange');
    }
    public function StoreFrange(Request $request){
        $validatedData = $request->validate([
            'references' => 'required|string',
            'color' => 'required|string',
            'usine' => 'required|string',
            'frange' => 'required|string',
            'inQty' => 'required',
            'outQty' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('frange', 'public');
            $validatedData['image'] = $imagePath;
        }

        $total = $validatedData['inQty'] - $validatedData['outQty'];

        // Add the total to the validated data
        $validatedData['total'] = $total;
        
        $status = ($total <= 0) ? 'Epuisé' : 'En Stock';
        
        // Add the status to the validated data
        $validatedData['status'] = $status;

        // Create a new product instance and populate it with the validated data
        $frange = new Frange ($validatedData);
        

        $frange->save();

        // Redirect back to the product list with a success message
        return redirect()->route('allfranges')->with('message', 'frange created successfully');
    }

    public function EditFrange ($id){
        $frange = frange::findOrFail($id);
        return view ("admin/franges/editfrange", compact('frange'));
    }

    public function DeleteFrange($id)
    {
        $frange = Frange::findOrFail($id);
        $frange->delete();

        return redirect()->route('allfranges')->with('message', 'Your frange has been deleted.');
    }
    public function Updatefrange(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'references' => 'required|string',
            'color' => 'required|string',
            'usine' => 'required|string',
            'frange' => 'required|string',
            'inQty' => 'required',
            'outQty' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Change 'frange' to 'image'
        ]);
    
        $frange = Frange::findOrFail($id);
    
        if ($request->hasFile('image')) { // Change 'frange' to 'image'
            // Delete the previous image if it exists
            if ($frange->image) {
                // Use the instance of Frange to call the delete method
                Storage::delete('public/' . $frange->image);
            }
            // Upload and store the new image
            $imagePath = $request->file('image')->store('frange', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        // Handle image deletion
        if ($request->has('delete_images')) {
            $imagePathToDelete = $request->input('delete_images');
            // Use the instance of Frange to call the delete method
            Storage::delete('public/' . $imagePathToDelete);
            // Remove the 'image' field in the database by setting it to null
            $frange->image = null;
            $frange->save();
        }
    
        $total = $validatedData['inQty'] - $validatedData['outQty'];

        // Add the total to the validated data
        $validatedData['total'] = $total;
        
        $status = ($total <= 0) ? 'Epuisé' : 'En Stock';
        
        // Add the status to the validated data
        $validatedData['status'] = $status;
    
        // Update the product with the validated data, including the status
        $frange->update($validatedData);
    
        // Redirect back to the product list or a success page
        return redirect()->route('allfranges')->with('message', 'frange updated successfully');
    }
    
    
    public function Showfrange($id)
    {
        $frange = Frange::findOrFail($id);
        return view('admin.franges.showfrange', compact('frange'));
    }
}
