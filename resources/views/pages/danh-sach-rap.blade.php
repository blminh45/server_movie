@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="text-center title-h2">DANH SÁCH RẠP</h2>

    <form class="form-inline bg-dark search-tv" action="">
        <input class="form-control mr-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>

    <table class="table table-all">
        <thead class="thead-dark table-all-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Số ghế</th>
                <th scope="col">Chi nhánh</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach($dsrap as $item) <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->so_luong_ghe}}</td>
                <td>{{$item->id_chi_nhanh}}</td>
                <td><a type="submit" href="/rap-phim/cap-nhat-rap/{{$item->id}}" class="btn btn-warning">Update</a></td>
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
