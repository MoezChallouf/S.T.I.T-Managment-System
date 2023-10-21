<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    public function Index()
    { 
        $pieces = Piece::all();
        return view('admin\magazins\pieces\allpieces',compact('pieces'));
    }
    public function AddPiece()
    {
        return view('admin\magazins\pieces\addpiece');
    }
    public function Storepiece(Request $request){
        $validatedData = $request->validate([
            'references' => 'required|string',
            'nom' => 'required|string',
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
        $piece = new Piece ($validatedData);
        

         $piece->save();

        // Redirect back to the product list with a success message
        return redirect()->route('allpieces')->with('message', 'piece created successfully');
    }

    public function EditPiece ($id){
        $piece = Piece::findOrFail($id);
        return view ("admin\magazins\pieces\aditpiece", compact('piece'));
    }

    public function DeletPiece($id)
    {
        $piece = Piece::findOrFail($id);
        $piece->delete();

        return redirect()->route('allpieces')->with('message', 'Your piece has been deleted.');
    }
    public function UpdatePiece(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'references' => 'required|string',
        'nom' => 'required|string',
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
    
    $piece = Piece::findOrFail($id);
    // Update the product with the validated data, including the status
    $piece->update($validatedData);

    // Redirect back to the product list or a success page
    return redirect()->route('allpieces')->with('message', 'piece updated successfully');
}
    public function Showpiece($id)
    {
        $piece = Piece::findOrFail($id);
        return view('admin\magazins\pieces\showpiece', compact('piece'));
    }
}
