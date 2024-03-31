function buy() {
  if (confirm("Bạn có chắc chắn ?"))
    $.ajax({
      type: "POST",
      url: "action/buy.php"
      //data: $("#form_buy").serialize()
    }).done(function(data) {
      if (data === "1") {
        alert("Mua thành công");
        window.location.assign("?page=checkout");
      } else {
        alert("Bạn cần đăng nhập trước khi mua hàng");
      }
    });
}
function updateModalCart() {
  $.ajax({
    type: "GET",
    url: "action/updateModalCart.php"
  }).done(function(data) {
    $("#cart_content").html(data);
  });
  $.ajax({
    type: "GET",
    url: "action/getQuantityCart.php"
  }).done(function(data) {
    console.log(data);
    $("#qty").text(data);
  });
}
function add_to_cart(id) {
  $.ajax({
    type: "POST",
    url: "action/add_to_cart.php",
    data: {
      id: id
    }
  })
    .then(function() {
      console.log("updating cart");
      updateModalCart();
    })
    .done(function() {
      console.log("add thanh cong");
      callSnackbar("Thêm vào giỏ hàng thành công", 1);
    });
}
function delete_cart(id) {
  $.ajax({
    type: "POST",
    url: "action/delete_cart.php",
    data: { id: id }
  }).done(function(data) {
    $.ajax({
      type: "GET",
      url: "action/updateBoxPackage.php"
    }).done(function(data) {
      $("#box_package").html(data);
      console.log(data);
    });
    console.log("xoa thanh cong" + data);
    if (document.getElementById("tr" + id))
      document.getElementById("tr" + id).style.display = "none";
    updateModalCart();
  });
}
function update_cart(id, info) {
  $.ajax({
    type: "POST",
    url: "action/update_cart.php",
    data: { id: id, qty: info.value }
  }).done(function(id) {
    // console.log("update thanh cong " + data);
    // console.log($("#price" + id).val());
    // console.log(info.value);
    // console.log(id);
    $.ajax({
      type: "GET",
      url: "action/updateBoxPackage.php"
    }).done(function(data) {
      $("#box_package").html(data);
      console.log(data);
    });
    $("#total" + id).text(
      number_format(
        parseInt($("#price" + id).val()) * parseInt(info.value),
        0,
        ""
      ) + "VND"
    );
    updateModalCart();
  });
  // console.log(info.value);
}
function number_format(number, decimals, dec_point, thousands_sep) {
  // http://kevin.vanzonneveld.net
  // + original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
  // + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // + bugfix by: Michael White (http://crestidg.com)
  // + bugfix by: Benjamin Lupton
  // + bugfix by: Allan Jensen (http://www.winternet.no)
  // + revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
  // * example 1: number_format(1234.5678, 2, '.', '');
  // * returns 1: 1234.57

  var n = number,
    c = isNaN((decimals = Math.abs(decimals))) ? 2 : decimals;
  var d = dec_point == undefined ? "," : dec_point;
  var t = thousands_sep == undefined ? "." : thousands_sep,
    s = n < 0 ? "-" : "";
  var i = parseInt((n = Math.abs(+n || 0).toFixed(c))) + "",
    j = (j = i.length) > 3 ? j % 3 : 0;

  return (
    s +
    (j ? i.substr(0, j) + t : "") +
    i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) +
    (c
      ? d +
        Math.abs(n - i)
          .toFixed(c)
          .slice(2)
      : "")
  );
}
function callSnackbar(s, color) {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.innerHTML = s;
  x.className = "show";
  if (color === 1) x.style.backgroundColor = "#28a745";

  if (color === 2) x.style.backgroundColor = "#dc3545";
  if (color === 3) x.style.backgroundColor = "#ffc107";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function() {
    x.className = x.className.replace("show", "");
  }, 1000);
}
