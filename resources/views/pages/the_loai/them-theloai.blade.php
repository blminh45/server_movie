@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="title-h2 add-movie">THÊM THỂ LOẠI</h2>
    <form action='them-theloai' METHOD="POST">
        @csrf
        <div class="form-group">
            <label for="txttheloai">Tên thể loại</label>
            <input type="text" class="form-control" id="txttheloai" name="tentheloai">
            <small id="theloai" class="form-text text-danger"> Vui lòng không bỏ trống!</small>
        </div>
        <button type="sumbit" class="btn btn-info">Thêm</button>
    </form>
</section>

@endsection