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
                <th scope="col">Rạp</th>
                <th scope="col">Số ghế</th>
                <th scope="col">Chi nhánh</th>
                <th scope="col">Update</th>
                <th scope="col">Active</th>
            </tr>
        </thead>

        <tbody>
            @foreach($dsrap as $item) 
            <tr>
                <td>{{$item->id}}</td>
                <td>{{ $item->ten_rap }}</td>
                <td>{{$item->so_luong_ghe}}</td>
                <td>{{ $item->chi_nhanh->ten_chi_nhanh }}</td>
                <td><a type="submit" href="cap-nhat-rap/{{$item->id}}" class="btn btn-warning">Update</a></td>
                <td>
                    <label class="switch">
                        @if($item->trang_thai == 1)
                        <input type="checkbox" checked>
                        @else <input type="checkbox">
                        @endif
                        <span class="slider round"></span>
                    </label>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</section>

@endsection

@section('script')
<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
  });
});
</script>
@endsection