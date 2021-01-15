@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="text-center title-h2">DANH SÁCH RẠP</h2>

    <form class="form-inline bg-dark search-tv" action="">
        <input class="form-control mr-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>

    <div id="modalRap" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="titleModal" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="modalTenRap">Tên rạp</label>
                        <input type="text" class="form-control" id="modalTenRap" placeholder="Nhập tên rạp" name="tenrap">
                    </div>
                    <div class="form-group">
                        <label for="modalSLGhe">Số lượng ghế</label>
                        <input type="number" class="form-control" id="modalSLGhe" placeholder="Nhập số lượng ghế" name="soghe">
                    </div>
                    <div class="form-group">
                        <label for="select-chinhanh">Chi nhánh</label>
                        <select class="form-control" id="select-chinhanh" name="chinhanh">
                            @foreach($dschi_nhanh as $item)
                            <option value="{{ $item->id }}">{{ $item->ten_chi_nhanh }}</option>
                            @endforeach
                        </select>
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
        <table id="tablePhim" class="table table-bordered">
            <thead>
                <tr class="info">
                    <th scope="col">STT</th>
                    <th scope="col">Rạp</th>
                    <th scope="col">Số ghế</th>
                    <th scope="col">Chi nhánh</th>
                    <th scope="col">Bảo trì</th>
                    <th scope="col">Cập nhật</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>

            <tbody id="tableBody">
                @foreach($dsrap as $item)
                <tr id="{{ $item->id }}" class="warning">
                    <td class="rowId">{{ $item->id }}</td>
                    <td class="rowTenRap">{{ $item->ten_rap }}</td>
                    <td class="rowSLGhe">{{ $item->so_luong_ghe }}</td>
                    <td class="rowChiNhanh">{{ $item->chi_nhanh->ten_chi_nhanh }}</td>
                    <td>
                        <label class="switch">
                            @if($item->trang_thai == 1)
                            <input class="btnBaoTri" type="checkbox" checked value="{{ $item->trang_thai }}">
                            @else <input class="btnBaoTri" type="checkbox" value="{{ $item->trang_thai }}">
                            @endif
                            <span class="slider round"></span>
                        </label>
                    </td>
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
<script>
    $('.btnBaoTri').change(function(){
        var id = $(this).closest("tr").find(".rowId").text();
        console.log(id);
        var action=0;
        if($(this).val() == 1)
            action = 2;
        else action = 1;
        $.ajax({
            type: 'POST',
            cache: false,
            url: '/api/ajax/doi-trang-thai-rap',
            data: {
                "_token": "{{ csrf_token() }}",
                "action": action,
                "id": id
            },
            success: function(data){
                $('.btnBaoTri').val(action);
            },
            error: function(err){
                console.log("error: "+err);
            }
        })
    });

    function addClassHidden(){
        $('#btnCreateModal').addClass('hidden');
        $('#btnUpdateModal').addClass('hidden');
        $('#btnDeleteModal').addClass('hidden');
    }

    function setElementAttrModal(status){
        $('.modal-content input').attr('readonly', status);
    }

    $('#btnCreate').on('click', function(){
        $('.modal-content select').attr('disabled', false);
        $('#modalTenRap').val("");
        $('#modalSLGhe').val("");
        addClassHidden();
        setElementAttrModal(false);
        $('#modalRap').modal();
        $('#titleModal').html("Thêm mới rạp");
        $('#btnCreateModal').removeClass('hidden');
        $('#btnCreateModal').off('click');
        $('#btnCreateModal').on('click', function(){
            console.log("ten_rap: "+$('#modalTenRap').val())
            $.ajax({
                type: 'POST',
                cache: false,
                url: '/api/ajax/them-rap',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "rap": {
                        "ten_rap": $('#modalTenRap').val(),
                        "so_luong_ghe": $('#modalSLGhe').val(),
                        "id_chi_nhanh": $('#select-chinhanh').val()
                    }
                },
                success: function(data){
                    console.log("create success: " + data);
                    console.log("create success: "+JSON.parse(data));
                    var result = JSON.parse(data);

                    $('table tbody').append("<tr id='"+result.id+"' class='warning'><td class='rowId'>"+result.id+"</td><td class='rowTenRap'>"+result.ten_rap+"</td><td class='rowSLGhe'>"+result.so_luong_ghe+"</td><td class='rowChiNhanh'>"+result.chi_nhanh.ten_chi_nhanh+"</td><td><label class='switch'><input type='checkbox' checked value='"+result.trang_thai+"'><span class='slider round'></span></label></td><td><button type='button' class='btn btn-success btn-lg btnEdit'><i class='fa fa-pencil'></i><span>Cập nhật</span></button></td><td><button type='button' class='btn btn-default btn-lg btnDelete'><i class='glyphicon glyphicon-trash'></i><span>Xóa</span></button></td></tr>");
                },
                error: function(err){
                    console.log("fail: "+err);
                }
            });
        })
    });

    function getRap(id){
        $('.modal-content select').attr('disabled', true);
        $.ajax({
            type: 'GET',
            cache: false,
            url: '/api/ajax/rap',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(data){
                console.log(JSON.parse(data));
                var rap = JSON.parse(data);
                console.log("rap: "+rap.id_chi_nhanh);
                $('#modalTenRap').val(rap.ten_rap);
                $('#modalSLGhe').val(rap.so_luong_ghe);
                $('#select-chinhanh').val(rap.id_chi_nhanh);
            },
            error: function(err){
                console.log("error: "+err);
            }
        });
    }

    $('#tableBody').on('click', '.btnEdit', function(){
        addClassHidden();
        setElementAttrModal(false);
        $('#modalRap').modal();
        $('#titleModal').html("Cập nhật thông tin rạp");
        $('#btnUpdateModal').removeClass('hidden');

        var id = $(this).closest("tr").attr("id");
        console.log("when click btnEdit id: "+id);

        getRap(id);

        $('#btnUpdateModal').off('click');
        $('#btnUpdateModal').on('click', function(){
            console.log("id after click btnUpdateModal: " + id);
            $.ajax({
                type: 'POST',
                cache: false,
                url: '/api/ajax/cap-nhat-rap',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "rap": {
                        "ten_rap": $('#modalTenRap').val(),
                        "so_luong_ghe": $('#modalSLGhe').val()
                    }
                },
                success: function(data){
                    console.log("update success data: "+data);
                    var result = JSON.parse(data);
                    console.log("update success id: "+result.id);
                    $('#modalRap').modal('hide');

                    $("#tableBody > tbody > tr").each(function(){
                        if($(this).find(".rowId").html() == result.id){
                            $(this).find(".rowTenRap").text(result.ten_rap);
                            $(this).find(".rowSLGhe").text(result.so_luong_ghe);
                        }
                    })
                },
                error: function(err){
                    console.log("fail: "+err);
                }
            })
        });
    });

    $('#tableBody').on('click', '.btnDelete', function(){
        addClassHidden();
        setElementAttrModal(true);
        $("#modalRap").modal();
        $('#titleModal').html("Xóa rạp");
        $('#btnDeleteModal').removeClass('hidden');

        var id = $(this).closest("tr").find(".rowId").text();
        console.log("id: "+id);
        var index = $(this).closest("tr").attr("id");
        console.log("index: "+$(this).closest("tr").attr("id"));
        getRap(id);

        $('#btnDeleteModal').off('click');
        $('#btnDeleteModal').on('click', function(){
            $.ajax({
                type: 'POST',
                cache: false,
                url: '/api/ajax/doi-trang-thai-rap',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "action": 0,
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