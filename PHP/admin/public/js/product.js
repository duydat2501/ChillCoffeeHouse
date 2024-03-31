// 0 là tăng dần
// var optionId = 0;
// var optionImg = 0;
// var optionTitle = 0;
// var optionsummary = 0;
// var optionCasebook = 0;
// var optionPrice = 0;
// var optionAmount = 0;

function updateDiscounting(id, discounting, e) {
  let disc = discounting;
  if (discounting == 1) discounting = 0;
  else discounting = 1;
  console.log(e.onclick);
  $.ajax({
    type: "GET",
    url: "action/ActionProduct/updateDiscounting.php",
    data: { id: id, discounting: discounting }
  }).done(function(data) {
    if (data) {
      if (discounting == 0) {
        callSnackbar("Chuyển thành không khuyến mãi thành công", 1);
        e.setAttribute(
          "onclick",
          "updateDiscounting(" + id + ", " + discounting + ",this)"
        );
        e.className = "btn btn-secondary";
      } else {
        callSnackbar("Chuyển thành khuyến mãi thành công", 3); // vàng
        e.setAttribute(
          "onclick",
          "updateDiscounting(" + id + ", " + discounting + ",this)"
        );
        e.className = "btn btn-primary";
      }
    } else {
      if (discounting == 0)
        callSnackbar("Chuyển thành không khuyến mãi không thành công", 2);
      else callSnackbar("Chuyển thành khuyến mãi thành công", 2);
    }
  });
}

var sort = 0;
function getSearhProductByNumpage(numpage, i, value) {
  $.ajax({
    type: "GET",
    url: "action/search/product/getSearchProduct.php",
    data: { value: value, numpage: numpage }
  }).done(function(data) {
    $("#table_product").html(data);
    changeActivePage(i);
    console.log(data);
  });
}
function searchProduct(e, numpage) {
  value = e.value;
  // if (value.length == 0) {
  // $.ajax({
  //   type: "GET",
  //   url: "action/sort/product/sortIdProduct.php",
  //   data: { numpage: numpage, option: 0 }
  // }).done(function(data) {
  //   $.ajax({
  //     type: "GET",
  //     url: "action/sort/product/sortIdProductPagination.php",
  //     data: { numpage: numpage, option: 0 }
  //   }).done(function(data) {
  //     $("#pagination").html(data);
  //   });
  //   $("#table_product").html(data);
  // });
  // trả về trang chính
  // } else
  //lấy dữ liệu từ database về
  $.ajax({
    type: "GET",
    url: "action/search/product/getSearchProduct.php",
    data: { value: value, numpage: numpage }
  }).done(function(data) {
    //get trang về
    $.ajax({
      type: "GET",
      url: "action/search/product/getSearchProductPagination.php",
      data: { value }
    }).done(function(data) {
      $("#pagination").html(data);
    });
    $("#table_product").html(data);
    console.log(data);
  });
}

function sortProduct(option, numpage) {
  if (sort == 0) sort = 1;
  else sort = 0;

  $.ajax({
    type: "GET",
    url: "action/sort/product/sortProduct.php",
    data: {
      option: option,
      numpage: numpage,
      sort: sort,
      value: document.getElementById("searchProduct").value // nếu mà rỗng thì lấy tất cả còn ngược lại thì tìm theo
    }
  }).done(function(data) {
    // lấy trang về
    $.ajax({
      type: "GET",
      url: "action/sort/product/sortProductPagination.php",
      data: {
        option: option,
        value: document.getElementById("searchProduct").value
      }
    }).done(function(data) {
      $("#pagination").html(data);
    });
    $("#table_product").html(data);
  });
}

function sortProductByNumpage(numpage, i, option) {
  if (document.getElementById("searchProduct").value != "")
    $.ajax({
      type: "GET",
      url: "action/sort/product/sortProduct.php",
      data: {
        option: option, // search theo cái gì id, ảnh ,casebook
        numpage: numpage,
        sort: sort,
        value: document.getElementById("searchProduct").value
      }
    }).done(function(data) {
      $("#table_product").html(data);
      changeActivePage(i);
    });
  else
    $.ajax({
      type: "GET",
      url: "action/sort/product/sortProduct.php",
      data: { option: option, numpage: numpage, sort: sort }
    }).done(function(data) {
      $("#table_product").html(data);
      changeActivePage(i);
    });
}

function changeActivePage(i) {
  document.querySelectorAll("#pagination li.active")[0].className = "page-item";
  document.querySelectorAll("#pagination li.page-item")[i - 1].className +=
    " active";
}

function toolProduct() {
  let casebook = $("#casebook").val();
  let sort = $("#sort").val();
  console.log(casebook + " " + sort);
  $.ajax({
    type: "GET",
    url: "action/toolProduct.php",
    data: { casebook: casebook, sort: sort, numpage: 0 }
  }).done(function(data) {
    $.ajax({
      type: "GET",
      url: "action/getPageToolProduct.php",
      data: { casebook: casebook, sort: sort }
    }).done(function(data) {
      $("#pagination").html(data);
    });
    $("#table_product").html(data);
  });
}

function getToolProductByNumpage(pos, i) {
  let casebook = $("#casebook").val();
  let sort = $("#sort").val();
  $.ajax({
    type: "GET",
    url: "action/toolProduct.php",
    data: { casebook: casebook, sort: sort, numpage: pos }
  }).done(function(data) {
    $("#table_product").html(data);
    document.querySelectorAll("#pagination li.active")[0].className =
      "page-item";
    document.querySelectorAll("#pagination li.page-item")[i - 1].className +=
      " active";
  });
}

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



function addNewProduct() {
  console.log("123");
  $("#formAddNewProduct").ajaxSubmit({
    type: "POST",
    url: "action/addNewProduct.php",
    success: function(data) {
      //xem lại vị trí trang hiện tại
      var x = document.querySelectorAll("#pagination li.active")[0];
      getPaginationProduct(parseInt(x.textContent));
      // bỏ dữ liệu vào trong bảng mới thôi
      if (document.getElementsByTagName("tr").length != 8) {
        $.ajax({
          type: "GET",
          url: "action/updateNewProduct.php"
        }).done(function(data) {
          $("#table_product").append(data);
        });
      }
      if (data == 1) {
        //alert("yes");
        resetForm();
        callSnackbar("Thêm vào thành công", 1);
        document.getElementById("close").click();
      } else {
        //alert("no");
        callSnackbar("Thêm vào không thành công", 2);
      }
    }
  });
}
function resetForm() {
  $("#title").val("");
  $("#summary").val("");
  $("#price").val("");
  $("#qty").val("");
  document.getElementById("file").value = "";
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
  }, 3000);
}


var deleteProduct = function(id) {
  if (confirm("Bạn có chắc chắn muốn xóa sản phẩm"))
    $.ajax({
      type: "POST",
      url: "action/deleteProduct.php",
      data: { id: id }
    })
      .done(function(data) {
        if (data == 1) {
          callSnackbar("Xóa thành công", 1);
          // document.getElementById("tr" + id).style.display = "none";
          $("#tr" + id).remove();
          if (document.getElementsByTagName("tr").length == 1)
            //nếu mà số row == 1 thì cho về trang 1
            getPaginationProduct(1);
          else {
            let x = document.querySelectorAll("#pagination li.active")[0]; //tìm trang hiện tại
            getPaginationProduct(parseInt(x.textContent)); // load lại số trang
          }
        } else {
          console.log(data);
        }
        console.log("123");
      })
      .fail(function() {
        console.log("Lỗi rồi!!!!");
      });
};


// Promise.resolve().then(functionToRunVerySoonButNotNow);
function getPaginationProduct(cur_numpage) {
  $.ajax({
    type: "GET",
    url: "action/getPaginationProduct.php",
    data: { cur_numpage: cur_numpage }
  }).done(function(data) {
    $("#pagination").html(data);
    //console.log(data);
  });
}

// lấy dữ liệu bỏ vào modal
function updateProduct(id) {
  $.ajax({
    type: "GET",
    url: "action/updateProduct.php",
    data: { id: id }
  }).done(function(data) {
    $("#formUpdateProduct").html(data);
  });
  //alert("123");
}
//cập nhật lại dữ liệu trên database
function updateProductInDatabase() {
  let id = document.forms.formUpdateProduct.id.value;
  $("#formUpdateProduct").ajaxSubmit({
    type: "POST",
    url: "action/updateProductInDatabase.php",
    success: function(data) {
      if (data == 1) {
        $.ajax({
          type: "GET",
          url: "action/getOneRowAfterUpdateProduct.php",
          data: {
            id: id
          }
        }).done(function(data) {
          $("#tr" + id).html(data);
          // document.querySelectorAll("#tr" + 1 + " td")[0].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[1].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[2].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[3].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[4].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[5].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[6].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[7].style.animation =
          //   "example 4s";
          // document.getElementById("myDIV").style.animation = "mynewmove 4s 2";
        });
        callSnackbar("Chỉnh sửa thành công", 1);
        $("#updateProduct").modal("toggle");
      } else {
        callSnackbar("Chỉnh sửa không thành công", 2);
      }
    }
  });
}
function moreProduct(id) {
  $.ajax({
    type: "POST",
    url: "action/moreProduct.php",
    data: { id: id }
  }).done(function(data) {
    $("#formMoreProduct").html(data);
    console.log(data);
  });
}
