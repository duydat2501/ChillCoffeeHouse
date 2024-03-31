function processOrder(id) {
  if (confirm("Bạn có chắc chắn muốn xử lý đơn hàng"))
    if (confirm("Đơn hàng được xử lí sẽ không thể hủy"))
      $.ajax({
        type: "GET",
        url: "action/processOrder.php",
        data: { id: id },
        success: function(data) {
          if (data == 1) {
            $("#tdcheck" + id).html('<span class="badge badge-danger p-2">Đã xử lý</span>');
            document.getElementById("tdcheck" + id).className = "process";
            callSnackbar("Đơn hàng đã được xử lý", "1");
          } else {
            // Nếu không cập nhật được tình trạng đơn hàng
            callSnackbar("Không cập nhật được tình trạng đơn hàng!", "3");
          }
        }
      });
      //   data: { id: id }
      // }).done(function () {
      //   $("#tdcheck" + id).html(
      //     '<span class="badge badge-danger p-2">Đã xử lý</span>'
      //   );
      //   document.getElementById("tdcheck" + id).className = "process";
      //   callSnackbar("Đơn hàng đã được xử lý", "1");
      // });

      
}



function getOrder(numpage, cur_numpage) {
  $.ajax({
    type: "GET",
    url: "action/getOrder.php",
    data: { numpage: numpage }
  }).done(function (data) {
    document.querySelectorAll("#pagination_order li.active")[0].className =
      "page-item";
    document.querySelectorAll("#pagination_order li")[cur_numpage - 1].className +=
      " active";
    $("#table_order").html(data);
  });
}

function moreOrder(id, idUser) {
  $.ajax({
    type: "GET",
    url: "action/getMoreOrder.php",
    data: { id: id, idUser: idUser }
  }).done(function (data) {
    $("#formMoreOrder").html(data);
  });
}

//delete order
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
  setTimeout(function () {
    x.className = x.className.replace("show", "");
  }, 3000);
}

// var deleteOrder = function (id) {
//   if (confirm("Bạn có chắc chắn muốn xóa đơn hàng"))
//     $.ajax({
//       type: "POST",
//       url: "action/deleteOrder.php",
//       data: { id: id }
//     })
//       .done(function (data) {
//         if (data == 1) {
//           callSnackbar("Xóa thành công", 1);
//           // document.getElementById("tr" + id).style.display = "none";
//           $("#tr" + id).remove();
//           if (document.getElementsByTagName("tr").length == 1)
//             //nếu mà số row == 1 thì cho về trang 1
//             getPaginationOrder(1);
//           else {
//             let x = document.querySelectorAll("#pagination_order li.active")[0]; //tìm trang hiện tại
//             getPaginationOrder(parseInt(x.textContent)); // load lại số trang
//             // Reload the current page after a delay of 1 second 
//           }
//         } else {
//           console.log(data);
//         }
//         console.log("123");
//         location.reload();
//       })
//       .fail(function () {
//         console.log("Lỗi rồi!!!!");
//       });

// };

// // Promise.resolve().then(functionToRunVerySoonButNotNow);
// function getPaginationOrder(cur_numpage) {
//   $.ajax({
//     type: "GET",
//     url: "action/getPaginationOrder.php",
//     data: { cur_numpage: cur_numpage }
//   }).done(function (data) {
//     $("#pagination_order").html(data);
//     //console.log(data);
//   });
// }


//-------update order
// lấy dữ liệu bỏ vào modal
function updateOrder(id) {
  $.ajax({
    type: "GET",
    url: "action/updateOrder.php",
    data: { id: id }
  }).done(function (data) {
    $("#formUpdateOrder").html(data);
  });
  //alert("123");
}

// //cập nhật lại dữ liệu trên database
// function updateOrderInDatabase() {
//   let id = document.forms.formUpdateOrder.id.value;
//   $("#formUpdateOrder").ajaxSubmit({
//     type: "POST",
//     url: "action/updateOrderInDatabase.php",
//     success: function(data) {
//       if (data == 1) {
//         $.ajax({
//           type: "GET",
//           url: "action/getOneRowAfterUpdateOrder.php",
//           data: {
//             id: id
//           }
//         }).done(function(data) {
//           $("#tr" + id).html(data);
//           // document.querySelectorAll("#tr" + 1 + " td")[0].style.animation =
//           //   "example 4s";
//           // document.querySelectorAll("#tr" + 1 + " td")[1].style.animation =
//           //   "example 4s";
//           // document.querySelectorAll("#tr" + 1 + " td")[2].style.animation =
//           //   "example 4s";
//           // document.querySelectorAll("#tr" + 1 + " td")[3].style.animation =
//           //   "example 4s";
//           // document.querySelectorAll("#tr" + 1 + " td")[4].style.animation =
//           //   "example 4s";
//           // document.querySelectorAll("#tr" + 1 + " td")[5].style.animation =
//           //   "example 4s";
//           // document.querySelectorAll("#tr" + 1 + " td")[6].style.animation =
//           //   "example 4s";
//           // document.querySelectorAll("#tr" + 1 + " td")[7].style.animation =
//           //   "example 4s";
//           // document.getElementById("myDIV").style.animation = "mynewmove 4s 2";
//         });
//         callSnackbar("Chỉnh sửa thành công", 1);
//         $("#updateOrder").modal("toggle");
//       } else {
//         callSnackbar("Chỉnh sửa không thành công", 2);
//       }
//     }
//   });
// }

function getToolOrderByNumpage(pos, i) {
  let casebook = $("#casebook").val();
  let sort = $("#sort").val();
  $.ajax({
    type: "GET",
    url: "action/toolOrder.php",
    data: { casebook: casebook, sort: sort, numpage: pos }
  }).done(function (data) {
    $("#table_order").html(data);
    document.querySelectorAll("#pagination_order li.active")[0].className =
      "page-item";
    document.querySelectorAll("#pagination_order li.page-item")[i - 1].className +=
      " active";
  });
}

