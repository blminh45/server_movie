@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="text-center title-h2">DANH SÁCH THÀNH VIÊN</h2>
    <form class="form-inline bg-dark search-tv" action="">
        <input class="form-control mr-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>
    <table class="table table-all">
        <thead class="thead-dark table-all-dark">
            <tr>
                <th scope="col">Tên</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Giới tính</th>

                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
                 @foreach($dskhachhang as $item) 
                <tr>
                <td>{{$item->ten}}</td>
                <td> <img style="width:100px; height:100px;" src="/images/{{$item->anh_dai_dien}}"></td>
                <td>{{$item->dia_chi}}</td>
                <td>{{$item->so_dien_thoai}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->gioi_tinh}}</td>              
                <td><a type="submit" href="/thanh-vien/cap-nhat-thanhvien/{{$item->id}}" class="btn btn-warning">Update</a></td>
                <td><button class="btn btn-secondary"
                        style="background-color: #606060; color: #fff;">Delete</button></td>
                </tr>
                @endforeach
        </tbody>
    </table>
</section>

<!-- footer -->
@include('includes.footer')
<!-- / footer -->

@endsection
