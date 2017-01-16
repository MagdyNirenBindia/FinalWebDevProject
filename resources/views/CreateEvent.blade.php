@extends('layouts.webframe')

@section('content')
<?php use Illuminate\Support\Facades\Auth;
use App\User;

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();

$nameCreator = User::find($id)->name?>
<!-- Need to add the javascript to validate the
forms and set minimum character requirements for
 the different fields as well as dictate the format-->
<!DOCTYPE html>
<html>
  <head>
    <title>Create your Event</title>
          <link rel="stylesheet" type="text/css" href="{{asset('css/NavBar.css')}}"/>
      <link href="https://fonts.googleapis.com/css?family=Athiti|Indie+Flower|Nunito|Satisfy" rel="stylesheet">
  </head>
  <body>
    <div id="sidebar">
        <p> Make your own event page in just minutes! <br> <br><span class="description">Simply fill in all the details and we'll post it. <br><br> It's hassle free and easy to do.</span> </p>
        </div>

    <div id="form">
      <form class="eventform" action="createEvent" method="post">
        <p><span class="name">Name of Event:</span> <input type="text" id="name" name="name" placeholder="Eg. Birthday" ><br/>
        <span class="date">Date of Event:</span> <input type="datetime-local" id="date" name="date" id="text"><br/>
      <span class="numTickets">Number of Tickets:</span> <input type="number" id="ticketCapacity" name ="ticketCapacity" placeholder="Ticket Capacity" min="1" max="3000" id="text"><br/>
        <span class="endDate">End Date for Ticket Sales:</span> <input type="datetime-local" id="endDate" name="endDate" id="text"><br/>
        <span class="location">Event Location: </span><input type="text" id="location" name="location" placeholder="Eg. Buckingham Palace" id="text"><br>
        <span class="category">Category:</span> <select name="category" id="category" id="text">
          <option value="Error" id="text">Please Select</option>
          <!-- Add JS to enusre that the please select option
          can't be submitted-->
          <option value="Music" id="text">Music</option>
          <option value="Sports" id="text">Sports</option>
          <option value="Social" id="text">Social</option>
          <option value="Business" id="text">Businesss</option>
          <option value="Educational" id="text">Educational</option>
          <option value="Other" id="text">Other</option>
        </select><br/>
        <span class="description">Event Description:</span><br> <textarea name="description" id="description" rows="4" cols="60" placeholder="Eg. Concert honoring my glory! Bring Friends, but make sure to have them sign up first!"></textarea>
        <span class="description" id="Alert" style="display:none;">Please enter at least five words</span><br/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="creator" value="{{ $nameCreator }}">
        <input type="hidden" name="creatorID" value="{{ $id }}">
        <input id="submit" type="submit" class="post"></p>
      </form>
    </div>
  </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src ="<?php echo asset('js/createEvent.js')?>" type="text/javascript"></script>
</html>
@endsection
