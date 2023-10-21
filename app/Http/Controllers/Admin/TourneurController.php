<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tourneur;
use Illuminate\Http\Request;

class TourneurController extends Controller
{
    public function Index()
    { 
        $tourneurs = Tourneur::all();
        return view('admin.maintenance.tourneur.alltourneurs',compact('tourneurs'));
    }
    public function AddTourneur()
    {
        return view('admin.maintenance.tourneur.addtourneur');
    }

    public function StoreTourneur(Request $request){
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'phone_number' => 'required|string',
            'nom_piece' => 'required|string',
            'description' => 'required|string',
            'machine' => 'required|string',
            'intervention' => 'required|string',
            'date' => 'required|string',
            'qty_in' => 'required|integer',
            'qty_out' => 'required|integer',
            'prix' => 'required|integer',
            
        ]);
        $status = $validatedData['qty_in'] <= $validatedData['qty_out'] ? 'Epuisé' : 'En Stock';

        // Add the status to the validated data
        $validatedData['status'] = $status;

        // Create a new product instance and populate it with the validated data
        $tourneur = new Tourneur($validatedData);
        

         $tourneur->save();

        // Redirect back to the product list with a success message
        return redirect()->route('alltourneurs')->with('message', 'Tourneur created successfully');
    }
    public function ShowTourneur($id)
    {
        $tourneur = Tourneur::findOrFail($id);
        return view('admin.maintenance.tourneur.showtourneur',compact('tourneur'));
    }

    public function UpdateTourneur(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'phone_number' => 'required|string',
            'nom_piece' => 'required|string',
            'description' => 'required|string',
            'machine' => 'required|string',
            'intervention' => 'required|string',
            'date' => 'required|string',
            'qty_in' => 'required|integer',
            'qty_out' => 'required|integer',
            'prix' => 'required|integer',
        ]);
         $status = $validatedData['qty_in'] <= $validatedData['qty_out'] ? 'Epuisé' : 'En Stock';

        // Add the status to the validated data
        $validatedData['status'] = $status;

        // Find the product by ID
        $tourneur = Tourneur::findOrFail($id);

        // Update the product with the validated data, including the status
        $tourneur->update($validatedData);

        // Redirect back to the product list or a success page
        return redirect()->route('alltourneurs')->with('message', 'Turner updated successfully');
    }

    public function EditTourneur ($id){
        $tourneur = Tourneur::findOrFail($id);
        return view ("admin/maintenance/tourneur/edittourneur", compact('tourneur'));
    }
}
