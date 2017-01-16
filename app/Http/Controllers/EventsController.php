<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use App\User;
use App\Event;
use Illuminate\Database\Eloquent\Model;
use View;
use Illuminate\Support\Facades\Input;


class EventsController extends Controller
{

  public function index()
  {
    $events = Event::all()->toArray();
    return ($events);
  }

  public function showCreateEvent()
  {
    return View::make('CreateEvent');
  }

public function displayEvent()
{
  $eventID = Input::get('eventID');
   return View::make('ViewEvent',['eventID'=>$eventID]);
}

public function showBrowseEvents()
{
  return View::make('TestBrowseEvents');
}

  public function doCreateEvent()
  {
    $event = new Event;
    $event -> Name = Input::get('name');
    $event -> CreatorID = Input::get('creatorID');
    $event -> Start_Date = date("Y-m-d H:i:s");
    $event -> End_Date = Input::get('endDate');
    $event -> Description = Input::get('description');
    $event -> Location = Input::get('location');
    $event -> Date = Input::get('date');
    $event -> Creator = Input::get('creator');
    $event -> Ticket_Capacity = Input::get('ticketCapacity');;
    $event -> Genre = Input::get('category');
    $event -> save();
    return View::make('eventCreated',['event'=> $event]);
  }
  public function getData()
  {
      return response()->json(['response' => 'This is get method']);
}
}
