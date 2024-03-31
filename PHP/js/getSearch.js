function getSearch(pos) {
  $("#numpage").val(pos);
  $.ajax({
    type: "POST",
    url: "action/searchGrid.php",
    data: $("#filter_price").serialize()
  }).done(function(data) {
    $("#content_grid").html(data);
  });
  $.ajax({
    type: "POST",
    url: "action/searchList.php",
    data: $("#filter_price").serialize()
  }).done(function(data) {
    $("#content_list").html(data);
  });

  document.querySelectorAll("#pagination li.active")[0].className = "";
  document.getElementById("li" + pos).className = "active";
}
