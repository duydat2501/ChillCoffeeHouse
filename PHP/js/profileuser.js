function profileuser() {
  $.ajax({
    type: "GET",
    url: "page/infoprofile.php"
  }).done(function(data) {
    $("#something").html(data);
  });
}

$(document).ready(function() {
  $.ajax({
    type: "GET",
    url: "page/infoprofile.php"
  }).done(function(data) {
    $("#something").html(data);
  });
});
