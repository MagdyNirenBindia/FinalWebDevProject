<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use App\Event;
use App\Attendee;
use App\Mail\notify;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send drip e-mails to a user';

    /**
     * The drip e-mail service.
     *
     * @var DripEmailer
     */
    protected $drip;

    /**
     * Create a new command instance.
     *
     * @param  DripEmailer  $drip
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $events = Event::whereMonth('Date', '=', date('m'))->get();
      foreach ($events as $event){
        $eventID = $event -> id;
        $participants = Attendee::where('EventID',$eventID)->select('CustomerID')->groupby('CustomerID')->get();
        foreach($participants as $participant){
          $user = User::find($participant->CustomerID);
          Mail::to($user->email)->send(new notify());
        }
      }
        }
    }
