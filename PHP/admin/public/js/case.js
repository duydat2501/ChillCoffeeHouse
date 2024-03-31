var sort = 0; // tăng dần
function sortCase(option) {
  if (sort == 0) sort = 1;
  else sort = 0;
  $.ajax({
    type: "GET",
    url: "action/sort/case/sortCase.php",
    data: { option: option, sort: sort }
  }).done(function (data) {
    $("#table_case").html(data);
  });
}
// gọi dữ liệu bỏ vào modal update
function getUpdateCasebook(casebook, pos) {
  //pos là vị trí cái row
  $.ajax({
    type: "GET",
    url: "action/ActionCasebook/getUpdateCasebook.php",
    data: { casebook: casebook, pos: pos }
  }).done(function (data) {
    $("#formUpdateCasebook").html(data);
  });
}
// gửi cái post lên server

function updateCasebook(pos) {
  if (confirm("Bạn có chắc chắc muốn cập nhật dữ liệu ?"))
    $("#formUpdateCasebook").ajaxSubmit({
      type: "POST",
      url: "action/ActionCasebook/updateCasebook.php",
      success: function (data) {
        console.log(document.forms.formUpdateCasebook.casebook.value);
        $.ajax({
          type: "GET",
          url: "action/ActionCasebook/getOneRowAfterUpdateProduct.php",
          data: {
            casebook: document.forms.formUpdateCasebook.casebook.value,
            pos: pos
          } //pos là vị trí cái row
        }).done(function (data) {
          $("#tr" + pos).html(data);
        });
        if (data) {
          callSnackbar("Cập nhật thành công ", 1);
          $("#updateCasebook").modal("hide");
        } else callSnackbar("Cập nhật không thành công", 2);
        console.log(data);
      }
    });
}


function addNewCategory() {
  console.log("123");
  $("#formAddNewCategory").ajaxSubmit({
    type: "POST",
    url: "action/addNewCategory.php",
    success: function (data) {
      //xem lại vị trí trang hiện tại
      // var x = document.querySelectorAll("#pagination li.active")[0];
      // getPaginationCategory(parseInt(x.textContent));
      // bỏ dữ liệu vào trong bảng mới thôi
      if (document.getElementsByTagName("tr").length != 8) {
        $.ajax({
          type: "GET",
          url: "action/updateNewCategory.php"
        }).done(function (data) {
          $("#table_Category").append(data);
        });
      }
      if (data == 1) {
        //alert("yes");
        console.log(data);

        resetForm();
        callSnackbar("Thêm vào thành công", 1);
        document.getElementById("close").click();

        setTimeout(function () {
          location.reload();
        }, 1000);

        
      } else {
        //alert("no");
        callSnackbar("Thêm vào không thành công", 2);
      }
    }
  });
}
function resetForm() {
  $("#id_dm").val("");
  $("#title").val("");
}

// Promise.resolve().then(functionToRunVerySoonButNotNow);
function getPaginationCategory(cur_numpage) {
  $.ajax({
    type: "GET",
    url: "action/getPaginationCategory.php",
    data: { cur_numpage: cur_numpage }
  }).done(function (data) {
    $("#pagination").html(data);
    //console.log(data);
  });
}

var deleteCasebook = function(casebook) {
  if (confirm("Bạn có chắc chắn muốn xóa danh mục"))
    $.ajax({
      type: "POST",
      url: "action/deleteCategory.php",
      data: { casebook: casebook }
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

