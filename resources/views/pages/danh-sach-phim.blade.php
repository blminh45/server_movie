@extends('layouts.default')
@section('noi-dung')

@php
    class phim
    {
        private $ten_phim;
        private $thoi_luong;
        private $the_loai;
        private $hinh_anh;

        public function __construct($ten_phim, $hinh_anh, $thoi_luong, $the_loai)
        {
            $this->ten_phim = $ten_phim;
            $this->hinh_anh = $hinh_anh;
            $this->thoi_luong = $thoi_luong;
            $this->the_loai = $the_loai;
        }

        public function getTenPhim(){
            return $this->ten_phim;
        }

        public function getHinhAnh(){
            return $this->hinh_anh;
        }

        public function getThoiLuong(){
            return $this->thoi_luong;
        }

        public function getTheLoai(){
            return $this->the_loai;
        }
    }

    $phim1 = new phim("Avatar", "/images/1.png", 120, "Viễn tưởng");
    $phim2 = new phim("Koe Katachi", "", 137, "Hoạt hình");

    $phims = array($phim1, $phim2);

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
                        <td class="ten-phim">{{ $phim->getTenPhim() }}</td>
                        <td class="hinh-anh"><img src="{{ $phim->getHinhAnh() }}" alt=""></td>
                        <td class="thoi-luong">{{ $phim->getThoiLuong() }}</td>
                        <td class="the-loai">{{ $phim->getTheLoai() }}</td>
                        <td>
                            <button class="btn btn-warning btn-lg myfunction">Sửa</button>
                        </td>
                        <td><button class="btn btn-secondary btn-lg" style="background-color: #606060; color: #fff;">Xóa</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<script>
    $(".myfunction").click(function() {
        var row = $(this).closest("tr");    // Find the row
        
        var phim = {
            id : row.find(".id").text(),
            ten : row.find(".ten-phim").text(),
            thoiLuong : row.find(".thoi-luong").text(),
            theLoai : row.find(".the-loai").text(),

            toString: function(){
                return this.id + " " + this.ten + " " + this.thoiLuong + " " + this.theLoai;
            }
        };

        // Let's test it out
        alert(phim.toString());
    });
</script>   

<!-- footer -->
{{-- @include('includes.footer') --}}
<!-- / footer -->

@endsection