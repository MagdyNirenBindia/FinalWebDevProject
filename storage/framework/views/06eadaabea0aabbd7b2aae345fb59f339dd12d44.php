<?php $__env->startSection('content'); ?>

<?php
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Attendee;
$id1 = Auth::id();
$matchThese = ['CustomerID' => $id1, 'EventID' => $eventID];
$isAttending1 = Attendee::where($matchThese)->select('CustomerID')->groupby('CustomerID')->get();
$isAtn = 0;
if ($isAttending1->isEmpty()){
  $isAtn = 0;
}
else{
  $isAtn = 1;
}
$event = Event::find($eventID);
$ticketsSold = sizeof(Attendee::where('EventID',$eventID)->select('CustomerID')->groupby('CustomerID')->get());
$ticketCapacity = Event::find($eventID)->Ticket_Capacity;
$atCapacity = 1;
if ($ticketsSold >= $ticketCapacity) {
  $atCapacity = 1;
}
else{
  $atCapacity = 0;
}
?>




<!DOCTYPE html>
<html>
    <head>
           <link href="https://fonts.googleapis.com/css?family=Athiti|Indie+Flower|Nunito|Satisfy" rel="stylesheet">
    <link href="<?php echo e(asset('css/HomePage.css')); ?>" type="text/css" rel="stylesheet" ?>
    </head>
    <body>
        <div class="overlay">
<h1><?php echo e($event -> Name); ?></h1>

<div id="description">
<p><?php echo e($event -> Description); ?></p>
</div>
<p id="cap" style="display:none;"><?php echo e($atCapacity); ?></p>
<p id="isAtnd" style="display:none;"><?php echo e($isAtn); ?></p>

<div id="details">
  <p>
    Creator: <?php echo e($event -> Creator); ?><br/>
    Date: <span id="date12"><?php echo e($event -> Date); ?></span><br/>
    Location: <?php echo e($event -> Location); ?><br/>
    Number of Tickets: <?php echo e($event -> Ticket_Capacity); ?><br/>
    Tickets Sold until: <span id="endDate" ><?php echo e($event -> End_Date); ?></span>
  </p>
</div>


<p id="endSaleNotice"></p>

<div id="attendEvent">
  <form class="eventform" action="attendEvent" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <input type="hidden" name="eventID" value="<?php echo e($event -> id); ?>">
    <input type='hidden' name='eventDate' value="<?php echo e($event -> Date); ?>">
    <input type="hidden" name="customerID" value="<?php echo e($id1); ?>">
    <input type="hidden" name="creatorID" value="<?php echo e($event ->CreatorID); ?>">
    <input class="attendBtn" type="submit" value="Attend">
  </form>
</div>

<div class="reviewEvent" style="display:none;">
  <form class="" action="/feedback" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <input type="hidden" name="eventID" value="<?php echo e($event -> id); ?>">
    <input type="submit" name="review" value="Give Feedback">
  </form>
</div>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src ="<?php echo asset('js/viewEvent.js')?>" type="text/javascript"></script>
    </body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.webframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>