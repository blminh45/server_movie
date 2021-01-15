@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="text-center title-h2">DANH SÁCH CHI NHÁNH</h2>

    <div id="modalChiNhanh" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="titleModal" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="modalTenChiNhanh">Tên chi nhánh</label>
                        <input type="text" class="form-control" id="modalTenChiNhanh" placeholder="Nhập tên chi nhánh" name="tenchinhanh">
                    </div>
                    <div class="form-group">
                        <label for="modalDiaChi">Địa chỉ</label>
                        <input type="text" class="form-control" id="modalDiaChi" placeholder="Nhập địa chỉ" name="diachi">
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
        <table id="tableChiNhanh" class="table table-bordered">
            <thead>
                <tr class="info">
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Cập nhật</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>

            <tbody id="tableBody">
                @php
                    $stt = 1;
                @endphp
                @foreach($dschinhanh as $item)
                <tr id="{{ $item->id }}" class="warning">
                    <td>{{ $stt++ }}</td>
                    <td class="rowTen">{{ $item->ten_chi_nhanh }}</td>
                    <td class="rowDiaChi">{{ $item->dia_chi }}</td>
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
        $('#modalTenChiNhanh').val("");
        $('#modalDiaChi').val("");
        addClassHidden();
        setElementAttrModal(false);
        $('#modalChiNhanh').modal();
        $('#titleModal').html("Thêm mới chi nhánh");
        $('#btnCreateModal').removeClass('hidden');
        $('#btnCreateModal').off('click');
        $('#btnCreateModal').on('click', function(){
            $.ajax({
                type: 'POST',
                cache: false,
                url: '/api/ajax/them-chi-nhanh',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "chi_nhanh": {
                        "ten_chi_nhanh": $('#modalTenChiNhanh').val(),
                        "dia_chi": $('#modalDiaChi').val()
                    }
                },
                success: function(data){
                    console.log("create success: " + data);
                    console.log("create success: "+JSON.parse(data));
                    var result = JSON.parse(data);
                    var stt = <?php echo $stt;?>;
                    console.log(stt);

                    $('table tbody').append("<tr id='"+result.id+"' class='warning'><td>"+stt+"</td><td class='rowTen'>"+result.ten_chi_nhanh+"</td><td class='rowDiaChi'>"+result.dia_chi+"</td><td><button type='button' class='btn btn-success btn-lg btnEdit'><i class='fa fa-pencil'></i><span>Cập nhật</span></button></td><td><button type='button' class='btn btn-default btn-lg btnDelete'><i class='glyphicon glyphicon-trash'></i><span>Xóa</span></button></td></tr>");
                },
                error: function(err){
                    console.log("fail: "+err);
                }
            });
        })
    });

    function getChiNhanh(id){
        $.ajax({
            type: 'GET',
            cache: false,
            url: '/api/ajax/chi-nhanh',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(data){
                var result = JSON.parse(data);
                console.log(result);
                $('#modalTenChiNhanh').val(result.ten_chi_nhanh);
                $('#modalDiaChi').val(result.dia_chi);
            },
            error: function(err){
                console.log("error: "+err);
            }
        });
    }

    $('#tableChiNhanh').on('click', '.btnEdit', function(){
        addClassHidden();
        setElementAttrModal(false);
        $('#modalChiNhanh').modal();
        $('#titleModal').html("Cập nhật thông tin chi nhánh");
        $('#btnUpdateModal').removeClass('hidden');

        var id = $(this).closest("tr").attr("id");
        console.log("when click btnEdit id: "+id);

        getChiNhanh(id);

        $('#btnUpdateModal').off('click');
        $('#btnUpdateModal').on('click', function(){
            console.log("id after click btnUpdateModal: " + id);
            $.ajax({
                type: 'POST',
                cache: false,
                url: '/api/ajax/cap-nhat-chi-nhanh',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "chi_nhanh": {
                        "ten_chi_nhanh": $('#modalTenChiNhanh').val(),
                        "dia_chi": $('#modalDiaChi').val()
                    }
                },
                success: function(data){
                    console.log("update success data: "+data);
                    var result = JSON.parse(data);
                    console.log("update success id: "+result.id);

                    $("#tableChiNhanh > tbody > tr").each(function(){
                        if($(this).attr("id") == result.id){
                            $(this).find(".rowTen").text(result.ten_chi_nhanh);
                            $(this).find(".rowDiaChi").text(result.dia_chi);
                        }
                    })
                },
                error: function(err){
                    console.log("fail: "+err);
                }
            })
        });
    });

    $('#tableChiNhanh').on('click', '.btnDelete', function(){
        addClassHidden();
        setElementAttrModal(true);
        $("#modalChiNhanh").modal();
        $('#titleModal').html("Xóa chi nhánh");
        $('#btnDeleteModal').removeClass('hidden');

        var id = $(this).closest("tr").attr("id");
        console.log("id: "+id);
        getChiNhanh(id);

        $('#btnDeleteModal').off('click');
        $('#btnDeleteModal').on('click', function(){
            $.ajax({
                type: 'POST',
                cache: false,
                url: '/api/ajax/xoa-chi-nhanh',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(data){
                    $("#"+id).remove();
                    var stt = <?php echo $stt; ?>;
                    console.log(stt);
                    stt--;
                    console.log(stt);
                },
                error: function(err){
                    console.log("error: "+err);
                }
            })
        })
    });
</script>
@endsection