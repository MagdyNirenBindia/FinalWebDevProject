

<?php $__env->startSection('content'); ?>
<?php use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Feedback;

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();
$feedbacks = Feedback::all();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Review All the Events</title>
    <link href="https://fonts.googleapis.com/css?family=Athiti|Indie+Flower|Nunito|Satisfy" rel="stylesheet">
    <link href="<?php echo e(asset('css/HomePage.css')); ?>" type="text/css" rel="stylesheet" ?>
  </head>
<body>
    <div class="overlay">
        <table width="800" border="1" cellpadding="1" cellspacing="1">
<tr>
<th>Event Name</th>
<th>Feedback</th>
<th>Rating</th>
<th>Reviewed By</th>
</tr>
<?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<tr>
<td><?php echo e(Event::find($feedback->EventID)->Name); ?></td>
<td><?php echo e($feedback -> Feedback); ?></td>
<td><?php echo e($feedback -> Rating); ?></td>
<td><?php echo e(User::find($feedback -> CustomerID)->name); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</table>
    </div>
</body>
</html>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.webframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>