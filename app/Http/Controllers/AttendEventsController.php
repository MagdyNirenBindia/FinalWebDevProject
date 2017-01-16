<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use App\User;
use App\Event;
use App\Attendee;
use Illuminate\Database\Eloquent\Model;
use View;
use Illuminate\Support\Facades\Input;

class AttendEventsController extends Controller
{
  public function doAttendEvent()
  {
    $attendee = new Attendee;
    $attendee -> EventID = Input::get('eventID');
    $attendee -> CustomerID = Input::get('customerID');
    $attendee -> Date = Input::get('eventDate');
    $attendee -> save();
    $eventsatt = Attendee::all()->toArray();
    return redirect('/home');
  }
}
