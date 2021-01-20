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
                <div class="card-header"><h3>Sign In</h3></div>
                <div class="card-body">
                   <form action="/dashboard/getToken" method="get">
                   @csrf
                   <input type="text" name = "username" placeholder="Username">
                   <br>
                   @error('username')
                    {{ $message }}
                   @enderror
                   <br>
                   <input type="password" name = "password" placeholder="password">
                   <br>
                   @error('password')
                   {{ $message }}
                   @enderror
                   <br>
                   <br>
                   <button class="btn btn-primary">Sign in</button>
                   <a href="/dashboard" class="btn btn-secondary">Cancel</a> 
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
               
</x-app-layout>
