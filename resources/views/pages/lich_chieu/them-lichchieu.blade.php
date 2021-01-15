@extends('layouts.default')
@section('noi-dung')

<section class="wrapper">
    <h2 class="title-h2  add-movie">THÊM LỊCH CHIẾU</h2>
    <form action='them-lichchieu' METHOD="POST">
        <div class="fb-w-40 d-in-bl f-left ">
            @csrf
            <div class="form-group">
                <label for="select-rap">Tên rạp</label>
                <select class="form-control" id="select-rap" name="rapphim" onchange="show()">
                    @foreach($rap as $item)
                    <option value="{{ $item->id }}">{{$item->ten_rap}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="select-phim">Danh sách suất chiếu</label>
                <select class="form-control" id="select-suatchieu" name="suat_chieu" onchange="show()">
                    @foreach($ds_suat_chieu as $item)
                    <option value="{{ $item->id }}">
                        Giờ chiếu : {{$item->gio_chieu}}
                        Ngày chiếu : {{$item->ngay_chieu}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="select-phim">Tên phim</label>
                <select class="form-control" id="select-phim" name="phim">

                </select>
            </div>


            <script>
            function check(lst, id) {
                if (id in lst) return true;
                return false;
            }

            function show() {
                var rap = $('#select-rap').val();
                var suatchieu = $('#select-suatchieu').val();
                var lst = [];
                var lsttam = [];
                var lst_rap = <?php echo json_encode($rap); ?>;
                var lst_suatchieu = <?php echo json_encode($ds_suat_chieu); ?>;
                var lst_phim = <?php echo json_encode($phim); ?>;
                var lst_lichchieu = <?php echo json_encode($ds_lich_chieu); ?>;

                for (let i = 0; i < lst_lichchieu.length; i++) {
                    if (lst_lichchieu[i].id_rap == rap && lst_lichchieu[i].id_suat_chieu == suatchieu) {
                        lsttam.push(lst_lichchieu[i].id_phim);
                    }
                }


                for (let i = 0; i < lst_lichchieu.length; i++) {
                    if (lst_lichchieu[i].id_rap == rap && lst_lichchieu[i].id_suat_chieu == suatchieu) {
                        lst = [];
                        for (let item = 0; item < lst_phim.length; item++) {
                            let ss = lsttam.indexOf((lst_phim[item].id));
                            if (ss == -1) {
                                lst.push(lst_phim[item]);
                            }
                        }
                        break;
                    } else {
                        lst = [];
                        for (let item = 0; item < lst_phim.length; item++) {
                            let phim = {
                                id: lst_phim[item].id,
                                ten_phim: lst_phim[item].ten_phim
                            }
                            lst.push(phim);
                        }
                    }
                }
                showListPhim(lst);
            }

            function showListPhim(lst) {
                $('#select-phim').empty();
                lst.forEach((el) => {
                    $('#select-phim').append("<option value='" + el.id + "'>" + el.ten_phim +
                        "</option>");
                })
            }
            </script>



            <button type="sumbit">Gửi</button>
        </div>
    </form>
</section>

@endsection