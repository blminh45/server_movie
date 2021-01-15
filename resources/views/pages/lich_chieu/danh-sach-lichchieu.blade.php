@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="text-center title-h2">DANH SÁCH LỊCH CHIẾU</h2>

    <form class="form-inline bg-dark search-tv" action="">
        <input class="form-control mr-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>

    <table class="table table-all">
        <thead class="thead-dark table-all-dark">
            <tr>
                <th scope="col">Rạp</th>
                <th scope="col">Phim</th>
                <th scope="col">Giá</th>
                <th scope="col">Ngày chiếu</th>
                <th scope="col">Giờ </th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ds_lich_chieu as $item)
            <tr>
                <th>{{$item->rap->ten_rap}}</th>
                <th> {{$item->phim->ten_phim}}</th>
                <th> {{$item->gia_lich_chieu}}</th>
                <th> {{$item->suat_chieu->ngay_chieu}}</th>
                <th>{{$item->suat_chieu->gio_chieu}}</th>
                <td><a type="submit" href="/pages/lich-chieu/xoa-lichchieu/{{$item->id}}"
                        class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>

</section>

<!-- footer -->
@include('includes.footer')
<!-- / footer -->

@endsection