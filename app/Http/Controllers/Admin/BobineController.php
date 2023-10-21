<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bobine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BobineController extends Controller
{
    public function Index()
    { 
        $bobines = Bobine::all();
       
        return view('admin.bobines.allbobines',compact('bobines'));
    }
    public function AddBobine()
    {
        return view('admin.bobines.addbobine');
    }
    public function StoreBobine(Request $request){
        $validatedData = $request->validate([
            'references' => 'required|string',
            'color' => 'required|string',
            'usine' => 'required|string',
            'type' => 'required|string',
            'inQty' => 'required',
            'outQty' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
            $validatedData['image'] = $imagePath;
        }
        $total = $validatedData['inQty'] - $validatedData['outQty'];

        // Add the total to the validated data
        $validatedData['total'] = $total;
        
        $status = ($total <= 0) ? 'Epuisé' : 'En Stock';
        
        // Add the status to the validated data
        $validatedData['status'] = $status;

        // Create a new product instance and populate it with the validated data
        $bobine = new Bobine ($validatedData);
        

         $bobine->save();

        // Redirect back to the product list with a success message
        return redirect()->route('allbobines')->with('message', 'Bobine created successfully');
    }

    public function EditBobine ($id){
        $bobine = Bobine::findOrFail($id);
        return view ("admin/bobines/editbobine", compact('bobine'));
    }

    public function DeleteBobine($id)
    {
        $bobine = Bobine::findOrFail($id);
        $bobine->delete();

        return redirect()->route('allbobines')->with('message', 'Your Bobine has been deleted.');
    }
    public function UpdateBobine(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'references' => 'required|string',
        'color' => 'required|string',
        'usine' => 'required|string',
        'type' => 'required|string',
        'inQty' => 'required',
        'outQty' => 'required',
        'date' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $bobine = Bobine::findOrFail($id);

    if ($request->hasFile('image')) {
        // Delete the previous logo if it exists
        if ($bobine->image) {
            // Use the instance of Bobine to call the delete method
            Storage::delete('public/' . $bobine->image);
        }
        // Upload and store the new logo
        $imagePath = $request->file('image')->store('image', 'public');
        $validatedData['image'] = $imagePath;
    }

    // Handle logo deletion
    if ($request->has('delete_images')) {
        $imagePathToDelete = $request->input('delete_images');
        // Use the instance of Bobine to call the delete method
        Storage::delete('public/' . $imagePathToDelete);
    }

    

    $total = $validatedData['inQty'] - $validatedData['outQty'];

// Add the total to the validated data
$validatedData['total'] = $total;

$status = ($total <= 0) ? 'Epuisé' : 'En Stock';

// Add the status to the validated data
$validatedData['status'] = $status;

    

    // Update the product with the validated data, including the status
    $bobine->update($validatedData);

    // Redirect back to the product list or a success page
    return redirect()->route('allbobines')->with('message', 'Bobine updated successfully');
}
    public function ShowBobine($id)
    {
        $bobine = Bobine::findOrFail($id);
        return view('admin.bobines.showbobine', compact('bobine'));
    }

}
