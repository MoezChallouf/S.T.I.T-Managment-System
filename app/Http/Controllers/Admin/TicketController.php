<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function Index()
    { 
        $tickets = Ticket::all();
        return view('admin\magazins\tickets\alltickets',compact('tickets'));
    }
    public function Addticket()
    {
        return view('admin\magazins\tickets\addticket');
    }
    public function Storeticket(Request $request){
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'type' => 'required|string',
            'usine' => 'required|string',
            'inQty' => 'required',
            'outQty' => 'required',
            'date' => 'required|date',
            
        ]);
    

        $total = $validatedData['inQty'] - $validatedData['outQty'];

        // Add the total to the validated data
        $validatedData['total'] = $total;
        
        $status = ($total <= 0) ? 'Epuisé' : 'En Stock';
        
        // Add the status to the validated data
        $validatedData['status'] = $status;


        // Create a new product instance and populate it with the validated data
        $ticket = new Ticket ($validatedData);
        

        $ticket->save();

        // Redirect back to the product list with a success message
        return redirect()->route('alltickets')->with('message', 'ticket created successfully');
    }

    public function Editticket ($id){
        $ticket = Ticket::findOrFail($id);
        return view ("admin\magazins\tickets\editticket", compact('ticket'));
    }

    public function Deleteticket($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('alltickets')->with('message', 'Your ticket has been deleted.');
    }
    public function Updateticket(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'nom' => 'required|string',
        'type' => 'required|string',
        'usine' => 'required|string',
        'inQty' => 'required',
        'outQty' => 'required',
        'date' => 'required|date',
    ]); 

    $total = $validatedData['inQty'] - $validatedData['outQty'];

        // Add the total to the validated data
        $validatedData['total'] = $total;
        
        $status = ($total <= 0) ? 'Epuisé' : 'En Stock';
        
        // Add the status to the validated data
        $validatedData['status'] = $status;

    $ticket = Ticket::findOrFail($id);
    // Update the product with the validated data, including the status
    $ticket->update($validatedData);

    // Redirect back to the product list or a success page
    return redirect()->route('alltickets')->with('message', 'ticket updated successfully');
}
    public function Showticket($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('admin\magazins\tickets\showticket', compact('ticket'));
    }
}
