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
                <table>
    <tr>
        <th>Id</th>
        <th>Client Name</th>
        <th>Contact Number</th>
        <th>Address</th>
        <th>Username</th>
        <th width = "280px">Action</th>
    </tr>
    @foreach($client as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->contact_number}}</td>
        <td>{{$user->address}}</td>
        <td>{{$user->username}}</td>
        <td>
             <form action="/dashboard/destroy/{{$user->id}}" method="post">
            <a href="/dashboard/editClient/{{$user->id}}"><button type="button" class="btn btn-primary">Edit Client</button></a>
             @csrf
             @method('DELETE')
           <button type="submit" class="btn btn-danger">Delete Client</button>
           </form>
        </td>
    </tr>
    @endforeach
</table>
<div class="add">
<a href="/dashboard/addClient"><button class="btn btn-primary" style="margin: 20px;">Add New Client</button></a>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
