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
                <th scope="col">Giờ</th>
                <th scope="col">Ngày</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ds_suat_chieu as $item)
            <tr>
                <th> {{$item->gio_chieu}}</th>
                <th> {{$item->ngay_chieu}}</th>
                <th> {{$item->gia_suat_chieu}}</th>
                <td><a type="submit" href="/pages/suat-chieu/sua-suatchieu/{{$item->id}}"
                        class="btn btn-success">Update</a>
                </td>
                <td><a type="submit" href="/pages/suat-chieu/xoa-suatchieu/{{$item->id}}"
                        class="btn btn-success">Delete</a>
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