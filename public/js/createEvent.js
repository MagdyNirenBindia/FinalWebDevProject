$('document').ready(function() {
  "use strict"
    console.log('page loaded');
    var x;
});

function doubleCheck() {
    if (confirm("Are you sure you would like to create the event?") == false) {
        killSubmission();
    }
    else{
    console.log('form should submit');
    $('.eventform').submit();
    }
}

$('#submit').click(function() {
    //validate elements of the form
    x = 0;
    x = validateName(x);
    console.log(x);
    x = validateDate(x);
    console.log(x);
    x = validateNumbTickets(x);
    console.log(x);
    x = validateEndDate(x);
    console.log(x);
    x = validateLocation(x);
    console.log(x);
    x = validateCategory(x);
    console.log(x);
    x = validateDescription(x);
    console.log(x);
    if (!(x == 0)) {
        killSubmission();
        alert('Please fill in fields marked in red');
    } else {
        doubleCheck();
    }
});



function validateName(x) {
    if ($('#name').val() == '') {
        console.log('nameError');
        $('.name').css('color', 'red');
        x = x + 1;
        return x;
        killSubmission()
    }
    else{
      $('.name').css('color', 'black');
        return x;
    }
}

function validateDate(x) {
    if ($('#date').val() == '') {
        $('.date').css('color', 'red');
        x = x + 1;
        return x;
    }
    else{
      var date1 = new Date($('#date').val());
      var now = new Date();
      console.log(date1);
      $('.date').css('color', 'black');
        if (date1.getTime()<now.getTime()){
          $('.date').css('color', 'red');
          x = x + 1;
          $('#Alert').text('Please enter an event date that is in the future!');
          $('#Alert').show();
          killSubmission()
        }
        return x;
    }
}

function validateNumbTickets(x) {
    if ($('#ticketCapacity').val() == '') {
        $('.numTickets').css('color', 'red');
        x = x + 1;
        return x;
        killSubmission()
    }
    else{
      $('.numTickets').css('color', 'black');
        return x;
    }
}

function validateEndDate(x) {
  if ($('#endDate').val() == '') {
      $('.endDate').css('color', 'red');
      x = x + 1;
      return x;
      killSubmission()
  }
  else{
    var date1 = new Date($('#date').val());
    var date2 = new Date($('#endDate').val());
    $('.endDate').css('color', 'black');
    console.log(date1.getTime());
    console.log(date2.getTime());
      if (!(date1.getTime()>date2.getTime())){
        $('.endDate').css('color', 'red');
        x = x + 1;
        $('#Alert').text('Please enter an end date for ticket sales that is before the date of the event!');
        $('#Alert').show();
        killSubmission()
      }
      return x;
  }
}

function validateLocation(x) {
  if ($('#location').val() == '') {
      $('.location').css('color', 'red');
      x = x + 1;
      return x;
      killSubmission()
    }
      else{
        $('.location').css('color', 'black');
          return x;
      }
  }

function validateCategory(x) {
  if($('#category option:selected').text()=="Please Select"){
    $('.category').css('color', 'red');
    x = x + 1;
    return x;
    killSubmission()
  }
  else{
    $('.category').css('color', 'black');
      return x;
  }
}

function validateDescription(x) {
var text = $('#description').val();
var sizetext = text.split(" ").length;
if (sizetext < 5){
  $('.description').css('color', 'red');
  $('#Alert').show();
  x = x + 1;
  return x;
  killSubmission()
}
else{
  $('.description').css('color', 'black');
  $('#dAlert').hide();
    return x;
}
}


function killSubmission() {
    $(".eventform").submit(function(e) {
        e.preventDefault();
    });
}
