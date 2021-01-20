<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ResourceClient extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Client::get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'contact_number' => 'required|max:11|unique:client',
            'address' => 'required|min:3',
            'username' => 'required|min:3|unique:client',
            'password' => 'required|min:8'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $client = Client::create($request->all());
        return response()->json($client, 201);
    }

    public function login(Request $request)
    {
        
    $client = User::where('email', $request->email)->first();

    if (!$client || !Hash::check($request->password, $client->password)) {
    return response([
    'message' => ['This credential does not match in our records!']
    ], 404);
    }

    $token = $client->createToken('my_app_token')->plainTextToken;

    $response = [
    'user' => $client,
    'token' => $token
    ];
    return response($response, 201);
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|min:3|unique:users',
            'password' => 'required|min:8'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $client = new User();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        if($client->email)
        $client->save();
        return response()->json($client, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        if(is_null($client)){
            return response()->json(["message" => "Id is not Found!"], 404);
        }
        return response()->json($client, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        if(is_null($client)){
            return response()->json(["message" => "Id is not Found!"], 404);
        }
        $client->update($request->all());
        return response()->json($client, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if(is_null($client)){
            return response()->json(["message" => "Id is not Found!"], 404);
        }
        $client->delete();
        return response()->json(null, 204);
    }
}
