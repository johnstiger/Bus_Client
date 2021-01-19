<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h3>Edit Client</h3>
                </div>
                <div class="card-body">
                   <form action="/dashboard/updateClient/{{$client->id}}" method="post">
                   @csrf
                   @method('PUT')
                   <input type="text" name = "name" placeholder="Client Name" value="{{$client->name}}">
                   <br>
                   <br>
                   <input type="text" name = "contact_number" placeholder="Contact Number" value="{{$client->contact_number}}">
                   <br>
                   <br>
                   <input type="text" name="address" placeholder="Address" value="{{$client->address}}">
                   <br>
                   <br>
                   <input type="text" name="username" placeholder="Username" value="{{$client->username}}">
                   <br>
                   <br>
                   <input type="password" name="password" placeholder="Username" value="{{$client->password}}">
                   <br>
                   <br>
                   <button class="btn btn-primary">Edit Client</button>
                   <a href="/dashboard" class="btn btn-secondary">Cancel</a> 
                   </form>
                </div>
            </div>
        </div>
    </div>
<br>
<br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
