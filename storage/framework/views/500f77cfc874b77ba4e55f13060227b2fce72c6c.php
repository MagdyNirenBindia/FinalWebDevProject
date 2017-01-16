<?php $__env->startSection('content'); ?>
<?php
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Attendee;

//Calculating the progress of ticket sales
$ticketsSold = sizeof(Attendee::where('EventID', $eventID)->select('CustomerID')->groupby('CustomerID')->get());
$ticketCapacity = Event::find($eventID)->Ticket_Capacity;
$prcnt = ($ticketsSold/$ticketCapacity)*100;

//Generating array of particpants to the event

$participants = Attendee::where('EventID', $eventID)->select('CustomerID')->groupby('CustomerID')->get();
$count = 1;
?>
<!DOCTYPE html>
<html>
<head>
<title>MBN Events Sales</title>
            <link href="https://fonts.googleapis.com/css?family=Athiti|Indie+Flower|Nunito|Satisfy" rel="stylesheet">
    <link href="<?php echo e(asset('css/HomePage.css')); ?>" type="text/css" rel="stylesheet" ?>
</head>
<body>
    <div class="overlay">
  <div class="">
    <h1><?php echo e(Event::find($eventID)->Name); ?></h1>
    <p>Total Tickets Issued:<strong> <?php echo e($ticketCapacity); ?></strong>,<br> Of which sold:<strong> <?php echo e($ticketsSold); ?></strong></p>
  </div>

  <div class="salesProgress">
  <p><progress value="<?php echo e($ticketsSold); ?>" max="<?php echo e($ticketCapacity); ?>"></progress>     <?php echo e(round($prcnt,1,PHP_ROUND_HALF_UP)); ?>%</p>
  </div>

  <div class="participantList">
    <table width="800" border="1" cellpadding="1" cellspacing="1">
    <tr>
    <th>Participant Number</th>
    <th>Participant Name</th>
    <th>Participant Email</th>
    </tr>
    <?php $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <tr>
      <?php $person = User::find($participant->CustomerID) ?>
      <td><?php echo e($count); ?></td>
      <td><?php echo e($person->name); ?></td>
      <td><?php echo e($person->email); ?></td>
    </tr>
    <?php $count++; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  </table>
  </div>

    </div>
</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.webframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>