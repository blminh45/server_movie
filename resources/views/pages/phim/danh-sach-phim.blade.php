@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="text-center title-h2">DANH SÁCH PHIM</h2>

    <form class="form-inline bg-dark search-tv" action="">
        <input class="form-control mr-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>

    <table class="table table-all">
        <thead class="thead-dark table-all-dark">
            <tr>
                <th>STT</th>
                <th>Tên phim</th>
                <th>Hình ảnh</th>
                <th>Thể loại</th>
                <th>Thời lượng</th>
                <th>Công chiếu</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Lịch chiếu</th>
            </tr>
        </thead>

        <tbody>
            @foreach($dsphim as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->ten_phim}}</td>
                <td> <img width="100%" src="/images/{{$item->hinh_anh}}"></td>
                <td>{{$item->the_loai->ten_the_loai}}</td>
                <td>{{$item->thoi_luong}}</td>
                <td>{{$item->khoi_chieu}}</td>
                <td><a type="submit" href="cap-nhat-phim/{{$item->id}}" class="btn btn-warning">Update</a></td>
                <td>
                    <button class="btn btn-secondary" style="background-color: #606060; color: #fff;">Delete</button>
                </td>
                <td><button class="btn btn-info">Lịch chiếu</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection
