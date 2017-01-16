<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use App\User;
use App\Event;
use App\Feedback;
use App\Attendee;
use Illuminate\Database\Eloquent\Model;
use View;
use Illuminate\Support\Facades\Input;


class FeedbackController extends Controller
{
    public function submitFeedback()
    {
      $feedback = new Feedback;
      $feedback -> EventID = Input::get('eventID');
      $feedback -> CustomerID = Input::get('customerID');
      $feedback -> Rating = Input::get('radScore');
      $feedback -> Feedback = Input::get('feedback');
      $feedback -> Rating = Input::get('radScore');
      $feedback -> save();
      return View::make('TestHome');
    }

    public function showFeedback()
    {
      $eventID = Input::get('eventID');
      return View::make('Feedback',['eventID'=>$eventID]);
    }
}
