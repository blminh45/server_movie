@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <div class="container">
        <h2 class="title-h2 add-movie">THÊM CHI NHÁNH</h2>
        <div class="fb-w-40 d-in-bl f-left ">
            <form action='them-chinhanh' METHOD="POST">
            @csrf
            <div class="form-group">
                    <label for="txtname">Tên chi nhánh</label>
                    <input type="text" class="form-control" id="txtname" placeholder="Nhập tên chi nhánh" name="tenchinhanh">
                    <small id="namemovie" class="form-text text-danger"> Vui lòng nhập tên chi nhánh!</small>
                  </div>
                  <div class="form-group">
                    <label for="txtname">Địa chỉ chi nhánh</label>
                    <input type="text" class="form-control" id="txtname" placeholder="Nhập địa chỉ" name="diachi">
                    <small id="namemovie" class="form-text text-danger"> Vui lòng nhập địa chỉ chi nhánh!</small>
                  </div>
                <div class="form-group">
                    <label for="txttrangthai">Hoạt động</label>
                    <input type="radio"id="txttrangthai">
                </div>
                <button type="sumbit">Gửi</button>
            </form>
        </div>
    </div>
</section>

@endsection