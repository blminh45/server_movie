@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <div class="container">
        <h2 class="title-h2 text-center add-movie">THÊM THÀNH VIÊN</h2>
        <div class="fb-w-40 d-in-bl f-left ">
            <form action='them-thanhvien' METHOD="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="txtkh">Tên khách hàng</label>
                    <input type="text" class="form-control" id="txtkh" name="tenkhachhang">
                    <small id="kh" class="form-text text-danger"> Vui lòng nhập tên!</small>
                </div>

                <div class="form-group">
                    <label for="txtdc">Địa chỉ</label>
                    <input type="text" class="form-control" id="txtdc" name="diachiKH">
                    <small id="dc" class="form-text text-danger"> Vui lòng nhập địa chỉ!</small>
                </div>

                <div class="form-group">
                    <label for="txtsdt">SDT</label>
                    <input type="text" class="form-control" id="txtsdt" name="sodienthoai">
                    <small id="sdt" class="form-text text-danger"> Vui lòng nhập SDT!</small>
                </div>

                <div class="form-group">
                    <input name="gioitinh" type="radio" value="Nam" name="gioitinh" />Nam
                    <input name="gioitinh" type="radio" value="Nữ" name="gioitinh" />Nữ
                    <input name="gioitinh" type="radio" value="Khác" name="gioitinh" />Khác
                </div>

                <div class="form-group">
                    <label for="poster">Tải ảnh lên</label>
                    <input type="file" class="form-control-file" id="poster" name="hinhdaidien">
                </div>

                <div class="form-group">
                    <label for="txtemail">Email</label>
                    <input type="text" class="form-control" id="txtemail" name="email">
                    <small id="chkemail" class="form-text text-danger"> Vui lòng nhập email hợp lệ!</small>
                </div>

                <div class="form-group">
                    <label for="txtpass">Password</label>
                    <input type="text" class="form-control" id="txtpass" name="matkhau">
                    <small id="chkpass" class="form-text text-danger"> Vui lòng nhập pass hợp lệ!</small>
                </div>

                <button type="sumbit">Gửi</button>
            </form>
        </div>
    </div>
</section>

@endsection