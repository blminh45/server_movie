@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="title-h2 add-movie">THÊM CHI NHÁNH</h2>
    <form action='them-chinhanh' METHOD="POST">
        <div class="fb-w-40 d-in-bl f-left ">
            @csrf
            <div class="form-group">
                <label for="txtname">Tên chi nhánh</label>
                <input type="text" class="form-control" id="txttenchinhanh" placeholder="Nhập tên chi nhánh"
                name="tenchinhanh" oninput="checkChiNhanh()">
                <small id="errtenchinhanh" class="form-text text-danger"> Vui lòng nhập tên chi nhánh!</small>
            </div>

            <div class="form-group">
                <label for="txtname">Địa chỉ chi nhánh</label>
                <input type="text" class="form-control" id="txtdcchinhanh" placeholder="Nhập địa chỉ" name="diachi" oninput="checkChiNhanh()">
                <small id="errdcchinhanh" class="form-text text-danger"> Vui lòng nhập địa chỉ chi nhánh!</small>
            </div>

            <div class="form-group">
                <label for="txttrangthai">Hoạt động</label>
                <input type="radio" id="txttrangthai">
            </div>

            <button type="sumbit">Gửi</button>
        </div>
    </form>
</section>

@endsection