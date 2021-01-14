@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="title-h2  add-movie">THÊM SU?T CHI?U</h2>
    <form action='them-suatchieu' METHOD="POST">
        <div class="fb-w-40 d-in-bl f-left ">
            @csrf
            <div class="form-group">
                <label for="select-rap">Tên r?p</label>
                <select class="form-control" id="select-rap" name="rapphim">
                    @foreach($rap as $item)
                    <option value="{{ $item->id }}">{{$item->chi_nhanh->ten_chi_nhanh}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="select-phim">Tên phim</label>
                <select class="form-control" id="select-phim" name="phim">
                    @foreach($phim as $item)
                    <option value="{{ $item->id }}">{{$item->ten_phim}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="giochieu">Gi? chi?u</label>
                <select class="form-control" id="select-phim" name="giochieu" oninput="checkSuatChieu()">

                    <option>09:00</option>
                    <option>12:00</option>
                    <option>15:00</option>
                    <option>18:00</option>
                    <option>21:00</option>
                </select>

            </div>

            <div class="form-group">
                <label for="ngaychieu">Ngày chi?u</label>
                <input type="date" class="form-control" id="txtngaychieu" name="ngaychieu" oninput="checkSuatChieu()">
                <small id="errngaychieu" class="form-text text-danger"> Ngày chi?u không h?p l?!</small>
            </div>

            <button type="sumbit">G?i</button>
        </div>
    </form>
</section>

@endsection