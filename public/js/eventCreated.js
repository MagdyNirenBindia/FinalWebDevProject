$('document').ready(function() {
  console.log('page loaded');
  getEvent();
});

function getEvent() {
  $.get('/testAjax',viewCreatedEvent())
}

function viewCreatedEvent() {
  console.log(response);
}
