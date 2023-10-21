<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adhesive;
use Illuminate\Http\Request;

class AdhesiveController extends Controller
{
    public function Index()
    { 
        $adhesives = Adhesive::all();
        return view('admin.magazins.adhesives.alladhesives',compact('adhesives'));
    }
    public function AddAdhesive()
    {
        return view('admin.magazins.adhesives.addadhesive');
    }
    public function StoreAdhesive(Request $request){
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'type' => 'required|string',
            'usine' => 'required|string',
            'inQty' => 'required|integer',
            'outQty' => 'required|integer',
            'date' => 'required|date',
            
        ]);
    

        $total = $validatedData['inQty'] - $validatedData['outQty'];

        // Add the total to the validated data
        $validatedData['total'] = $total;
        
        $status = ($total <= 0) ? 'Epuisé' : 'En Stock';
        
        // Add the status to the validated data
        $validatedData['status'] = $status;

        // Create a new product instance and populate it with the validated data
        $adhesive = new Adhesive ($validatedData);
        

        $adhesive->save();

        // Redirect back to the product list with a success message
        return redirect()->route('alladhesives')->with('message', 'adhesive created successfully');
    }

    public function EditAdhesive($id){

        $adhesive = Adhesive::findOrFail($id);
        return view ('admin.magazins.adhesives.editadhesive', compact('adhesive'));
    }

    public function DeleteAdhesive($id)
    {
        $adhesive = Adhesive::findOrFail($id);
        $adhesive->delete();

        return redirect()->route('alladhesives')->with('message', 'Your adhesive has been deleted.');
    }
    public function UpdateAdhesive(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'nom' => 'required|string',
        'type' => 'required|string',
        'usine' => 'required|string',
        'inQty' => 'required|integer',
        'outQty' => 'required|integer',
        'date' => 'required|date',
    ]); 

    $total = $validatedData['inQty'] - $validatedData['outQty'];

        // Add the total to the validated data
        $validatedData['total'] = $total;
        
        $status = ($total <= 0) ? 'Epuisé' : 'En Stock';
        
        // Add the status to the validated data
        $validatedData['status'] = $status;

    $adhesive = Adhesive::findOrFail($id);
    // Update the product with the validated data, including the status
    $adhesive->update($validatedData);

    // Redirect back to the product list or a success page
    return redirect()->route('alladhesives')->with('message', 'adhesive updated successfully');
}
    public function ShowAdhesive($id)
    {
        $adhesive = Adhesive::findOrFail($id);
        return view('admin.magazins.adhesives.showadhesive', compact('adhesive'));
    }
}