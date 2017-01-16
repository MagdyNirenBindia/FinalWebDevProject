<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendNotifyEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:sendN';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
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
        Mail::queue('emails.send', ['user' => $user], function ($mail) use ($user){
          $mail->to($user['email'])
              ->from('mnbeventsmanagement@gmail.com')
              ->subject('You have upcoming events');
      });
      }
      $this->info('Update Message Sent!');
    }
}
