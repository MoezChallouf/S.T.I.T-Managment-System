<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Rebobine;
use Illuminate\Http\Request;

class RebobineController extends Controller
{
    public function Index()
    { 
        $rebobines = Rebobine::all();
        return view('admin.rebobines.allrebobines',compact('rebobines'));
    }
    public function AddRebobine()
    {
        return view('admin.rebobines.addrebobine');
    }
    public function StoreRebobine(Request $request){
        $validatedData = $request->validate([
            'references' => 'required|string',
            'color' => 'required|string',
            'type' => 'required|string',
            'inQty' => 'required|integer',
            'outQty' => 'required|integer',
            'date' => 'required|date',
        ]);

        $status = $validatedData['inQty'] <= $validatedData['outQty'] ? 'Epuisé' : 'En Stock';

        // Add the status to the validated data
        $validatedData['status'] = $status;

        // Create a new product instance and populate it with the validated data
        $rebobine = new Rebobine ($validatedData);
        

        $rebobine->save();

        // Redirect back to the product list with a success message
        return redirect()->route('allrebobines')->with('message', 'Rebobine created successfully');
    }

    public function EditRebobine ($id){
        $rebobine = Rebobine::findOrFail($id);
        return view ("admin/rebobines/editrebobine", compact('rebobine'));
    }

    public function DeleteRebobine($id)
    {
        $rebobine = Rebobine::findOrFail($id);
        $rebobine->delete();

        return redirect()->route('allrebobines')->with('message', 'Your Rebobine has been deleted.');
    }
    public function UpdateRebobine(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'references' => 'required|string',
        'color' => 'required|string',
        'type' => 'required|string',
        'inQty' => 'required|integer',
        'outQty' => 'required|integer',
        'date' => 'required|date',
    ]);

    $rebobine = Rebobine::findOrFail($id);

    $status = $validatedData['inQty'] >= $validatedData['outQty'] ? 'En Stock' : 'Epuisé';
    // Add the status to the validated data
    $validatedData['status'] = $status;

    // Update the product with the validated data, including the status
    $rebobine->update($validatedData);

    // Redirect back to the product list or a success page
    return redirect()->route('allrebobines')->with('message', 'Rebobine updated successfully');
}
    public function ShowRebobine($id)
    {
        $rebobine = Rebobine::findOrFail($id);
        return view('admin.rebobines.showrebobine', compact('rebobine'));
    }

}
