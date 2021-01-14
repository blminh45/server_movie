@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="text-center title-h2">DANH SÁCH VÉ</h2>

    <form class="form-inline bg-dark search-tv" action="">
        <input class="form-control mr-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>

    <table class="table table-all">
        <thead class="thead-dark table-all-dark">
            <tr>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Tên phim</th>
                <th scope="col">Tên rạp</th>
                <th scope="col">Giờ chiếu phim</th>
                <th scope="col">Ngày chiếu phim</th>
            </tr>
        </thead>

        <tbody>
            @foreach($dsve as $item)
            <tr>
                <td>{{$item->khach_hang->ten}}</td>
                <td>{{$item->suat_chieu->phim->ten_phim}}</td>
                <td>{{$item->suat_chieu->rap->chi_nhanh->ten_chi_nhanh}}</td>
                <td>{{$item->suat_chieu->gio_chieu}}</td>
                <td>{{$item->suat_chieu->ngay_chieu}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

<!-- footer -->
@include('includes.footer')
<!-- / footer -->

@endsection