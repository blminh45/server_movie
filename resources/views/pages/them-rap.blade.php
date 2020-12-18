@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <div class="container">
        <h2 class="title-h2 add-movie">THÊM RẠP</h2>
        <div class="fb-w-40 d-in-bl f-left ">
            <form action='them-rap' METHOD="POST">
            @csrf
                <div class="form-group">
                    <label for="txtsoluong">Số lượng ghế</label>
                    <input type="number" class="form-control" id="txtsoluong" name="soluongghe">
                    <small id="soluongghe" class="form-text text-danger"> Số lượng không hợp lệ!</small>
                </div>
                <div class="form-group">
                    <label for="select-chinhanh">Chi nhánh</label>
                    <select class="form-control" id="select-chinhanh" name="chinhanh">
                        <option>Tân Bình</option>
                        <option>Tân Phú</option>
                        <option>Bình Thạnh</option>
                        <option>Gò Vấp</option>
                        <option>Thủ Đức</option>
                    </select>
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