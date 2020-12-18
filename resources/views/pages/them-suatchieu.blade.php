@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <div class="container">
        <h2 class="title-h2  add-movie">THÊM SUẤT CHIẾU</h2>
        <div class="fb-w-40 d-in-bl f-left ">
            <form action='them-suatchieu' METHOD="POST">
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
                    <input type="time" class="form-control" id="giochieu" name="giochieu">
                </div>

                <div class="form-group">
                    <label for="ngaychieu">Ngày chiếu</label>
                    <input type="date" class="form-control" id="ngaychieu" name="ngaychieu">
                </div>

                <button type="sumbit">Gửi</button>
            </form>
        </div>
    </div>
</section>

@endsection