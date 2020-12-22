@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="text-center title-h2">DANH SÁCH CHI NHÁNH</h2>

    <form class="form-inline bg-dark search-tv" action="">
        <input class="form-control mr-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>

    <table class="table table-all">
        <thead class="thead-dark table-all-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach( $dschinhanh as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->ten_chi_nhanh}}</td>
                <td>{{$item->dia_chi}}</td>
                <td><a type="submit" href="/chi-nhanh/cap-nhat-chi-nhanh/{{$item->id}}"
                        class="btn btn-warning">Update</a></td>
                <td><button class="btn btn-secondary" style="background-color: #606060; color: #fff;">Delete</button>
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