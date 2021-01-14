@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="text-center title-h2">DANH SÁCH SU?T CHI?U</h2>

    <form class="form-inline bg-dark search-tv" action="">
        <input class="form-control mr-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>

    <table class="table table-all">
        <thead class="thead-dark table-all-dark">
            <tr>
                <th scope="col">R?p</th>
                <th scope="col">Phim</th>
                <th scope="col">Gi?</th>
                <th scope="col">Ngày</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ds_suat_chieu as $item)
            <tr>
                <th>{{$item->rap->chi_nhanh->ten_chi_nhanh}}</th>
                <th> {{$item->phim->ten_phim}}</th>
                <th> {{$item->gio_chieu}}</th>
                <th> {{$item->ngay_chieu}}</th>
                <td><a type="submit" href="/pages/suat-chieu/xoa-suatchieu/{{$item->id}}"
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