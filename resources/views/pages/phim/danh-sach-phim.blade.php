@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <form action='them-phim' METHOD="POST" enctype="multipart/form-data">
        @csrf
        <div class="fb-w-40 d-in-bl f-left ">
            <div class="form-group">
                <label for="txtname">Tên phim</label>
                <input type="text" class="form-control" id="txtname" placeholder="Nhập tên phim" name="tenphim"  oninput="checkAddMovie()">
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
                <label for="noidung">Tóm tắt nội dung</label>
                <textarea class="form-control" id="txtnoidung" rows="8" name="tomtat"  oninput="checkAddMovie()"></textarea>
                <small id="errnoidung" class="form-text text-danger"> Vui lòng nhập nội dung phim!</small>
            </div>

            <div class="form-group">
                <label for="poster">Tải ảnh lên</label>
                <input type="file" class="form-control-file" id="poster" name="poster">

            </div>
        </div>

        <div class="fb-w-40 d-in-bl f-right">
            <div class="form-group">
                <label for="txtthoiluong">Thời lượng</label>
                <input type="text" class="form-control" id="txtthoiluong" placeholder="Thời lượng" name="thoiluong"  oninput="checkAddMovie()">
                <small id="errthoiluong" class="form-text text-danger"> Vui lòng nhập thời lượng!</small>
            </div>

            <div class="form-group">
                <label for="select-tuoi">Độ tuổi</label>
                <select class="form-control" id="select-tuoi" name="tuoi">
                    <option value="18">18+</option>
                    <option value="14">14+</option>
                    <option value="16">16+</option>
                    <option value="10">10+</option>
                </select>
            </div>

            <div class="form-group">
                <label for="txtkhoichieu">Khởi chiếu</label>
                <input type="date" class="form-control" id="txtkhoichieu" placeholder="Thời lượng"
                name="ngaykhoichieu"  oninput="checkAddMovie()">
                <small id="errkhoichieu" class="form-text text-danger">Ngày không hợp lệ!</small>
            </div>

            <div class="form-group">
                <label for="txttrailer">Trailer</label>
                <input type="text" class="form-control" id="txttrailer" placeholder="Thời lượng"  oninput="checkAddMovie()">
                <small id="errtrailer" class="form-text text-danger">Vui lòng thêm trailer!</small>
            </div>
            <button type="sumbit">Gửi</button>
        </div>
    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <h2 class="text-center title-h2">DANH SÁCH PHIM</h2>

        <button class="btn btn-success" type="submit" data-toggle="modal" data-target="#myModal">Them phim</button>
        <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#">Sua Phim</button>

    <table class="table table-all">
        <thead class="thead-dark table-all-dark">
            <tr>
                <th>STT</th>
                <th>Tên phim</th>
                <th>Hình ảnh</th>
                <th>Thể loại</th>
                <th>Thời lượng</th>
                <th>Công chiếu</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Lịch chiếu</th>
            </tr>
        </thead>

        <tbody>
            @foreach($dsphim as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->ten_phim}}</td>
                <td> <img width="100%" src="/images/{{$item->hinh_anh}}"></td>
                <td>{{$item->the_loai->ten_the_loai}}</td>
                <td>{{$item->thoi_luong}}</td>
                <td>{{$item->khoi_chieu}}</td>
                <td><a type="submit" href="cap-nhat-phim/{{$item->id}}" class="btn btn-warning">Update</a></td>
                <td>
                    <button class="btn btn-secondary" style="background-color: #606060; color: #fff;">Delete</button>
                </td>
                <td><button class="btn btn-info">Lịch chiếu</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection
