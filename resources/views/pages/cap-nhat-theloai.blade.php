@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <div class="container">
        <h2 class="title-h2 text-center add-movie">CHỈNH SỬA THỂ LOẠI</h2>
        <div class="fb-w-40 d-in-bl f-left ">
            <form action="{{ url('the-loai/cap-nhat-theloai/' .$dstheloai->id) }}" METHOD="POST">
            @csrf
                <div class="form-group">
                    <label for="txtname">Tên chi nhánh</label>
                    <input type="text" class="form-control" id="txtname" name="tentheloai" value={{$dstheloai->ten_the_loai}}>
                    <small id="namemovie" class="form-text text-danger"> Vui lòng nhập tên chi nhánh!</small>
                  </div>       
                  <button type="submit">Gửi</button> 
        </div>

                 
            </form>
    </div>
</section>

@endsection