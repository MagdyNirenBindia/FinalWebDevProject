



<?php $__env->startSection('content'); ?>
<?php use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Attendee;

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();
$events = Event::all();
$nameCurUser = User::find($id)->name?>

<!DOCTYPE html>
<html>
<head>
<title>MBN Events Homepage</title>
        <link href="https://fonts.googleapis.com/css?family=Athiti|Indie+Flower|Nunito|Satisfy" rel="stylesheet">
    <link href="<?php echo e(asset('css/HomePage.css')); ?>" type="text/css" rel="stylesheet" ?>
</head>

<body>

    <div class="overlay">
<h1>Welcome <?php echo e($nameCurUser); ?></h1>

<h2>Events you're attending...</h2>
<?php
  $attEvents = Attendee::where('CustomerID',$id)->select('EventID')->groupby('EventID')->get();
 ?>
<div id="EventsAttn">
    <p>
  <?php $__currentLoopData = $attEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attEvent): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

<?php echo e(Event::find($attEvent->EventID)->Name); ?>

      <form class="viewEvent" action="/viewEvent" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <input type="hidden" name="eventID" value="<?php echo e($attEvent -> EventID); ?>">
        <input class="viewBtn" type="submit" value="View Event" id="box">
      </form>

    <p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

    </p>

</div>

<h2>Events you have created...</h2>
<?php
  $crtdEvents = Event::where('CreatorID',$id)->get();
 ?>
<div id="EventsCrtd">
    <p>
  <?php $__currentLoopData = $crtdEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crtdEvent): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <?php echo e(Event::find($crtdEvent->id)->Name); ?>

    </p>
      <form action="/viewParticipants" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <input type="hidden" name="eventID" value="<?php echo e($crtdEvent -> id); ?>">
        <input type="submit" name="viewParticipants" value="View Participants & Ticket Sales" id="box">
      </form>
    <p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </p>
</div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src ="<?php echo asset('js/test.js')?>" type="text/javascript"></script>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.webframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>