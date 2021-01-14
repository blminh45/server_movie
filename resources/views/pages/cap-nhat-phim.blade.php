@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <div class="container">
        <h2 class="title-h2 text-center add-movie">CHỈNH SỬA PHIM</h2>
        <div class="fb-w-40 d-in-bl f-left ">
            <form action="{{ url('phim/cap-nhat-phim/' .$capnhatphim->id) }}" METHOD="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="txtname">Tên phim</label>
                    <input type="text" class="form-control" id="txtname" name="tenphim"
                        value="{{$capnhatphim->ten_phim}}">
                    <small id="namemovie" class="form-text text-danger"> Vui lòng nhập tên phim!</small>
                </div>

                <div class="form-group">
                    <label for="select-theloai">Thể loại</label>
                    <select class="form-control" id="select-theloai" name="id_the_loai"
                        value="{{$capnhatphim->id_the_loai}}">
                        <option>Hành động</option>
                        <option>Hài</option>
                        <option>Tình cảm</option>
                        <option>Tâm lí</option>
                        <option>Viễn tưởng</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="noidung">Tóm tắt nội dung</label>
                    <textarea class="form-control" id="noidung" rows="8"
                        name="tom_tat">{{$capnhatphim->tom_tat}}</textarea>
                    <small id="noidung" class="form-text text-danger"> Vui lòng nhập nội dung phim!</small>
                </div>

                <div class="form-group">
                    <label for="poster">Tải ảnh lên</label>
                    <input type="file" class="form-control-file" id="poster" name="poster" value="{{$capnhatphim->hinh_anh}}">
                    <img style="width:40%; " src="/images/{{$capnhatphim->hinh_anh}}">
                </div>

        </div>
        <div class="fb-w-40 d-in-bl f-right">

            <div class="form-group">
                <label for="txtthoiluong">Thời lượng</label>
                <input type="text" class="form-control" id="txtname" name="thoiluong"
                    value="{{$capnhatphim->thoi_luong}}">
                <small id="thoiluong" class="form-text text-danger"> Vui lòng nhập thời lượng!</small>
            </div>

            <div class="form-group">
                <label for="select-tuoi">Độ tuổi</label>
                <select class="form-control" id="select-tuoi">
                    <option>18+</option>
                    <option>14+</option>
                    <option>16+</option>
                    <option>10+</option>
                </select>
            </div>

            <div class="form-group">
                <label for="txtkhoichieu">Khởi chiếu</label>
                <input type="date" class="form-control" id="txtkhoichieu" name="ngaykhoicchieu"
                    value="{{$capnhatphim->khoi_chieu}}">
                <small id="khoichieu" class="form-text text-danger">Ngày không hợp lệ!</small>
            </div>

            <div class="form-group">
                <label for="txttrailer">Trailer</label>
                <input type="text" class="form-control" id="txttrailer">
                <small id="trailer" class="form-text text-danger">Vui lòng thêm trailer!</small>
            </div>
            <button type="submit">Gửi</button>
            </form>
        </div>
    </div>
</section>

@endsection
