<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmsController extends Controller
{
    public function Index()
    { 
        $films = Film::all();
        return view('admin\magazins\films\allfilms',compact('films'));
    }
    public function AddFilm()
    {
        return view('admin\magazins\films\addfilm');
    }
    public function StoreFilm(Request $request){
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'usine' => 'required|string',
            'inQty' => 'required|integer',
            'outQty' => 'required|integer',
            'date' => 'required|date',
            
        ]);
    

        $status = $validatedData['inQty'] <= $validatedData['outQty'] ? 'Epuisé' : 'En Stock';

        // Add the status to the validated data
        $validatedData['status'] = $status;

        // Create a new product instance and populate it with the validated data
        $film = new Film ($validatedData);
        

        $film->save();

        // Redirect back to the product list with a success message
        return redirect()->route('allfilms')->with('message', 'film created successfully');
    }

    public function EditFilm($id){

        $film = Film::findOrFail($id);
        return view ("admin\magazins\films\aditfilm", compact('film'));
    }

    public function DeleteFilm($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return redirect()->route('allfilms')->with('message', 'Your film has been deleted.');
    }
    public function UpdateFilm(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'nom' => 'required|string',
        'usine' => 'required|string',
        'inQty' => 'required|integer',
        'outQty' => 'required|integer',
        'date' => 'required|date',
    ]); 

    $status = $validatedData['inQty'] >= $validatedData['outQty'] ? 'En Stock' : 'Epuisé';
    // Add the status to the validated data
    $validatedData['status'] = $status;

    $film = Film::findOrFail($id);
    // Update the product with the validated data, including the status
    $film->update($validatedData);

    // Redirect back to the product list or a success page
    return redirect()->route('allfilms')->with('message', 'film updated successfully');
}
    public function ShowFilm($id)
    {
        $film = Film::findOrFail($id);
        return view('admin\magazins\films\showfilm', compact('film'));
    }
}
