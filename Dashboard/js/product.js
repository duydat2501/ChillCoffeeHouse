function getProduct(numpage, i) {
  $.ajax({
    type: "POST",
    url: "action/getProduct.php",
    data: { num: numpage }
  }).done(function(data) {
    $("#table_product").html(data);
  });
  document.querySelectorAll("#pagination li.active")[0].className = "page-item";
  document.querySelectorAll("#pagination li")[i - 1].className =
    "page-item active";
}
