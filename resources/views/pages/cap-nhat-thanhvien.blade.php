@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <div class="container">
        <h2 class="title-h2 text-center add-movie">CHỈNH SỬA THÀNH VIÊN</h2>
        <div class="fb-w-40 d-in-bl f-left ">
            <form action="{{ url('thanh-vien/cap-nhat-thanhvien/'.$khach_hangs->id) }}" METHOD="POST">
                @csrf
                <div class="form-group">
                    <label for="txtname">Tên thành viên</label>
                    <input type="text" class="form-control" id="txtname" name="tenkhachhang"
                        value="{{$khach_hangs->ten}}">
                    <small id="namemovie" class="form-text text-danger"> Vui lòng nhập tên phim!</small>
                </div>

                <div class="form-group">
                    <label for="txtname">Địa chỉ</label>
                    <input type="text" class="form-control" id="txtname" name="diachiKH"
                        value="{{$khach_hangs->dia_chi}}">
                    <small id="namemovie" class="form-text text-danger"> Vui lòng nhập tên phim!</small>
                </div>

                <div class="form-group">
                    <label for="noidung">Số điện thoại</label>
                    <input class="form-control" id="noidung" rows="8" name="sodienthoai"
                        value="{{$khach_hangs->so_dien_thoai}}">
                    <small id="noidung" class="form-text text-danger"> Vui lòng nhập nội dung phim!</small>
                </div>

                <div class="form-group">
                    <label for="poster">Ảnh đại diện</label>
                    <input type="file" class="form-control-file" id="poster" name="hinhdaidien">

                    <img style="width:40%; " src="/images/{{$khach_hangs->anh_dai_dien}}">
                </div>
        </div>

        <div class="fb-w-40 d-in-bl f-right">
            <div class="form-group">
                <label for="txtthoiluong">Giới tính</label>

                @if($khach_hangs->gioi_tinh=="Nam")
                <select class="form-control" id="select-tuoi" name="gioitinh">
                    <option>Nam</option>
                    <option>Nữ</option>
                    <option>Khác</option>
                </select>
                @elseif($khach_hangs->gioi_tinh=="Nữ")
                <select class="form-control" id="select-tuoi" name="gioitinh">
                    <option>Nữ</option>
                    <option>Nam</option>
                    <option>Khác</option>
                </select>
                @else
                <select class="form-control" id="select-tuoi" name="gioitinh">
                    <option>Khác</option>
                    <option>Nam</option>
                    <option>Nữ</option>
                </select>
                @endif
            </div>

            <div class="form-group">
                <label for="txtthoiluong">Email</label>
                <input type="text" class="form-control" id="txtname" name="email" value="{{$khach_hangs->email}}">
                <small id="thoiluong" class="form-text text-danger"> Vui lòng nhập thời lượng!</small>
            </div>

            <button type="submit">Gửi</button>
            </form>
        </div>
    </div>
</section>

@endsection
