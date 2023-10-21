<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Electricien;
use Illuminate\Http\Request;

class ElectricienController extends Controller
{
    public function Index()
    { 
        $electriciens = Electricien::all();
        return view('admin.maintenance.electricien.allelectriciens',compact('electriciens'));
    }
    public function AddElectricien()
    {
        return view('admin.maintenance.electricien.addelectricien');
    }

    public function StoreElectricien(Request $request){
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'phone_number' => 'required|string',
            'remarque' => 'required|string',
            'intervention' => 'required|string',
            'date' => 'required|string',
            'prix' => 'required|integer',
            
        ]);

        // Create a new product instance and populate it with the validated data
        $electricien = new Electricien($validatedData);
        

         $electricien->save();

        // Redirect back to the product list with a success message
        return redirect()->route('allelectriciens')->with('message', 'Electricien created successfully');
    }
    public function ShowElectricien($id)
    {
        $electricien = Electricien::findOrFail($id);
        return view('admin.maintenance.electricien.showelectricien',compact('electricien'));
    }

    public function UpdateElectricien(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'phone_number' => 'required|string',
            'remarque' => 'required|string',
            'intervention' => 'required|string',
            'date' => 'required|string',
            'prix' => 'required|integer',
        ]);
         
        // Find the product by ID
        $electricien = Electricien::findOrFail($id);

        // Update the product with the validated data, including the status
        $electricien->update($validatedData);

        // Redirect back to the product list or a success page
        return redirect()->route('allelectriciens')->with('message', 'Electricien updated successfully');
    }

    public function EditElectricien ($id){
        $electricien = Electricien::findOrFail($id);
        return view ("admin/maintenance/electricien/editelectricien", compact('electricien'));
    }
}
