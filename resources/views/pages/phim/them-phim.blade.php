@extends('layouts.default')
@section('noi-dung')
@php
    $i=1;
@endphp
<section class="wrapper">
    <h2 class="title-h2 text-center add-movie">THÊM PHIM MỚI</h2>

    <form action='them-phim' METHOD="POST" enctype="multipart/form-data">
        @csrf
        <div class="fb-w-40 d-in-bl f-left ">
            <div class="form-group">
                <label for="txtname">Tên phim</label>
                <input type="text" class="form-control" id="txtname" placeholder="Nhập tên phim" name="tenphim">
                <small id="namemovie" class="form-text text-danger"> Vui lòng nhập tên phim!</small>
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
                <textarea class="form-control" id="noidung" rows="8" name="tomtat"></textarea>
                <small id="noidung" class="form-text text-danger"> Vui lòng nhập nội dung phim!</small>
            </div>

            <div class="form-group">
                <label for="poster">Tải ảnh lên</label>
                <input type="file" class="form-control-file" id="poster" name="poster">

            </div>
        </div>

        <div class="fb-w-40 d-in-bl f-right">
            <div class="form-group">
                <label for="txtthoiluong">Thời lượng</label>
                <input type="text" class="form-control" id="txtname" placeholder="Thời lượng" name="thoiluong">
                <small id="thoiluong" class="form-text text-danger"> Vui lòng nhập thời lượng!</small>
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
                name="ngaykhoichieu">
                <small id="khoichieu" class="form-text text-danger">Ngày không hợp lệ!</small>
            </div>

            <div class="form-group">
                <label for="txttrailer">Trailer</label>
                <input type="text" class="form-control" id="txttrailer" placeholder="Thời lượng">
                <small id="trailer" class="form-text text-danger">Vui lòng thêm trailer!</small>
            </div>
            <button type="sumbit">Gửi</button>
        </div>
    </form>
</section>

@endsection