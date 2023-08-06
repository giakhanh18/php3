@extends('booking')

<h1>Create a Booking</h1>

@if(session('success'))
   <div class="alert alert-success">
      {{ session('success') }}
   </div>
@endif

<form action="{{ route('bill.store') }}" method="POST">
   @csrf

   <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" class="form-control" required>
   </div>   

   <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" class="form-control" required>
   </div>

   <div class="form-group">
      <label for="check_in">Check-in Date:</label>
      <input type="date" name="check_in" id="check_in" class="form-control" required>
   </div>

   <div class="form-group">
      <label for="check_out">Check-out Date:</label>
      <input type="date" name="check_out" id="check_out" class="form-control" required>
   </div>

   <button type="submit" class="btn btn-primary">Book Now</button>
</form>
