$('document').ready(function() {
    console.log('page loaded');
    chooseBtn();
    attendBtnLisstener();
});

function attendBtnLisstener() {
    $('.attendBtn').on('click', function(e) {
        if (confirm("Are you sure you would like to attend?") == false) {
            $(".eventform").submit(function(e) {
                e.preventDefault();
            });
        }
    })
}

function chooseBtn() {
  checkCapacity();
  checkDate();
  checkAtnd();
}

function checkDate(){
  var endDate = new Date(document.getElementById('endDate').innerHTML);
  var date12 = new Date(document.getElementById('date12').innerHTML);
  var now = new Date();
  if (!(endDate.getTime() > now.getTime())) {
      $('#attendEvent').hide();
        console.log('hello');
      $('#endSaleNotice').html('<strong>Sorry the ticket sales for this event have ended. Please feel free to check out our other events!</strong>');
  }
  if(date12.getTime()<now.getTime()){
    if ($('#isAtnd').html() == '1') {
      $('#attendEvent').hide();
      $('.reviewEvent').show();
      $('#endSaleNotice').html('<strong>You attended this event! We hope you enjoyed it</strong>') ;
    }
  }
}

function checkCapacity() {
      var atCapacity = $('#cap').html();
      ($('#cap').html() == 1) ? soldOut():notSoldOut();
}


function soldOut(){
  $('#attendEvent').hide();
  $('#endSaleNotice').html('<strong>Sorry this event is sold out. Please feel free to check out our other events!</strong>') ;
}

function notSoldOut() {
  $('#attendEvent').show();
}
function checkAtnd(){
  console.log($('#isAtnd').text());
  if ($('#isAtnd').html() == '1') {
    $('#attendEvent').hide();
    $('#endSaleNotice').html('<strong>You are signed on to attend this event! We hope you enjoy it</strong>') ;
  }
}
