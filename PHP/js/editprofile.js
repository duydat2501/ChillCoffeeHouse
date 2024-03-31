function editprofile() {
  $.ajax({
    type: "GET",
    url: "block/edit/editprofile.php"
  }).done(function(data) {
    $("#something").html(data);
  });
}
