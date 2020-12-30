function layDanhSachPhim(){
    $.ajax({
        type: 'GET',
        cache: false,
        url: '/api/ajax/danh-sach-phim',
        dataType: 'html',
        async: true,
        success: function(data){
            document.getElementById('bodyTablePhim').innerHTML = data;
        },
        error: function(err){
            console.log('error: '+err);
        }
    });
}

function layThongTinRowClick(){
    var id = document.getElementById('bodyTablePhim').closest("tr").find("idPhim").text();

    $.ajax({
        type: 'GET',
        cache: false,
        url: '/api/ajax/phim',
        async: true,
        data: {
            "_token": "{{ csrf_token() }}",
            "id": id
        },
        success: function(res){
            $(".modal-backdrop").remove();
            var data = JSON.parse(res);

            dienThongTinModal(data);

            var el = document.getElementById('btnModal');
            el.innerHTML = "Cap nhat phim";
            el.onclick = capNhatPhim(id);
        },
        error: function(err){
            $(".modal-backdrop").remove();
            console.log('error: '+err);
        }
    });
}

function dienThongTinModal(data){
    document.getElementById('txtname').value = data.ten_phim;
    document.getElementById('select-theloai').value = data.id_the_loai;
    document.getElementById('txtthoiluong').value = data.thoi_luong;
    document.getElementById('txttrailer').value = data.trailer;
    document.getElementById('txttomtat').value = data.tom_tat;
    document.getElementById('hinh_anh').src = "/images/"+data.hinh_anh;
}

function layThongTinModal(){
    var data = document.getElementById('formI');
    var tl = document.getElementById('select-theloai').value;
    var arr = data.elements.namedItem("poster").value.split("\\");
    var len = arr.length;
    console.log(arr[len-1]);

    var phim = {
        "tenphim": data.elements.namedItem("tenphim").value,
        "theloai": tl,
        "thoiluong": data.elements.namedItem("thoiluong").value,
        "trailer": data.elements.namedItem("trailer").value,
        "tomtat": data.elements.namedItem("tomtat").value,
        "poster": arr[len-1]
    };
    return phim;
}

function themPhim(){
    var phim = layThongTinModal();
    $.ajax({
        type: 'POST',
        cache: false,
        url: '/api/ajax/them-phim',
        dataType: 'html',
        data: {
            "_token": "{{ csrf_token() }}",
            "phim": phim
        },
        success: function(data){
            $(".modal-backdrop").remove();
            console.log("success: "+ data);
            document.getElementById('bodyTablePhim').innerHTML = result;
        },
        error: function(data){
            $(".modal-backdrop").remove();
            document.getElementById('bodyTablePhim').innerHTML = data;
            console.log('fail: '+data);
        }
    });
}

function capNhatPhim(id){
    var phim = layThongTinModal();
    $.ajax({
        type: 'POST',
        cache: false,
        url: '/api/ajax/cap-nhat-phim',
        data: {
            "_token": "{{ csrf_token() }}",
            "id": id,
            "phim": phim
        },
        success: function(data){
            $(".modal-backdrop").remove();
            document.getElementById('bodyTablePhim').innerHTML = data;
        },
        error: function(data){
            $(".modal-backdrop").remove();
            document.getElementById('bodyTablePhim').innerHTML = data;
            console.log('fail: '+data);
        }
    });
}

document.getElementById('btnThem').onclick = function(){
    document.getElementById("formI").reset();
    var el = document.getElementById('btnModal');
    el.innerHTML = "Them phim";
    el.onclick = themPhim;
    document.getElementById('titleModal').innerHTML = "Them phim";
}

document.getElementById('getPhim').onclick = layThongTinRowClick;