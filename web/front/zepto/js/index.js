$(function() {
  $('#tap').on('tap', function($event) {
    $event.preventDefault();
    console.log('tap');
  })
  $('#click').on('click', function() {
    console.log('click');
  })
})