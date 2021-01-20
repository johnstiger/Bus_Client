<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function getToken(){
        return view('access');
    }
    
    public function login(Request $request)
        {
        $user = Client::where('username', $request->username)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
        return response([
        'message' => ['This credential doesn\' match to our records!']
        ], 404);
        }

        $token = $user->createToken('my_app_token')->plainTextToken;

        $response = [
        'user' => $user,
        'token' => $token
        ];
        // dd($response);
        return response($response, 201);
    }
    
    public function index()
    {
        $client = Client::all();
        return view('dashboard', compact("client"));
    }
    public function Client()
    {   
        return view('addClient');
    }
    public function addClient(Request $req)
    {
        $req->validate([
            'name' => 'required|min:3',
            'contact_number' => 'required|max:11',
            'address' => 'required|min:3',
            'username' => 'required|min:3|unique:client',
            'password' => 'required|min:8'
        ],[
            'name.required' => 'Please Fill Up Your Name',
            'contact_number.required' => 'Please Enter Your Contact Number',
            'address.required' => 'Please Enter Your Detailed Address',
        ]);

        $client = new Client();
        $client->name = $req->name;
        $client->contact_number = $req->contact_number;
        $client->address = $req->address;
        $client->username = $req->username;
        $client->password = Hash::make($req->password);
        $client->save();
        return redirect('dashboard');
    }

    public function edit($id){
        $client = Client::find($id);
        return view('editClient',compact("client"));
    }

    public function updateClient(Request $req, $id)
    {
        $client = Client::find($id);
        $client->name = $req->name;
        $client->contact_number = $req->contact_number;
        $client->address = $req->address;
        $client->username = $req->username;
        $client->password = Hash::make($req->password);
        $client->save();
        return redirect('dashboard');
    }
    public function destroy($id){
            Client::destroy($id);
            return redirect('dashboard');
    }
}
