@extends('layouts.default')
@section('noi-dung')

@php
$i=0;
@endphp

<section class="wrapper">
    <div class="table-agile-info">
        <table id="table_phim" class="table" ui-jq="footable" ui-options='{ "paging": { "enabled": true }, "filtering": { "enabled": true }, "sorting": { "enabled": true }}'>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên phim</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Thời lượng</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($phims as $phim)
                    <tr>
                        <th class="id" scope="row">{{ $i++ }}</th>
                        <td class="ten-phim">{{ $phim->ten_phim }}</td>
                        <td class="hinh-anh"><img src="{{ $phim->hinh_anh }}" alt="hinh anh"></td>
                        <td class="thoi-luong">{{ $phim->thoi_luong }}</td>
                        <td class="the-loai">{{ $phim->id_the_loai }}</td>
                        <td>
                            <button class="btn btn-warning btn-lg">Sửa</button>
                        </td>
                        <td><button class="btn btn-secondary btn-lg" style="background-color: #606060; color: #fff;">Xóa</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<!-- footer -->
{{-- @include('includes.footer') --}}
<!-- / footer -->

@endsection