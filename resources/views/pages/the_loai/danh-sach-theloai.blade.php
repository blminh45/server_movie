@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="text-center title-h2">DANH SÁCH THỂ LOẠI</h2>

    <form class="form-inline bg-dark search-tv" action="">
        <input class="form-control mr-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>

    <table class="table table-all">
        <thead class="thead-dark table-all-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên thể loại</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach($dstheloai as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->ten_the_loai}}</td>
                <td>
                    <a type="submit" href="/the-loai/cap-nhat-theloai/{{$item->id}}" class="btn btn-warning">Update</a>
                </td>
                <td>
                    <button class="btn btn-secondary" style="background-color: #606060; color: #fff;">Delete</button>
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