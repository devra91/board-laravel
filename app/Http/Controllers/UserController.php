<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
      ];

      $this->validate($request, $rules);

      $data = $request->all();
      $data['password'] = bcrypt($request->password);

      $user = User::create($data);

      return response()->json(['data' => $user], 201);
    }

    public function login(Request $request)
    {
      if (!$token = auth()->attempt($request->only('email', 'password'))) {
        return response(null, 401);
      }
  
      return response()->json(compact('token'));
    }
}
