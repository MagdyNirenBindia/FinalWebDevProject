

<?php $__env->startSection('content'); ?>
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
  <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <li><?php echo e($event->Name); ?>, which is happening on the <?php echo e($event->Date); ?></li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  </ul>
</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.webframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>