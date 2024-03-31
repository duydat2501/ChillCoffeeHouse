function processOrder(id) {
  if (confirm("Bạn có chắc chắn muốn xử lý đơn hàng"))
    if (confirm("Đơn hàng được xử lí sẽ không thể hủy"))
      $.ajax({
        type: "GET",
        url: "action/processOrder.php",
        data: { id: id }
      }).done(function() {
        $("#tdcheck" + id).html('<input type="checkbox" checked>Processed');
        document.getElementById("tdcheck" + id).className = "process";
        callSnackbar("Đơn hàng đã được xử lý", "1");
      });
}
function getOrder(numpage, cur_numpage) {
  $.ajax({
    type: "GET",
    url: "action/getOrder.php",
    data: { numpage: numpage }
  }).done(function(data) {
    document.querySelectorAll("#pagination li.active")[0].className =
      "page-item";
    document.querySelectorAll("#pagination li")[cur_numpage - 1].className +=
      " active";
    $("#table_order").html(data);
  });
}
function moreOrder(id, idUser) {
  $.ajax({
    type: "GET",
    url: "action/getMoreOrder.php",
    data: { id: id, idUser: idUser }
  }).done(function(data) {
    $("#formMoreOrder").html(data);
  });
}

