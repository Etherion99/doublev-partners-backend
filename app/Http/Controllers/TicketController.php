<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
  /**
   * Display a listing of the tickets.
   *
   * @return \Illuminate\Http\Response
   */
  public function all()
  {
    $tickets = Ticket::all();

    return response()->json($tickets);
  }

  /**
   * Store a newly created ticket.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
    // Validate the request data
    $validator = Validator::make($request->all(), [
      'title' => 'required',
      'description' => 'required',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['errors' => $errors], 400);
    }

    // Create a new ticket
    $ticket = Ticket::create([
      'title' => $request->input('title'),
      'description' => $request->input('description'),
    ]);

    return response()->json($ticket, 201);
  }

  /**
   * Display the specified ticket.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function get($id)
  {
    $ticket = Ticket::find($id);

    if (!$ticket) {
      return response()->json(['message' => 'Ticket not found'], 404);
    }

    return response()->json($ticket);
  }

  /**
   * Update the specified ticket in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    // Validate the request data
    $validator = Validator::make($request->all(), [
      'title' => 'required',
      'description' => 'required',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['errors' => $errors], 400);
    }

    // Find the ticket
    $ticket = Ticket::find($id);

    if (!$ticket) {
      return response()->json(['message' => 'Ticket not found'], 404);
    }

    // Update the ticket
    $ticket->update($request->all());

    return response()->json($ticket);
  }

  /**
   * Remove the specified ticket from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function remove($id)
  {
    try {
      // Find the ticket
      $ticket = Ticket::find($id);

      if (!$ticket) {
        return response()->json(['message' => 'Ticket not found'], 404);
      }

      // Soft delete the ticket
      $ticket->delete();

      return response()->json(null, 204);
    } catch (\Exception $e) {
      return response()->json(['message' => 'Failed to delete ticket'], 500);
    }
  }
}
