<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function getToken(){
        return view('access');
    }
   
    public function booking(){
        return view('booking');
    }
    public function login(Request $request)
        {

        $user = User::where('username', $request->username)->first();
        
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
        $notif = DB::table('booking')->count();
        $client = User::all();
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
            'email' => 'required|min:3|unique:users',
            'password' => 'required|min:8'
        ],[
            'name.required' => 'Please Fill Up Your Name',
        ]);

        $client = new User();
        $client->name = $req->name;
        $client->email = $req->email;
        $client->password = Hash::make($req->password);
        $client->save();
        return redirect('dashboard');
    }

    public function edit($id){
        $client = User::find($id);
        return view('editClient',compact("client"));
    }

    public function updateClient(Request $req, $id)
    {
        $client = User::find($id);
        $client->name = $req->name;
        $client->email = $req->email;
        $client->password = Hash::make($req->password);
        $client->save();
        return redirect('dashboard');
    }
    public function destroy($id){
        User::destroy($id);
            return redirect('dashboard');
    }
}
