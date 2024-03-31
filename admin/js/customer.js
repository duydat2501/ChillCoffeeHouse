function moreUser(id) {
  $.ajax({
    type: "GET",
    url: "action/getMoreUser.php",
    data: { id: id }
  }).done(function(data) {
    $("#formMoreUser").html(data);
  });
}
