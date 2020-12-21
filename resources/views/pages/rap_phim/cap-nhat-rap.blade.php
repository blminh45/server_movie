@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="title-h2 text-center add-movie">CHỈNH SỬA RẠP</h2>
    <form action="{{ url('pages/rap-phim/cap-nhat-rap/'.$capnhatrap->id) }}" METHOD="POST">
        <div class="fb-w-40 d-in-bl f-left ">
            @csrf
            <div class="form-group">
                <label for="txtname">Số ghế</label>
                <input type="text" class="form-control" id="txtname" name="soluongghe" value="{{$capnhatrap->so_luong_ghe}}">
                <small id="namemovie" class="form-text text-danger"> Vui lòng nhập tên chi nhánh!</small>
            </div>        
        </div>
        <div class="fb-w-40 d-in-bl f-right">
         
            <div class="form-group">
                <label for="txtthoiluong">Chi nhánh</label>
                <input type="text" class="form-control" id="txtname" name="chinhanh"  value="{{$capnhatrap->id_chi_nhanh}}">
                <small id="thoiluong" class="form-text text-danger"> Vui lòng nhập địa chỉ!</small>
            </div>

            <button type="submit">Gửi</button>
        </div>
    </form>
</section>

@endsection