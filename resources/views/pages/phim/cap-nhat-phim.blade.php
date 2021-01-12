@extends('layouts.default')

@section('noi-dung')

<section class="wrapper">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="titleModal" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="modalTenPhim">Tên phim</label>
                        <input type="text" class="form-control" id="modalTenPhim" placeholder="Nhập tên phim" name="tenphim">
                    </div>
                    <div class="form-group">
                        <label for="select-theloai">Thể loại</label>
                        <select class="form-control" id="select-theloai" name="theloai">
                            @foreach($the_loais as $item)
                            <option value="{{ $item->id }}">{{ $item->ten_the_loai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modalThoiLuong">Thời lượng</label>
                        <input type="text" class="form-control" id="modalThoiLuong" placeholder="Thời lượng" name="thoiluong">
                    </div>
                    <div class="form-group">
                        <label for="modalTrailer">Trailer</label>
                        <input type="text" class="form-control" id="modalTrailer" placeholder="Trailer" name="trailer">
                    </div>
                    <div class="form-group">
                        <label for="modalNoiDung">Tóm tắt nội dung</label>
                        <textarea class="form-control" id="modalNoiDung" rows="8" name="tomtat"></textarea>
                    </div>
                    <div class="form-group">
                        <div id="hinh_anh" style="height: 100px; width: 80%; margin-bottom: 5px;">
                            <img id="modalHinhAnh" src="/images/{{ $item->hinh_anh }}" style="height: 80px; object-fit: scale-down;" alt="hinh anh" >
                        </div>
                        <label for="modalLayAnh">Tải ảnh lên</label>
                        <input type="file" class="form-control-file" id="modalLayAnh" name="hinhanh">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnCreateModal" type="button" class="btn btn-default hidden" data-dismiss="modal">Create</button>
                    <button id="btnUpdateModal" type="button" class="btn btn-default hidden" data-dismiss="modal">Update</button>
                </div>
            </div>
        </div>
    </div>

    <button id="btnCreate" type="button" class="btn btn-info btn-lg">Create</button>
    <hr>
    <div class="table-responsive">
        <table id="tableUser" class="table table-bordered">
            <thead>
                <tr class="info">
                    <th>Tên phim</th>
                    <th>Hình ảnh</th>
                    <th>Thể loại</th>
                    <th>Thời lượng</th>
                    <th>Nội dung</th>
                    <th>Cap nhat</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach($phim as $u)
                <tr class="warning">
                    <td style="display: none;" class="rowId">{{ $u->id }}</td>
                    <td class="rowTenPhim">{{ $u->ten_phim }}</td>
                    <td class="rowHinhAnh"><img width="50%" src="/images/{{ $u->hinh_anh }}"></td>
                    <td class="rowTheLoai">{{ $u->the_loai->ten_the_loai }}</td>
                    <td class="rowThoiLuong">{{ $u->thoi_luong }}</td>
                    <td class="rowNoiDung">{{ $u->noi_dung }}</td>
                    <td>
                        <button type="button" class="btn btn-success btn-lg btnEdit">
                            <i class="fa fa-pencil"></i>
                            <span>Sua</span>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>

@endsection

@section('script')
<script type="text/javascript">
    function resetInput(){
        $('#modalTenPhim').val("");
        $('#modalNoiDung').val("");
        $('#modalHinhAnh').val("");
        $('#modalThoiLuong').val("");
        $('#select-theloai').val("");
        $('#modalTrailer').val("");
    }

    function getInfoModal(){
        var ten = $('#modalTenPhim').val();
        var noidung =  $('#modalNoiDung').val();
        // var hinh = $('#modalHinhAnh').attr("src");
        var arr = $('#modalLayAnh').val().split("\\");
        var hinh = arr[arr.length-1];
        console.log("get hinh in modal:"+hinh);
        var thoiluong = $('#modalThoiLuong').val();
        var theloai = $('#select-theloai').val();
        var trailer = $('#modalTrailer').val();
        var phim = {
            "tenphim": ten,
            "tomtat": noidung,
            "hinhanh": hinh,
            "thoiluong": thoiluong,
            "theloai": theloai,
            "trailer": trailer
        }

        return phim;
    }

    $('#btnCreate').on('click', function(){
        resetInput();
        $('#myModal').modal();
        $('#titleModal').html("Create User");
        $('#btnCreateModal').toggleClass('hidden');

        $('#btnCreateModal').on('click', function(){
            $.ajax({
                type: 'POST',
                cache: false,
                url: '/api/ajax/them-phim',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "phim": getInfoModal()
                },
                success: function(data){
                    console.log("create success: " + data);
                    console.log("create success: "+JSON.parse(data));
                    var result = JSON.parse(data);

                    $('table tbody').append("<tr class='warning'><td style='display: none;' class='rowId'>"+result.id+"</td><td class='rowTenPhim'>"+result.ten_phim+"</td><td class='rowHinhAnh'><img width='50%' src='/images/"+result.hinh_anh+"'></td><td class='rowTheLoai'>"+result.the_loai.ten_the_loai+"</td><td class='rowThoiLuong'>"+result.thoi_luong+"</td><td class='rowNoiDung'>"+result.tom_tat+"</td><td><button type='button' class='btn btn-success btn-lg btnEdit'><i class='fa fa-pencil'></i><span>Sua</span></button></td></tr>");
                    $('#btnCreateModal').toggleClass('hidden');
                },
                error: function(err){
                    console.log("fail: "+err);
                }
            });
        })
    });

    function getPhim(id){
        $.ajax({
            type: 'GET',
            url: 'api/ajax/phim',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(data){
                console.log("get phim success: "+data.ten_phim);
                console.log("get phim success: "+JSON.parse(data).ten_phim);
                var phim = JSON.parse(data);
                $('#modalTenPhim').val(phim.ten_phim);
                $('#modalNoiDung').val(phim.tom_tat);
                $('#modalHinhAnh').val(phim.hinh_anh);
                $('#modalTrailer').val(phim.trailer);
                $('#modalThoiLuong').val(phim.thoi_luong);
                $('#select-theloai').val(phim.id_the_loai);
            },
            error: function(err){
                return err;
            }
        });
    }

    $('#tableUser').on('click', '.btnEdit', function(){
        $('#btnUpdateModal').toggleClass('hidden');
        $('#myModal').modal();
        $('#titleModal').html("Edit User");

        var id = $(this).closest("tr").find(".rowId").text();
        console.log("id: "+id);

        getPhim(id);

        $('#btnUpdateModal').on('click', function(){
            $('#btnUpdateModal').toggleClass('hidden');
            $.ajax({
                type: 'POST',
                cache: false,
                url: '/api/ajax/cap-nhat-phim',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "phim": getInfoModal()
                },
                success: function(data){
                    console.log("update success data: " + data);
                    console.log("update success: "+JSON.parse(data).ten_phim);
                    var result = JSON.parse(data);
                    console.log("update result: "+result.ten_phim);

                    $("table tr").each(function(){
                        // console.log("id: "+$(this).find(".rowId").html());
                        if($(this).find(".rowId").html() == id){
                            console.log($(this).find(".rowTenPhim").html());
                            $(this).find(".rowTenPhim").html(result.ten_phim);
                            console.log("ten phim: "+result.ten_phim);
                            $(this).find(".rowHinhAnh").html("<img width='50%' src='/images/"+result.hinh_anh+"'>");
                            console.log("hinh anh: "+result.hinh_anh);
                            $(this).find(".rowTheLoai").html(result.id_the_loai.ten_the_loai);
                            console.log("the loai: "+result.id_the_loai);
                            $(this).find("rowThoiLuong").html(result.thoi_luong);
                            $(this).find("rowNoiDung").html(result.tom_tat);
                        }
                    })
                },
                error: function(err){
                    console.log("fail: "+err);
                }
            })
        });
    })
</script>
@endsection
