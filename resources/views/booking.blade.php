<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
</head>
<body>
   
</body>
</html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Booking Request
        </h2>
    </x-slot>
    <br>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h3>Add Booking</h3></div>
                <div class="card-body">

                <form action="/dashboard/booking/send-email" method="GET">
                <input type="text" name = "name" placeholder="Input Name">
                <br>
                <br>
                <input type="text" name = "address" placeholder="Input Address">
                <br>
                   <br>
                <input type="date" name = "start_date" placeholder="Input Start Date">
                <br>
                   <br>
                <input type="date" name = "end_date" placeholder="Input End Date">
                <br>
                   <br>
                <input type="text" name = "bus_type" placeholder="Input Bus Type">
                <br>
                   <br>
                <input type="text" name = "number_of_passenger" placeholder="Input Passenger">
                <br>
                   <br>
                   <button class="btn btn-primary">Send Booking</button>
                   <a href="/dashboard" class="btn btn-secondary">Cancel</a> 
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
               
</x-app-layout>
