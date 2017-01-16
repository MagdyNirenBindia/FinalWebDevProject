
@extends('layouts.webframe')


@section('content')
<?php use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Attendee;
use App\Feedback;

// Get the currently authenticated user...
$user = Auth::user();
$feedbacks = Feedback::all();
// Get the currently authenticated user's ID...
$id = Auth::id();
$events = Event::all();
$nameCurUser = User::find($id)->name?>

<!DOCTYPE html>
<html>
  <head>
    <title>Review All the Events</title>
  </head>
  <body>
    <div id="reviewForm">
      <form class="" action="createReview" method="post">
        {{ csrf_field() }}
          <select name="event">
          <option value="{{$eventID}}">{{Event::find($eventID)->Name}}</option>
          <!-- Add JS to enusre that the please select option
          can't be submitted-->

        </select><br/>

		<textarea name="feedback" rows="8" cols="80" placeholder="Please input your feedback here"></textarea><br/><br>

       <p>
          <label>Rating 1-5:    </label>
          <input type = "radio"
                 name = "radScore"
                 id = "scoreOne"
                 value = "1"
                 checked = "checked" />
          <label for = "scoreOne">1</label>
          <input type = "radio"
                 name = "radScore"
                 id = "scoreTwo"
                 value = "2"
          <label for = "scoreTwo">2</label>
          <input type = "radio"
                 name = "radScore"
                 id = "scoreThree"
                 value = "3"
          <label for = "scoreThree">3</label>
          <input type = "radio"
                 name = "radScore"
                 id = "scoreFour"
                 value = "4"
          <label for = "scoreFour">4</label>
          <input type = "radio"
                 name = "radScore"
                 id = "scoreFive"
                 value = "5"
          <label for = "scoreFive">5</label>

        </p>

        <input type="submit" value="Submit Feedback">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="eventID" value="{{ $eventID}}">
        <input type="hidden" name="customerID" value="{{$id}}">
      </form>
    </div>
    </body>
	<table width="800" border="1" cellpadding="1" cellspacing="1">

<tr>
<th>Event Name</th>
<th>Feedback</th>
<th>Rating</th>
<th>Reviewed By</th>
</tr>
@foreach($feedbacks as $feedback)
<tr>
<td>{{Event::find($feedback->EventID)->Name}}</td>
<td>{{$feedback -> Feedback}}</td>
<td>{{$feedback -> Rating}}</td>
<td>{{User::find($feedback -> CustomerID)->name}}</td>
</tr>
@endforeach
</table>
</html>
@endsection
