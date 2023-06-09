<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticket = Ticket::all();
        return response()->json(['success' => true, 'data' => $ticket],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'user_id' => request('user_id'),
            'event_id' => request('event_id'),
            'date' => request('date'),
            'price' => request('price'), 
        ]);
        return response()->json(['success' => true, 'data' => $ticket],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::find($id);
        return response()->json(['success' => true, 'data' => $ticket],201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket = Ticket::find($id);
        $ticket -> update([
            'user_id' => $request->input('user_id'),
            'event_id' => $request->input('event_id'),
            'date' => $request->input('date'),
            'price' => $request->input('price'),
        ]);
        return response()->json(['success' => true, 'data' => $ticket],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return response()->json(['success' => true, 'data' => $ticket],200);
    }
}
