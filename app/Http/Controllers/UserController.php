<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  /**
   * Display a listing of the users.
   *
   * @return \Illuminate\Http\Response
   */
  public function all()
  {
    $users = User::all();

    return response()->json($users);
  }

  /**
   * Store a newly created user.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
    // Validate the request data
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'lastname' => 'required',
      'username' => 'required|unique:users',
      'email' => 'required|email|unique:users',
      'password' => 'required',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['errors' => $errors], 400);
    }

    // Hash the password
    $hashedPassword = Hash::make($request->input('password'));

    // Create a new user
    $user = User::create([
      'name' => $request->input('name'),
      'lastname' => $request->input('lastname'),
      'username' => $request->input('username'),
      'email' => $request->input('email'),
      'password' => $hashedPassword,
    ]);

    return response()->json($user, 201);
  }

  /**
   * Display the specified user.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function get($id)
  {
    $user = User::find($id);

    if (!$user) {
      return response()->json(['message' => 'User not found'], 404);
    }

    return response()->json($user);
  }

  /**
   * Update the specified user in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    // Validate the request data
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'lastname' => 'required',
      'username' => 'required|unique:users,username,' . $id,
      'email' => 'required|email|unique:users,email,' . $id,
    ]);

    // Check if validation fails
    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['errors' => $errors], 400);
    }

    // Find the user
    $user = User::find($id);

    if (!$user) {
      return response()->json(['message' => 'User not found'], 404);
    }

    // Update the user
    $user->update($request->all());

    return response()->json($user);
  }

  /**
   * Remove the specified user from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function remove($id)
  {
    try {
      // Find the user
      $user = User::find($id);
  
      if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
      }
  
      // Soft delete the user
      $user->delete();
  
      return response()->json(null, 204);
    } catch (QueryException $e) {
      return response()->json(['message' => 'Failed to delete user'], 500);
    }
  }
}
