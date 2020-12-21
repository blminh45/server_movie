@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="title-h2 add-movie">THÊM RẠP</h2>
    <form action='them-rap' METHOD="POST">
        <div class="fb-w-40 d-in-bl f-left ">
            @csrf
            <div class="form-group">
                <label for="txtsoluong">Số lượng ghế</label>
                <input type="number" class="form-control" id="txtsoluong" name="soluongghe">
                <small id="soluongghe" class="form-text text-danger"> Số lượng không hợp lệ!</small>
            </div>

            <div class="form-group">
                <label for="sel_chinhanh">Chi nhánh</label>
                <select class="form-control" id="sel_chinhanh" name="chi_nhanh">
                    @foreach($dschi_nhanh as $chi_nhanh)
                    <option value="{{ $chi_nhanh->id }}">{{ $chi_nhanh->ten_chi_nhanh }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Trạng thái</label><br>
                <input type="radio" id="rad_act" value="1" name="trang_thai">
                <label for="rad_act">Hoạt động</label><br>
                <input type="radio" id="rad_nonAct" value="0" name="trang_thai">
                <label for="rad_nonAct">Không hoạt động</label>
            </div>

            <button type="sumbit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</section>

@endsection