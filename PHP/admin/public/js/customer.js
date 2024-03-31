var sort = 0; // sắp xếp tăng dần
function moreUser(id) {
  $.ajax({
    type: "GET",
    url: "action/ActionUser/getMoreUser.php",
    data: { id: id }
  }).done(function (data) {
    $("#formMoreUser").html(data);
  });
}

function sortUser(option) {
  if (sort == 0) sort = 1;
  else sort = 0;
  $.ajax({
    type: "GET",
    url: "action/sort/user/sortUser.php",
    data: { option: option, sort: sort }
  }).done(function (data) {
    $("#table_customer").html(data);
  });
}
//lấy dữ liệu thông tin bỏ vào modal
function getUpdateUser(idUser) {
  $.ajax({
    type: "GET",
    url: "action/ActionUser/getUpdateUser.php",
    data: { id: idUser }
  }).done(function (data) {
    $("#formUpdateUser").html(data);
  });
}

// add user

function addNewUser() {
  console.log("123");
  $("#formAddNewUser").ajaxSubmit({
    type: "POST",
    url: "action/addNewUser.php",
    success: function (data) {
      //xem lại vị trí trang hiện tại
      // var x = document.querySelectorAll("#pagination_user li.active")[0];
      // getPaginationUser(parseInt(x.textContent));
      // bỏ dữ liệu vào trong bảng mới thôi
      if (document.getElementsByTagName("tr").length != 8) {
        $.ajax({
          type: "GET",
          url: "action/updateNewUser.php"
        }).done(function (data) {
          // $("#table_customer").append(data);
        });
      }
      console.log(data);

      if (data == 1) {
        //alert("yes");

        resetForm();
        callSnackbar("Thêm vào thành công", 1);
        document.getElementById("close").click();

        // reload sau 1 giây
        setTimeout(function () {
          location.reload();
        }, 1000);
      }
      else if (data == 2) {
        callSnackbar("Email đã tồn tại! Vui lòng kiểm tra lại!", 2);
      }
      else if (data == 3) {
        callSnackbar("Tên đăng nhập đã tồn tại! Vui lòng kiểm tra lại!", 2);
      }

      else {
        //alert("no");
        callSnackbar("Thêm vào không thành công", 2);
      }
    }
  });
}

function resetForm() {
  $("#username").val("");
  $("#password").val("");
  $("#firstname").val("");
  $("#lastname").val("");
  $("#email").val("");
  $("#dob").val("");
  $("#sex").val("");
  $("#address").val("");
  $("#phone_number").val("");
  $("#admin").val("");

}

// // Promise.resolve().then(functionToRunVerySoonButNotNow);
function getPaginationUser(cur_numpage) {
  $.ajax({
    type: "GET",
    url: "action/getPaginationUser.php",
    data: { cur_numpage: cur_numpage }
  }).done(function (data) {
    $("#pagination_user").html(data);
    //console.log(data);
  });
}


function getUser(numpage, i) {
  $.ajax({
    type: "POST",
    url: "action/getUser.php",
    data: { num: numpage }
  }).done(function (data) {
    $("#table_customer").html(data);
  });
  document.querySelectorAll("#pagination_user li.active")[0].className = "page-item";
  document.querySelectorAll("#pagination_user li")[i - 1].className =
    "page-item active";
}

// xoa user

var deleteUser = function(id) {
  if (confirm("Bạn có chắc chắn muốn xóa tài khoản"))
    $.ajax({
      type: "POST",
      url: "action/deleteUser.php",
      data: { id: id }
    })
      .done(function(data) {
        if (data == 1) {
          callSnackbar("Xóa thành công", 1);
          // document.getElementById("tr" + id).style.display = "none";
          // $("#tr" + casebook).remove();
          // if (document.getElementsByTagName("tr").length == 1)
          //   //nếu mà số row == 1 thì cho về trang 1
          //   getPaginationCategory(1);
          // else {
          //   let x = document.querySelectorAll("#pagination li.active")[0]; //tìm trang hiện tại
          //   getPaginationCategory(parseInt(x.textContent)); // load lại số trang
          // }

          setTimeout(function () {
            location.reload();
          }, 1000);
  
        } else {
          console.log(data);
        }
        console.log("123");
      })
      .fail(function() {
        console.log("Lỗi rồi!!!!");
      });
};

