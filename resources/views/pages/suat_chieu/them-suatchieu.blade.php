@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="title-h2  add-movie">THÊM SUẤT CHIẾU</h2>
    <form action='them-suatchieu' METHOD="POST">
        <div class="fb-w-40 d-in-bl f-left ">
            @csrf

            <div class="form-group">
                <label for="giochieu">Giờ chiếu</label>
                <select class="form-control" id="select-phim" name="giochieu" oninput="checkSuatChieu()">

                    <option>09:00</option>
                    <option>12:00</option>
                    <option>15:00</option>
                    <option>18:00</option>
                    <option>21:00</option>
                </select>

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