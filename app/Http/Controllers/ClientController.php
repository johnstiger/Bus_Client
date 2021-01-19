<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
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
            'name.required' => 'Please Enter Product Name',
            'contact_number.required' => 'Please Enter Amount',
            'address.required' => 'Please Enter Stock',
        ]);

        $client = new Client();
        $client->name = $req->name;
        $client->contact_number = $req->contact_number;
        $client->address = $req->address;
        $client->username = $req->username;
        $client->password = $req->password;
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
        $client->password = $req->password;
        $client->save();
        return redirect('dashboard');
    }
    public function destroy($id){
            Client::destroy($id);
            return redirect('dashboard');
    }
}
