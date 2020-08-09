function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
function logout(){
	bootbox.confirm({
    message: "Bạn có muốn đăng xuất không?",
    buttons: {
        cancel: {
            label: '<i class="fa fa-times"></i> Hủy'
        },
        confirm: {
            label: '<i class="fa fa-check"></i> Đăng Xuất'
        }
    },
    callback: function (result) {
        console.log('This was logged in the callback: ' + result);
    }
});
}