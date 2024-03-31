//get thông tin về cho modal
function getMoreDiscounting(id) {
  $.ajax({
    type: "GET",
    url: "action/ActionDiscounting/getMoreDiscounting.php",
    data: { id: id }
  })
    .done(function(data) {
      $("#formMoreDiscounting").html(data);
    })
    .fail(function(data) {
      console.log(data);
    });
}

function isChecked(idDiscounting) {
  let checkbox = document.querySelectorAll("#table_product input.checkbox");
  let arr = [];
  let dem = 0;
  for (let i = 0; i < checkbox.length; i++) {
    // console.log(checkbox[i]);
    if (checkbox[i].checked) {
      console.log(checkbox[i].value);
      arr[dem++] = checkbox[i].value;
    }
  }
  $.ajax({
    type: "GET",
    url: "action/ActionDiscounting/addProduct.php",
    data: { arr: arr, idDiscounting: idDiscounting }
  }).done(function(data) {
    console.log(data);
    for (let i = 0; i < checkbox.length; i++) {
      if (checkbox[i].checked) {
        $("#tr" + checkbox[i].value).remove();
      }
    }
    $("#table_product_discounting").append(data);
  });
}

function removeDiscounting(idDiscounting) {
  // alert("12");
  let checkbox = document.querySelectorAll(
    "#table_product_discounting input.checkbox"
  );
  let arr = [];
  let dem = 0;
  for (let i = 0; i < checkbox.length; i++) {
    if (checkbox[i].checked) {
      // console.log(checkbox[i]);
      arr[dem++] = checkbox[i].value;
    }
  }
  //remove tren server
  $.ajax({
    type: "GET",
    url: "action/ActionDiscounting/removeDiscounting.php",
    data: { arr: arr, idDiscounting: idDiscounting }
  }).done(function(data) {
    $.ajax({
      type: "GET",
      url: "action/ActionDiscounting/addFromDiscountingToProduct.php", // lấy thông tin về chuyển lên table
      data: { arr: arr, idDiscounting: idDiscounting }
    }).done(function(data) {
      if (data) {
        for (let i = 0; i < checkbox.length; i++) {
          if (checkbox[i].checked) {
            // console.log(checkbox[i]);
            $("#tr" + checkbox[i].value).remove();
          }
        }
        $("#table_product").prepend(data);
      } else {
        alert("Sai");
      }
    });

    // console.log(data);
  });
}
