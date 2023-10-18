<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quincaillerie;
use Illuminate\Http\Request;

class QuincaillerieController extends Controller
{
    public function Index()
    { 
        $quincailleries = Quincaillerie::all();
        return view('admin.piéces.quincaillerie.allquincailleries',compact('quincailleries'));
    }
    public function AddQuincaillerie()
    {
        return view('admin.piéces.quincaillerie.addquincaillerie');
    }

    public function StoreQuincaillerie(Request $request){
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'phone_number' => 'required|string',
            'nom_piece' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|string',
            'qty_in' => 'required|integer',
            'qty_out' => 'required|integer',
            'prix' => 'required|integer',
            
        ]);
        $status = $validatedData['qty_in'] <= $validatedData['qty_out'] ? 'Epuisé' : 'En Stock';

        // Add the status to the validated data
        $validatedData['status'] = $status;

        // Create a new product instance and populate it with the validated data
        $quincaillerie = new Quincaillerie($validatedData);
        

         $quincaillerie->save();

        // Redirect back to the product list with a success message
        return redirect()->route('allquincailleries')->with('message', 'Quincaillerie created successfully');
    }
    public function Showquincaillerie($id)
    {
        $quincaillerie = Quincaillerie::findOrFail($id);
        return view('admin.piéces.quincaillerie.showquincaillerie',compact('quincaillerie'));
    }

    public function UpdateQuincaillerie(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'phone_number' => 'required|string',
            'nom_piece' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|string',
            'qty_in' => 'required|integer',
            'qty_out' => 'required|integer',
            'prix' => 'required|integer',
        ]);
         $status = $validatedData['qty_in'] <= $validatedData['qty_out'] ? 'Epuisé' : 'En Stock';

        // Add the status to the validated data
        $validatedData['status'] = $status;

        // Find the product by ID
        $quincaillerie = Quincaillerie::findOrFail($id);

        // Update the product with the validated data, including the status
        $quincaillerie->update($validatedData);

        // Redirect back to the product list or a success page
        return redirect()->route('allquincailleries')->with('message', 'Quincaillerie updated successfully');
    }

    public function Editquincaillerie ($id){
        $quincaillerie = Quincaillerie::findOrFail($id);
        return view ("admin/piéces/quincaillerie/editquincaillerie", compact('quincaillerie'));
    }
}
