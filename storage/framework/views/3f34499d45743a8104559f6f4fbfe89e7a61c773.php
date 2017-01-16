
<?php use Illuminate\Support\Facades\Auth;
use App\User;

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();

$name = User::find($id)->name?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>View details</title>
    <link href="https://fonts.googleapis.com/css?family=Athiti|Indie+Flower|Nunito|Satisfy" rel="stylesheet">
    <link href="<?php echo e(asset('css/HomePage.css')); ?>" type="text/css" rel="stylesheet" ?>
</head>
<body>
    <div class="overlay">
  <h1>Event Sucessfully Created by <?=$name?></h1>
  <p id="displayEvent"></p>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="<?php echo e(asset('js/eventCreated.js')); ?>"></script>
</body>
</html>

<?php echo $__env->make('layouts.webframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>