@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <div class="modal fade" id="mediumModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="titleModal" class="modal-title"></h4>
                </div>
                <div id="modalViewBody" class="modal-body">
                    <form id="formI" action="" method="post" name="formInput" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="txtname">Tên phim</label>
                            <input type="text" class="form-control" id="txtname" placeholder="Nhập tên phim" name="tenphim">
                            <small id="errname" class="form-text text-danger"> Vui lòng nhập tên phim!</small>
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
                            <label for="txtthoiluong">Thời lượng</label>
                            <input type="text" class="form-control" id="txtthoiluong" placeholder="Thời lượng" name="thoiluong">
                            <small id="errthoiluong" class="form-text text-danger"> Vui lòng nhập thời lượng!</small>
                        </div>

                        <div class="form-group">
                            <label for="txttrailer">Trailer</label>
                            <input type="text" class="form-control" id="txttrailer" placeholder="Trailer" name="trailer">
                            <small id="errtrailer" class="form-text text-danger">Vui lòng thêm trailer!</small>
                        </div>

                        <div class="form-group">
                            <label for="noidung">Tóm tắt nội dung</label>
                            <textarea class="form-control" id="txttomtat" rows="8" name="tomtat"></textarea>
                            <small id="errnoidung" class="form-text text-danger"> Vui lòng nhập nội dung phim!</small>
                        </div>

                        <div class="form-group">
                            <div id="img" style="height: 100px; width: 80%; margin-bottom: 5px;">
                                <img id="hinh_anh" src="/images/g8.jpg" style="height: 80px; object-fit: scale-down;" alt="hinh anh" >
                            </div>
                            <label for="poster">Tải ảnh lên</label>
                            <input type="file" class="form-control-file" id="poster" name="poster">
                        </div>
                    </form>
                    <div class="form-group">
                        <button id="btnModal" class="btn btn-success"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <h2 class="text-center title-h2">DANH SÁCH PHIM</h2>
    <button class="btn btn-success" id="btnThem" type="submit" data-toggle="modal" data-target="#mediumModal">Them phim</button>

    <table class="table table-all">
        <thead class="thead-dark table-all-dark">
            <tr>
                <th>STT</th>
                <th>Tên phim</th>
                <th>Hình ảnh</th>
                <th>Thể loại</th>
                <th>Thời lượng</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Lịch chiếu</th>
            </tr>
        </thead>

        <tbody id="bodyTablePhim">
            @foreach($dsphim as $item)
            <tr>
                <td class="idPhim">{{$item->id}}</td>
                <td>{{$item->ten_phim}}</td>
                <td><img width="100%" src="/images/{{$item->hinh_anh}}"></td>
                <td>{{$item->the_loai->ten_the_loai}}</td>
                <td>{{$item->thoi_luong}}</td>
                <td><a type="submit" href="#mediumModal" class="btn btn-warning" id="getPhim" data-toggle="modal" data-target="#mediumModal">Cập nhật</a></td>
                <td>
                    <button type="button" class="btn btn-secondary" style="background-color: #606060; color: #fff;">Xóa</button>
                </td>
                <td><button class="btn btn-info">Lịch chiếu</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection

@section('script')
<script src="{{ asset('js/danh_sach_phim_ajax.js') }}"></script>
{{-- <script type="text/javascript" defer="">
    document.getElementById('btnThem').onclick = function(){
        document.getElementById("formI").reset();
        var el = document.getElementById('btnModal');
        el.innerHTML = "Them phim";
        el.onclick = themPhim;
    }

    document.getElementById('getPhim').onclick = layThongTinRowClick;
</script> --}}
@endsection