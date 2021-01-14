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
                <label for="select-phim">Danh sách suất chiếu</label>
                <select class="form-control" id="select-phim" name="suat_chieu" onchange="show()">
                    @foreach($ds_suat_chieu as $item)
                    <optgroup label="{{$item->phim->ten_phim}}">
                        <option text-align:center value="{{ $item->id }}">
                            R?p : {{$item->rap->chi_nhanh->ten_chi_nhanh}}
                            Gi? chi?u : {{$item->gio_chieu}}
                            Ngày chi?u : {{$item->ngay_chieu}}
                        </option>
                        @endforeach
                </select>
            </div>
            <button type="sumbit">G?i</button>
        </div>
    </form>
</section>

@endsection