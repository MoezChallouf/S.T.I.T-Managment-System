<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ribbon;
use Illuminate\Http\Request;

class RibbonsController extends Controller
{
    public function Index()
    { 
        $ribbons = Ribbon::all();
        return view('admin.ribbons.allribbons',compact('ribbons'));
    }
    public function AddRibbon()
    {
        return view('admin.ribbons.addribbon');
    }
    public function StoreRibbon(Request $request){
        $validatedData = $request->validate([
            'references' => 'required|string',
            'usine' => 'required|string',
            'color' => 'required|string',
            'type' => 'required|string',
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
        $ribbon = new Ribbon ($validatedData);
        

        $ribbon->save();

        // Redirect back to the product list with a success message
        return redirect()->route('allribbons')->with('message', 'Ribbon created successfully');
    }

    public function EditRibbon ($id){
        $ribbon = Ribbon::findOrFail($id);
        return view ("admin.ribbons.editribbon", compact('ribbon'));
    }

    public function DeleteRibbon($id)
    {
        $ribbon = Ribbon::findOrFail($id);
        $ribbon->delete();

        return redirect()->route('allribbons')->with('message', 'Your Ribbon has been deleted.');
    }
    public function UpdateRibbon(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'references' => 'required|string',
        'usine' => 'required|string',
        'color' => 'required|string',
        'type' => 'required|string',
        'inQty' => 'required|integer',
        'outQty' => 'required|integer',
        'date' => 'required|date',
    ]);

    $ribbon = Ribbon::findOrFail($id);

    $total = $validatedData['inQty'] - $validatedData['outQty'];

        // Add the total to the validated data
        $validatedData['total'] = $total;
        
        $status = ($total <= 0) ? 'Epuisé' : 'En Stock';
        
        // Add the status to the validated data
        $validatedData['status'] = $status;

    // Update the product with the validated data, including the status
    $ribbon->update($validatedData);

    // Redirect back to the product list or a success page
    return redirect()->route('allribbons')->with('message', 'Ribbon updated successfully');
}
    public function Showribbon($id)
    {
        $ribbon = Ribbon::findOrFail($id);
        return view('admin.ribbons.showribbon', compact('ribbon'));
    }
}
