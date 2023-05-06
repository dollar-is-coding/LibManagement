document.getElementById("form_them_sach").addEventListener("submit", (event) => {
    // Validate input file
    var hinhAnh = document.getElementById("upload-file");
    var tenSach = document.getElementById("ten_sach");
    var tacGia = document.querySelector(".tac_gia");
    var theLoai = document.querySelector(".the_loai");
    var nhaXuatBan = document.querySelector(".nha_xuat_ban");
    var namXuatBan = document.querySelector(".nam_xuat_ban");
    var tuSach = document.querySelector(".tu_sach");
    var soLuong = document.querySelector(".so_luong");
    var khuVuc = document.querySelector(".khu_vuc");
    var tomTat = document.querySelector(".tom_tat");
    if (!validateTenSach()) {
        event.preventDefault();
        return;
    }

    function validateTenSach() {
        if (tenSach.value === '') {
            tenSach.setCustomValidity("Vui lòng nhập tên sách :))");
            return false;
        }
        return true;
    }
    function validateTacGia() {
        if (tacGia.value === '') {
            tacGia.setCustomValidity("Vui lòng chọn tác giả :))");
            return false;
        }
        return true;
    }
    function validateTheLoai() {
        if (theLoai.value === '') {
            theLoai.setCustomValidity("Vui lòng chọn thể loại :))");
            return false;
        }
        return true;
    }
    function validateNhaXuatBan() {
        if (nhaXuatBan.value === '') {
            nhaXuatBan.setCustomValidity("Vui lòng chọn nhà xuất bản :))");
            return false
        }
        return true;
    }
    function validateNamXuatBan() {
        if (namXuatBan.value === '') {
            namXuatBan.setCustomValidity("Vui lòng nhập năm xuất bản :))");
            return false;
        }
        return true;
    }
    function validateTuSach() {
        if (tuSach.value === '') {
            tuSach.setCustomValidity("Vui lòng chọn tủ sách :))");
            return false;
        }
        return false;
    }
    function validateSoLuong() {
        if (soLuong.value === '') {
            soLuong.setCustomValidity("Vui lòng nhập số lượng :))");
            return false;
        }
        return true;
    }
    function validateKhuVuc() {
        if (khuVuc.value === '') {
            khuVuc.setCustomValidity("Vui lòng chọn khu vực");
            return false;
        }
        return true;
    }
    function validateTomTat(){
        if (tomTat.value === '') {
            tomTat.setCustomValidity("vui lòng không bỏ trống :))");
            return false
        }
        return true;
    }
    function validateHinhAnh() {
        if (hinhAnh.value === '') {
            hinhAnh.setCustomValidity("Vui lòng chọn 1 ảnh");
            return false;
        }
        return true;
    }
});
