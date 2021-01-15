@extends('layouts.default')
@section('noi-dung')
<section class="wrapper">
    <h2 class="title-h2  add-movie">THÊM VÉ</h2>
    <form action='them-ve' METHOD="POST">
        <div class="fb-w-40 d-in-bl f-left ">
            @csrf
            <div class="form-group">
                <label for="select-rap">Tên khách hàng</label>
                <select class="form-control" id="select-rap" name="khach_hang">
                    @foreach($khach_hang as $item)
                    <option value="{{ $item->id }}">{{$item->ten}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="select-phim">Danh sách lịch chiếu</label>
                <select class="form-control" id="select-lichchieu" name="lich_chieu" onchange="lietke()">
                    @foreach($ds_lich_chieu as $item)
                    <optgroup label="Tên phim : {{$item->phim->ten_phim}}">
                        <option value="{{ $item->id }}">
                            Giờ chiếu : {{$item->suat_chieu->gio_chieu}} : Ngày chiếu :
                            {{$item->suat_chieu->ngay_chieu}}
                        </option>
                        @endforeach
                </select>
            </div>




            <div class="form-group">
                <label for="select-ghe">Danh sách ghế</label>
                <select class="form-control" id="select-ghe" name="ghe">
                </select>
            </div>
            <button type="sumbit">Gửi</button>
        </div>
        <script>
        function lietke() {
            var ghe = $('#select-ghe').val();
            var lichchieu = $('#select-lichchieu').val();
            var lst = [];
            var lsttam = [];
            var lst_ve = <?php echo json_encode($ds_ve); ?>;
            var lst_ghe = <?php echo json_encode($ds_ghe); ?>;
            for (let i = 0; i < lst_ve.length; i++) {
                if (lst_ve[i].id_lich_chieu == lichchieu) {

                    lsttam.push(lst_ve[i].id_ghe);
                }
            }
            for (let j = 0; j < lst_ve.length; j++) {
                lst = [];
                if (lst_ve[j].id_lich_chieu == lichchieu) {
                    for (let item = 0; item < lst_ghe.length; item++) {
                        let ss = lsttam.indexOf((lst_ghe[item].id));
                        console.log(lsttam);
                        if (ss == -1) {
                            lst.push(lst_ghe[item]);
                        }
                    }
                    break;
                } else {
                    lst = [];
                    for (let item = 0; item < lst_ghe.length; item++) {
                        lst.push(lst_ghe[item]);
                    }
                }
            }
            if (lst_ve.length == 0) {
                for (let item = 0; item < lst_ghe.length; item++) {
                    lst.push(lst_ghe[item]);
                }
            }

            showListGhe(lst);
        }

        function showListGhe(lst) {
            console.log(lst);
            $('#select-ghe').empty();
            lst.forEach((el) => {
                $('#select-ghe').append("<option value='" + el.id + "'> Ghế : " + el.hang + el.cot +
                    "</option>");
            })
        }
        </script>
    </form>
</section>

@endsection