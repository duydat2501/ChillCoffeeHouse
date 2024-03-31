function checklogin() {
  $.ajax({
    type: "POST",
    url: "action/checklogin.php",
    data: $("#form_login").serialize()
  }).done(function(data) {
    console.log(data);
    if (data == 1) {
      window.location.assign("?page=homepage");
    } else {
      alert("Tài khoản hoặc mật khẩu không chính xác");
    }
  });
}

function sign_out() {
  if (confirm("Bạn có chắc chắn muốn thoát ?"))
    $.ajax({
      type: "GET",
      url: "action/sign_out.php"
    }).done(function() {
      window.location.assign("?page=homepage");
    });
}
