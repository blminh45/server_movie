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

var el = document.getElementById('btnModal');

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
    $("#mediumModal").modal("hide");
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
            document.getElementById('bodyTablePhim').innerHTML = data;
            
            document.getElementById("formI").reset();
        },
        error: function(data){
            $(".modal-backdrop").remove();
            document.getElementById('bodyTablePhim').innerHTML = data;
            console.log('fail: '+data);
        }
    });
}

document.getElementById('btnThem').onclick = function(){
    el.innerHTML = "Them phim";
    el.onclick = themPhim;
    document.getElementById('titleModal').innerHTML = "Them phim";
}

