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
            </tr>
        </thead>

        <tbody>
            @for($i=0;$i<15;$i++)
            <tr>
                <td scope="row">{{ $i+1 }}</td>
                <td scope="col">Tân Bình</td>
                <td scope="col">Đứa con thởi tiết</td>
                <td scope="col">6:30</td>
                <td scope="col">24-12-2020</td>
            </tr>
            @endfor
        </tbody>
    </table>
</section>

@endsection
