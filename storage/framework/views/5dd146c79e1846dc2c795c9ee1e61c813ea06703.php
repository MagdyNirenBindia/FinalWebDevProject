



<?php $__env->startSection('content'); ?>
<?php use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Attendee;
use App\Feedback;

// Get the currently authenticated user...
$user = Auth::user();
$feedbacks = Feedback::all();
// Get the currently authenticated user's ID...
$id = Auth::id();
$events = Event::all();
$nameCurUser = User::find($id)->name?>

<!DOCTYPE html>
<html>
  <head>
    <title>Review All the Events</title>
  </head>
  <body>
    <div id="reviewForm">
      <form class="" action="createReview" method="post">
        <?php echo e(csrf_field()); ?>

          <select name="event">
          <option value="<?php echo e($eventID); ?>"><?php echo e(Event::find($eventID)->Name); ?></option>
          <!-- Add JS to enusre that the please select option
          can't be submitted-->

        </select><br/>

		<textarea name="feedback" rows="8" cols="80" placeholder="Please input your feedback here"></textarea><br/><br>

       <p>
          <label>Rating 1-5:    </label>
          <input type = "radio"
                 name = "radScore"
                 id = "scoreOne"
                 value = "1"
                 checked = "checked" />
          <label for = "scoreOne">1</label>
          <input type = "radio"
                 name = "radScore"
                 id = "scoreTwo"
                 value = "2"
          <label for = "scoreTwo">2</label>
          <input type = "radio"
                 name = "radScore"
                 id = "scoreThree"
                 value = "3"
          <label for = "scoreThree">3</label>
          <input type = "radio"
                 name = "radScore"
                 id = "scoreFour"
                 value = "4"
          <label for = "scoreFour">4</label>
          <input type = "radio"
                 name = "radScore"
                 id = "scoreFive"
                 value = "5"
          <label for = "scoreFive">5</label>

        </p>

        <input type="submit" value="Submit Feedback">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <input type="hidden" name="eventID" value="<?php echo e($eventID); ?>">
        <input type="hidden" name="customerID" value="<?php echo e($id); ?>">
      </form>
    </div>
    </body>
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
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.webframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>