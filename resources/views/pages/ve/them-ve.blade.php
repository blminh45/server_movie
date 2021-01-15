@extends('layouts.default')
@section('noi-dung')
<section class="wrapper">
    <h2 class="title-h2  add-movie">THÊM VÉ</h2>
    <form action='them-ve' METHOD="POST">
        <div class="fb-w-40 d-in-bl f-left ">
            @csrf
            <div class="form-group">
                <label for="select-rap">Tên khách hàng</label>
                <select class="form-control" id="select-rap" name="khach_hang">
                    @foreach($khach_hang as $item)
                    <option value="{{ $item->id }}">{{$item->ten}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="select-phim">Danh sách lịch chiếu</label>
                <select class="form-control" id="select-lichchieu" name="lich_chieu">
                    @foreach($ds_lich_chieu as $item)
                    <optgroup label="Tên phim : {{$item->phim->ten_phim}}">
                        <option value="{{ $item->id }}">
                            Giờ chiếu : {{$item->suat_chieu->gio_chieu}} : Ngày chiếu :
                            {{$item->suat_chieu->ngay_chieu}}
                        </option>
                        @endforeach
                </select>
            </div>




            <div class="form-group">
                <label for="select-phim">Danh sách ghế</label>
                <select class="form-control" id="select-ghe " name="ghe">
                    @foreach($ds_ghe as $item)
                    <option value="{{ $item->id }}">
                        Ghế : {{$item->hang}}{{$item->cot}}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="sumbit">Gửi</button>
        </div>
    </form>
</section>

@endsection