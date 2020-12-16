@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <form method="post" action="{{ route('them-phim') }}" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="tenPhim">Tên phim</label>
            <input type="text" class="form-control" name="TenPhim" id="tenPhim">
        </div>
        <div class="form-group">
            <label for="thoiLuong">Thời lượng</label>
            <input type="text" class="form-control" name="ThoiLuong" id="thoiLuong">
        </div>
        <div class="form-group">
            <label for="hinh">Hình ảnh</label>
            <input type="file" id="hinh" class="form-control" name="hinh">
        </div>
        {{-- <div class="form-group">
            <label for="doTuoi">Độ tuổi</label>
            <select class="form-control" id="doTuoi">
                <option>12</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
            </select>
        </div> --}}
        {{-- <div class="form-group">
            <label for="theLoai">Thể loại</label>
            <div class="form-control" id="theLoai">
                <input id="hanhdong" type="checkbox" name="hanhdong" value="0">
                <label for="hanhdong" class="mr-4">hành động</label>
                <input id="tinhcam" type="checkbox" name="tinhcam" value="1">
                <label for="tinhcam">tình cảm</label>
                <input id="tamly" type="checkbox" name="tamly" value="2">
                <label for="tamly">tâm lý</label>
                <input id="haihuoc" type="checkbox" name="haihuoc" value="3">
                <label for="haihuoc">hài hước</label>
                <input id="khoahoc" type="checkbox" name="khoahoc" value="4">
                <label for="khoahoc">khoa học</label>
                <input id="vothuat" type="checkbox" name="vothuat" value="5">
                <label for="vothuat">võ thuật</label>
            </div>
        </div> --}}
        {{-- <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div> --}}
        <div class="form-group">
            <button type="submit" class="btn-primary">Thêm phim</button>
            <button type="submit" class="btn-warning">Hủy</button>
        </div>
    </form>
</section>

@endsection