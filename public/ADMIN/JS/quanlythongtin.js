var iconmenu = document.querySelector(".menu-bar");
var _user = JSON.parse(localStorage.getItem("user_doan"));
// if (!_user) {
//     window.location.href = "http://127.0.0.1:5501/ADMIN/%C4%90%C4%83ng%20nh%E1%BA%ADp.html";
// }
iconmenu.onclick = function () {
    hienthimenu();
};

function closeOverlay() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("overlay2").style.display = "none";
}

function onOverlay() {
    document.getElementById("overlay").style.display = "block";
}
function onOverlay2() {
    document.getElementById("overlay2").style.display = "block";
}
var hienthichitiet = false;

function btn_hienthichitiet() {
    // Chuyển đổi trạng thái biến
    hienthichitiet = !hienthichitiet;

    if (hienthichitiet === true) {
        // Hiển thị biểu tượng set_icon_detail và ẩn biểu tượng icon_detail
        $("#icon_detail").hide();
        $("#set_icon_detail").show();

        // Ẩn nội dung của tất cả các dòng trừ dòng đầu tiên
        $("tr").not(":first").hide();

        // Hiển thị nội dung của dòng đầu tiên
        $("#ct_mota").show();
        $("#ct_image").show();
    } else {
        // Hiển thị biểu tượng icon_detail và ẩn biểu tượng set_icon_detail
        $("#icon_detail").show();
        $("#set_icon_detail").hide();

        // Hiển thị lại tất cả các dòng
        $("tr").show();
    }
}
