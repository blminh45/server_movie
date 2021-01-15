@extends('layouts.default')

@section('noi-dung')

<section class="wrapper">
    <div id="modalTheLoai" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="titleModal" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="modalTenTheLoai">Tên thể loại</label>
                        <input type="text" class="form-control" id="modalTenTheLoai" placeholder="Nhập tên thể loại" name="tentheloai">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnCreateModal" type="button" class="btn btn-default hidden" data-dismiss="modal">Tạo mới</button>
                    <button id="btnUpdateModal" type="button" class="btn btn-default hidden" data-dismiss="modal">Cập nhật</button>
                    <button id="btnDeleteModal" type="button" class="btn btn-danger hidden" data-dismiss="modal">Bạn chắc chắn xóa</button>
                </div>
            </div>
        </div>
    </div>

    <button id="btnCreate" type="button" class="btn btn-info btn-lg">Tạo mới</button>
    <hr>
    <div class="table-responsive">
        <table id="tableTheLoai" class="table table-bordered">
            <thead>
                <tr class="info">
                    <th>Id</th>
                    <th>Tên thể loại</th>
                    <th>Cập nhật</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach($dstheloai as $u)
                <tr id="{{ $u->id }}" class="warning">
                    <td class="rowId">{{ $u->id }}</td>
                    <td class="rowTenTheLoai">{{ $u->ten_the_loai }}</td>
                    <td>
                        <button type="button" class="btn btn-success btn-lg btnEdit">
                            <i class="fa fa-pencil"></i>
                            <span>Cập nhật</span>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-default btn-lg btnDelete">
                            <i class="glyphicon glyphicon-trash"></i>
                            <span>Xóa</span>
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
    function addClassHidden(){
        $('#btnCreateModal').addClass('hidden');
        $('#btnUpdateModal').addClass('hidden');
        $('#btnDeleteModal').addClass('hidden');
    }

    function setElementAttrModal(status){
        $('.modal-content input').attr('readonly', status);
    }

    $('#btnCreate').on('click', function(){
        $('#modalTenTheLoai').val("");
        addClassHidden();
        setElementAttrModal(false);
        $('#modalTheLoai').modal();
        $('#titleModal').html("Thêm mới thể loại");
        $('#btnCreateModal').removeClass('hidden');
        $('#btnCreateModal').off('click');
        $('#btnCreateModal').on('click', function(){
            $.ajax({
                type: 'POST',
                cache: false,
                url: '/api/ajax/them-the-loai',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "ten_the_loai": $('#modalTenTheLoai').val()
                },
                success: function(data){
                    console.log("create success: " + data);
                    console.log("create success: "+JSON.parse(data));
                    var result = JSON.parse(data);

                    $('table tbody').append("<tr id='"+result.id+"' class='warning'><td class='rowId'>"+result.id+"</td><td class='rowTenTheLoai'>"+result.ten_the_loai+"</td><td><button type='button' class='btn btn-success btn-lg btnEdit'><i class='fa fa-pencil'></i><span>Cập nhật</span></button></td><td><button type='button' class='btn btn-default btn-lg btnDelete'><i class='glyphicon glyphicon-trash'></i><span>Xóa</span></button></td></tr>");
                },
                error: function(err){
                    console.log("fail: "+err);
                }
            });
        })
    });

    function getTheLoai(id){
        $.ajax({
            type: 'GET',
            cache: false,
            url: '/api/ajax/the-loai',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(data){
                var tl = JSON.parse(data);
                console.log(tl);
                $('#modalTenTheLoai').val(tl.ten_the_loai);
            },
            error: function(err){
                console.log("error: "+err);
            }
        });
    }

    $('#tableTheLoai').on('click', '.btnEdit', function(){
        addClassHidden();
        setElementAttrModal(false);
        $('#modalTheLoai').modal();
        $('#titleModal').html("Cập nhật thông tin thể loại");
        $('#btnUpdateModal').removeClass('hidden');

        var id = $(this).closest("tr").attr("id");
        console.log("when click btnEdit id: "+id);

        getTheLoai(id);

        $('#btnUpdateModal').off('click');
        $('#btnUpdateModal').on('click', function(){
            console.log("id after click btnUpdateModal: " + id);
            $.ajax({
                type: 'POST',
                cache: false,
                url: '/api/ajax/cap-nhat-the-loai',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "ten_the_loai": $('#modalTenTheLoai').val()
                },
                success: function(data){
                    console.log("update success data: "+data);
                    var result = JSON.parse(data);
                    console.log("update success id: "+result.id);
                    $('#modalTheLoai').modal('hide');

                    $("#tableTheLoai > tbody > tr").each(function(){
                        if($(this).find(".rowId").html() == result.id){
                            $(this).find(".rowTenTheLoai").text(result.ten_the_loai);
                        }
                    })
                },
                error: function(err){
                    console.log("fail: "+err);
                }
            })
        });
    });

    $('#tableTheLoai').on('click', '.btnDelete', function(){
        addClassHidden();
        setElementAttrModal(true);
        $("#modalTheLoai").modal();
        $('#titleModal').html("Xóa thể loại");
        $('#btnDeleteModal').removeClass('hidden');

        var id = $(this).closest("tr").find(".rowId").text();
        console.log("id: "+id);
        var index = $(this).closest("tr").attr("id");
        console.log("index: "+$(this).closest("tr").attr("id"));
        getTheLoai(id);

        $('#btnDeleteModal').off('click');
        $('#btnDeleteModal').on('click', function(){
            $.ajax({
                type: 'POST',
                cache: false,
                url: '/api/ajax/xoa-the-loai',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(data){
                    $("#"+id).remove();
                },
                error: function(err){
                    console.log("error: "+err);
                }
            })
        })
    });
</script>
@endsection
