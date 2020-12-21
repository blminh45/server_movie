@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="title-h2 text-center add-movie">CHỈNH SỬA CHI NHÁNH</h2>
    <form action="{{ url('pages/chi-nhanh/cap-nhat-chi-nhanh/' .$capnhatchinhanh->id) }}" METHOD="POST">
        <div class="fb-w-40 d-in-bl f-left ">
            @csrf
            <div class="form-group">
                <label for="txtname">Tên chi nhánh</label>
                <input type="text" class="form-control" id="txtname" name="tenchinhanh"
                value="{{$capnhatchinhanh->ten_chi_nhanh}}">
                <small id="namemovie" class="form-text text-danger"> Vui lòng nhập tên chi nhánh!</small>
            </div>
        </div>
        <div class="fb-w-40 d-in-bl f-right">

            <div class="form-group">
                <label for="txtthoiluong">Địa chỉ chi nhánh</label>
                <input type="text" class="form-control" id="txtname" name="diachichinhanh"
                value="{{$capnhatchinhanh->dia_chi}}">
                <small id="thoiluong" class="form-text text-danger"> Vui lòng nhập địa chỉ!</small>
            </div>

            <button type="submit">Gửi</button>
        </div>
    </form>
</section>

@endsection