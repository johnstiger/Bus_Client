<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Adding New Client
        </h2>
    </x-slot>
    <br>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h3>Add Client</h3></div>
                <div class="card-body">
                   <form action="/dashboard/addClient/confirmed" method="post">
                   @csrf
                   <input type="text" name = "name" placeholder="Client Name">
                   <br>
                   @error('name')
                    {{ $message }}
                   @enderror
                   <br>
                   <input type="text" name = "contact_number" placeholder="Contact Number">
                   <br>
                   @error('contact_number')
                   {{ $message }}
                   @enderror
                   <br>
                   <input type="text" name = "address" placeholder="Address">
                   <br>
                   @error('address')
                   {{ $message }}
                   @enderror
                   <br>
                   <input type="text" name="username" placeholder="Username">
                   <br>
                   @error('username')
                   {{ $message }}
                   @enderror
                   <br>
                   <input type="password" name="password" placeholder="Password">
                   <br>
                   @error('password')
                   {{ $message }}
                   @enderror
                   <br>
                   <button class="btn btn-primary">Add Client</button>
                   <a href="/dashboard" class="btn btn-secondary">Cancel</a> 
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
               
</x-app-layout>
