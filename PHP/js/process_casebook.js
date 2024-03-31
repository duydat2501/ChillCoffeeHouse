function getProductCasebook(casebook, numpage) {
  $.ajax({
    type: "POST",
    url: "action/getProductCasebook1.php",
    data: { casebook: casebook, numpage: numpage }
  }).done(function(data) {
    $("#content_grid").html(data);
    // console.log(data);
    document.querySelectorAll("li.active")[0].className = "";
    document.getElementById("li" + numpage).className = "active";
  });
  $.ajax({
    type: "POST",
    url: "action/getProductCasebook2.php",
    data: { casebook: casebook, numpage: numpage }
  }).done(function(data) {
    $("#content_list").html(data);
  });
}
