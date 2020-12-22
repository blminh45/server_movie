@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="title-h2  add-movie">THÊM SUẤT CHIẾU</h2>
    <form action='them-suatchieu' METHOD="POST">
        <div class="fb-w-40 d-in-bl f-left ">
            @csrf
            <div class="form-group">
                <label for="select-rap">Tên rạp</label>
                <select class="form-control" id="select-rap" name="rapphim">
                    <option>Tân Bình</option>
                    <option>Tân Phú</option>
                    <option>Bình Chánh</option>
                    <option>Gò Vấp</option>
                </select>
            </div>

            <div class="form-group">
                <label for="select-phim">Tên phim</label>
                <select class="form-control" id="select-phim" name="phim">
                    <option>Naruto</option>
                    <option>Conan</option>
                    <option>DOraemon</option>
                </select>
            </div>

            <div class="form-group">
                <label for="giochieu">Giờ chiếu</label>
                <input type="time" class="form-control" id="txtgiochieu" name="giochieu" oninput="checkSuatChieu()">
                <small id="errgiochieu" class="form-text text-danger"> Giờ chiếu không hợp lệ!</small>
            </div>

            <div class="form-group">
                <label for="ngaychieu">Ngày chiếu</label>
                <input type="date" class="form-control" id="txtngaychieu" name="ngaychieu" oninput="checkSuatChieu()">
                <small id="errngaychieu" class="form-text text-danger"> Ngày chiếu không hợp lệ!</small>
            </div>

            <button type="sumbit">Gửi</button>
        </div>
    </form>
</section>

@endsection