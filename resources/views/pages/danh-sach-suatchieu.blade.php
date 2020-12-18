@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="text-center title-h2">DANH SÁCH SUẤT CHIẾU</h2>
    <form class="form-inline bg-dark search-tv" action="">
        <input class="form-control mr-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>
    <table class="table table-all">
        <thead class="thead-dark table-all-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Rạp</th>
                <th scope="col">Phim</th>
                <th scope="col">Giờ</th>
                <th scope="col">Ngày</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @for($i=0;$i<15;$i++) <tr>
                <th scope="row">{{ $i+1 }}</th>
                <th scope="col">Tân Bình</th>
                <th scope="col">Đứa con thởi tiết</th>
                <th scope="col">6:30</th>
                <th scope="col">24-12-2020</th>
                <td><button class="btn btn-warning">Update</button></td>
                <td><button class="btn btn-secondary"
                        style="background-color: #606060; color: #fff;">Delete</button></td>
                </tr>
                @endfor
        </tbody>
    </table>
</section>

<!-- footer -->
@include('includes.footer')
<!-- / footer -->

@endsection