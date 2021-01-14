@extends('layouts.default')

@section('noi-dung')

<section>
    <div id="movieModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="titleModal" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="modalTenPhim">Name</label>
                        <input type="text" class="form-control" id="modalTenPhim"  name="movieName">
                    </div>
                    <div class="form-group">
                        <label for="select-theloai">Genres</label>
                        <select class="form-control" id="select-theloai" name="theloai">
                            @foreach($theloai as $tl)
                            <option value="{{ $tl->id }}">{{ $tl->ten_the_loai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div id="hinh_anh" style="height: 100px; width: 80%; margin-bottom: 5px;">
                            <img id="modalHinhAnh" src="/img" style="height: 80px; object-fit: scale-down;" alt="hinh anh" >
                        </div>
                        <label for="modalLayAnh">Tải ảnh lên</label>
                        <input type="file" class="form-control-file" id="modalLayAnh" name="hinhanh">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnEdit" class="btn btn-success">Edit</button>
                    <button id="btnDel" class="btn btn-danger" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="tableDemo" class="table table-bordered">
            <thead>
                <tr class="info">
                    <th>Name</th>
                    <th>Genres</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach($phim as $p)
                <tr id="{{ $p->id }}" class="warning">
                    <td class="rowName">{{ $p->ten_phim }}</td>
                    <td class="rowGenres">{{ $p->the_loai->ten_the_loai }}</td>
                    <td class="rowImg" style="width: 200px;">
                        <img width="25%" class="hinhanh" src="/images/{{ $p->hinh_anh }}" alt="hinh anh">
                    </td>
                    <td>
                        <button class="btn btn-success editBtn" data-dismiss="modal">Edit</button>
                    </td>
                    <td>
                        <button class="btn btn-default delBtn" data-dismiss="modal">Delete</button>
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
    function getInfoModal(){
        var ten = $('#modalTenPhim').val();
        var arr = $('#modalLayAnh').val().split("\\");
        var hinh = arr[arr.length-1];
        // console.log("get hinh in modal:"+hinh);
        var theloai = $('#select-theloai').val();
        var phim = {
            "tenphim": ten,
            "tomtat": "noidung",
            "hinhanh": hinh,
            "thoiluong": "thoiluong",
            "theloai": theloai,
            "trailer": "trailer"
        }

        return phim;
    }

    function getPhim(id){
        $.ajax({
            type: 'GET',
            cache: false,
            url: '/api/ajax/phim',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(data){
                console.log('Response data before parse JSON: '+data);
                var phim = JSON.parse(data);
                console.log('Response data after parse JSON: '+phim);
                $('#modalTenPhim').val(phim.ten_phim);
                $('#modalHinhAnh').attr('src', '/images/'+phim.hinh_anh);
                $('#select-theloai').val(phim.id_the_loai);
            },
            error: function(err){
                // $('#errname').text(data.responseJSON.errors.ten_phim);
                console.log("error: "+err);
            }
        });
    }

    $('#tableBody').on('click', '.editBtn', function(){
        var id = $(this).closest('tr').attr('id');
        console.log('Id of row click: '+id);
        getPhim(id);
        $('#movieModal').modal();
        $('#movieModal').off('click', '#btnEdit');
        $('#movieModal').on('click', '#btnEdit', function(){
            $('#movieModal').modal('hide');
            console.log('Id after click btnEdit: '+id);
        });
    });
</script>>
@endsection