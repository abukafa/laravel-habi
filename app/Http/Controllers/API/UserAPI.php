<?php

namespace App\Http\Controllers\API;

use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return response()->json([
            'data' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'account' => $request->account,
            'description' => $request->description
        ]);
        return response()->json([
            'data' => $users
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        return response()->json([
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->account = $request->account;
        $user->description = $request->description;
        $user->save();

        return response()->json([
            'data' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'Data User dihapus!'
        ], 204);
    }
}
