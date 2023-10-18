<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mecanicien;
use Illuminate\Http\Request;

class MecanicienController extends Controller
{
    public function Index()
    { 
        $mecaniciens = Mecanicien::all();
        return view('admin.piéces.mecanicien.allmecaniciens',compact('mecaniciens'));
    }
    public function AddMecanicien()
    {
        return view('admin.piéces.mecanicien.addmecanicien');
    }

    public function StoreMecanicien(Request $request){
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'phone_number' => 'required|string',
            'nom_piece' => 'required|string',
            'remarque' => 'required|string',
            'car' => 'required|string',
            'intervention' => 'required|string',
            'date' => 'required|string',
            'prix' => 'required|integer',
            
        ]);

        // Create a new product instance and populate it with the validated data
        $mecanicien = new Mecanicien($validatedData);
        

         $mecanicien->save();

        // Redirect back to the product list with a success message
        return redirect()->route('allmecaniciens')->with('message', 'mecanicien created successfully');
    }
    public function ShowMecanicien($id)
    {
        $mecanicien = Mecanicien::findOrFail($id);
        return view('admin.piéces.mecanicien.showmecanicien',compact('mecanicien'));
    }

    public function UpdateMecanicien(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'phone_number' => 'required|string',
            'nom_piece' => 'required|string',
            'remarque' => 'required|string',
            'car' => 'required|string',
            'intervention' => 'required|string',
            'date' => 'required|string',
            'prix' => 'required|integer',
        ]);
         
        // Find the product by ID
        $mecanicien = Mecanicien::findOrFail($id);

        // Update the product with the validated data, including the status
        $mecanicien->update($validatedData);

        // Redirect back to the product list or a success page
        return redirect()->route('allmecaniciens')->with('message', 'Mecanicien updated successfully');
    }

    public function EditMecanicien ($id){
        $mecanicien = Mecanicien::findOrFail($id);
        return view ("admin/piéces/mecanicien/editmecanicien", compact('mecanicien'));
    }
}
