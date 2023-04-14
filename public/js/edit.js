
//edit author
function editAuthor(id, name) {
    Swal.fire({
        title: 'Sửa tác giả',
        html:
            `<form class="mt-4" action="/sua-tac-gia/${id}" method="POST">
            <div class="form-group">
            <label>Tên tác giả:</label>
            <input type="text" class="form-control" name="ten" value="${name}">
            </div>
            </form>`,
        showCancelButton: true,
        confirmButtonText: 'Sửa',
        cancelButtonText: 'Hủy',
        focusConfirm: false,
        preConfirm: () => {
            const form = Swal.getPopup().querySelector('form')
            const name = form.querySelector('input[name="ten"]').value
            if (!name) {
                Swal.showValidationMessage('Vui lòng nhập tên tác giả')
            }
            return { id: id, name: name }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            let csrf = document.querySelector('input[name="_token"]').value;

            Swal.fire({
                title: 'Đang sửa tác giả...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                    $.ajax({
                        type: "POST",
                        url: `/sua-tac-gia/${id}`,
                        data: {
                            _token: csrf,
                            id: result.value.id,
                            tac_gia: result.value.name,
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sửa tác giả thành công',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Có lỗi xảy ra khi sửa tác giả',
                                text: xhr.responseJSON.message
                            });
                        }
                    });
                }
            });
        }
    });
}


//sua nha xuat ban
function editPublisher(id, name) {
    Swal.fire({
        title: 'Sửa nhà xuất bản',
        html:
            `<form class="mt-4" action="/sua-nha-xuat-ban/${id}" method="POST">
            <div class="form-group">
            <label>Tên nhà sản xuất:</label>
            <input type="text" class="form-control" name="ten" value="${name}">
            </div>
            </form>`,
        showCancelButton: true,
        confirmButtonText: 'Sửa',
        cancelButtonText: 'Hủy',
        focusConfirm: false,
        preConfirm: () => {
            const form = Swal.getPopup().querySelector('form')
            const name = form.querySelector('input[name="ten"]').value
            if (!name) {
                Swal.showValidationMessage('Vui lòng nhập tên nhà xuất bản')
            }
            return { id: id, name: name }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            let csrf = document.querySelector('input[name="_token"]').value;

            Swal.fire({
                title: 'Đang sửa tên nhà xuất bản...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                    $.ajax({
                        type: "POST",
                        url: `/sua-nha-xuat-ban/${id}`,
                        data: {
                            _token: csrf,
                            id: result.value.id,
                            nha_xuat_ban: result.value.name,
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sửa tên nhà nhà xuất bản thành công',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Có lỗi xảy ra khi sửa tên nhà xuất bản',
                                text: xhr.responseJSON.message
                            });
                        }
                    });
                }
            });
        }
    });
}
//sua khu vực
function editArea(id, name) {
    Swal.fire({
        title: 'Sửa khu vực',
        html:
            `<form class="mt-4" action="/sua-khu-vuc/${id}" method="POST">
            <div class="form-group">
            <label>Tên khu vực:</label>
            <input type="text" class="form-control" name="ten" value="${name}">
            </div>
            </form>`,
        showCancelButton: true,
        confirmButtonText: 'Sửa',
        cancelButtonText: 'Hủy',
        focusConfirm: false,
        preConfirm: () => {
            const form = Swal.getPopup().querySelector('form')
            const name = form.querySelector('input[name="ten"]').value
            if (!name) {
                Swal.showValidationMessage('Vui lòng nhập tên khu vực')
            }
            return { id: id, name: name }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            let csrf = document.querySelector('input[name="_token"]').value;

            Swal.fire({
                title: 'Đang sửa khu vực...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                    $.ajax({
                        type: "POST",
                        url: `/sua-khu-vuc/${id}`,
                        data: {
                            _token: csrf,
                            id: result.value.id,
                            khu_vuc: result.value.name,
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sửa khu vực thành công',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Có lỗi xảy ra khi sửa khu vực',
                                text: xhr.responseJSON.message
                            });
                        }
                    });
                }
            });
        }
    });
}
//sau khu vực
function editCategory(id, name) {
    Swal.fire({
        title: 'Sửa thể loại',
        html:
            `<form class="mt-4" action="/sua-the-loai/${id}" method="POST">
            <div class="form-group">
            <label>Tên thể loại:</label>
            <input type="text" class="form-control" name="ten" value="${name}">
            </div>
            </form>`,
        showCancelButton: true,
        confirmButtonText: 'Sửa',
        cancelButtonText: 'Hủy',
        focusConfirm: false,
        preConfirm: () => {
            const form = Swal.getPopup().querySelector('form')
            const name = form.querySelector('input[name="ten"]').value
            if (!name) {
                Swal.showValidationMessage('Vui lòng nhập tên thể loại')
            }
            return { id: id, name: name }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            let csrf = document.querySelector('input[name="_token"]').value;

            Swal.fire({
                title: 'Đang sửa thể loại...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                    $.ajax({
                        type: "POST",
                        url: `/sua-the-loai/${id}`,
                        data: {
                            _token: csrf,
                            id: result.value.id,
                            the_loai: result.value.name,
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sửa thể loại thành công',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Có lỗi xảy ra khi sửa thể loại',
                                text: xhr.responseJSON.message
                            });
                        }
                    });
                }
            });
        }
    });
}

//sau the loai
function editCategory(id, name) {
    Swal.fire({
        title: 'Sửa thể loại',
        html:
            `<form class="mt-4" action="/sua-the-loai/${id}" method="POST">
            <div class="form-group">
             <label>Tên thể loại:</label>
            <input type="text" class="form-control" name="ten" value="${name}">
            </div>
            </form>`,
        showCancelButton: true,
        confirmButtonText: 'Sửa',
        cancelButtonText: 'Hủy',
        focusConfirm: false,
        preConfirm: () => {
            const form = Swal.getPopup().querySelector('form')
            const name = form.querySelector('input[name="ten"]').value
            if (!name) {
                Swal.showValidationMessage('Vui lòng nhập tên thể loại')
            }
            return { id: id, name: name }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            let csrf = document.querySelector('input[name="_token"]').value;

            Swal.fire({
                title: 'Đang sửa thể loại...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                    $.ajax({
                        type: "POST",
                        url: `/sua-the-loai/${id}`,
                        data: {
                            _token: csrf,
                            id: result.value.id,
                            the_loai: result.value.name,
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sửa thể loại thành công',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Có lỗi xảy ra khi sửa thể loại',
                                text: xhr.responseJSON.message
                            });
                        }
                    });
                }
            });
        }
    });
}

//sửa tủ sách
function editBookcase(id, name) {
    Swal.fire({
        title: 'Sửa tủ sách',
        html:
            `<form class="mt-4" action="/sua-tu-sach/${id}" method="POST">
            <div class="form-group">
             <label>Chọn khu vực:</label>
            <select id="khu-vuc-select1" class="form-control select2-no-search">
            @foreach ($khu_vuc as $item)
            <option value="{{$item->id}}">{{$item->ten}}</option>
            @endforeach
            </select>
            <label>Tên tủ sách:</label>
            <input type="text" class="form-control" name="ten" value="${name}">
            </div>
            </form>`,
        showCancelButton: true,
        confirmButtonText: 'Sửa',
        cancelButtonText: 'Hủy',
        focusConfirm: false,
        preConfirm: () => {
            const form = Swal.getPopup().querySelector('form')
            const name = form.querySelector('input[name="ten"]').value
            if (!name) {
                Swal.showValidationMessage('Vui lòng nhập tên thể loại')
            }
            return { id: id, name: name }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            let csrf = document.querySelector('input[name="_token"]').value;

            Swal.fire({
                title: 'Đang sửa thể loại...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                    $.ajax({
                        type: "POST",
                        url: `/sua-the-loai/${id}`,
                        data: {
                            _token: csrf,
                            id: result.value.id,
                            the_loai: result.value.name,
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sửa thể loại thành công',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Có lỗi xảy ra khi sửa thể loại',
                                text: xhr.responseJSON.message
                            });
                        }
                    });
                }
            });
        }
    });
}
