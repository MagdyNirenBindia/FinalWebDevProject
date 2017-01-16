@extends('layouts.webframe')

@section('content')
<?php
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Attendee;

$events = Event::whereMonth('Date', '=', date('m'))->get();

 ?>
<!DOCTYPE html>
<html>
<body>
  <h1>Upcoming Events</h1>

  <p>You've got an event coming up this month! Here are this month's events:</p>
  <ul>
  @foreach($events as $event)
    <li>{{$event->Name}}, which is happening on the {{$event->Date}}</li>
  @endforeach
  </ul>
</body>
</html>
@endsection
