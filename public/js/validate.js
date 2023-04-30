document.getElementById("form_them_sach").addEventListener("submit", function (event) {
    // Validate input file
    var inputFile = document.getElementById("upload-file");
    if (!inputFile.files.length) {
        event.preventDefault();
        inputFile.setCustomValidity("Vui lòng chọn một tập tin");
         
    } else {
        inputFile.setCustomValidity("");
    }
    var textarea = document.getElementById("#tom_tat");
    textarea.addEventListener("input", function () {
        var content = this.value;
        if (/^[A-Za-z0-9\u00C0-\u017F]{100,200}$/.test(content)) {
            this.setCustomValidity("");
        } else {
            this.setCustomValidity(
                "Tóm tắt nội dung sách phải chứa từ 100 đến 200 ký tự chữ cái hoặc số"
            );
        }   
    });
    // pattern = "[A-Za-z0-9\u00C0-\u017F]{3,30}";
});
