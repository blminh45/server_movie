<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="/">
                        <i class="fa fa-dashboard"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lí phim</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('danh-sach-phim') }}">Danh sách phim</a></li>
                        <li><a href="{{ route('them-phim') }}">Thêm phim</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lí chi nhánh</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('danh-sach-chinhanh') }}">Danh sách chi nhánh</a></li>
                        <li><a href="{{ route('them-chinhanh') }}">Thêm chi nhánh</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lí thể loại</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('danh-sach-theloai') }}">Danh sách thể loại</a></li>
                        <li><a href="{{ route('them-theloai') }}">Thêm thể loại</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Quản lí rạp</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('danh-sach-rap') }}">Danh sách rạp</a></li>
                        <li><a href="{{ route('them-rap') }}">Thêm rạp</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="{{ route('danh-sach-thanh-vien') }}">
                        <i class="fa fa-tasks"></i>
                        <span>Quản lí thành viên</span>
                    </a>
                    {{-- <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Quản lí thành viên</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('danh-sach-thanh-vien') }}">Danh sách thành viên</a>
                </li>
                <li><a href="{{ route('them-thanhvien') }}">Thêm thành viên</a></li>
            </ul> --}}
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-th"></i>
                    <span>Quản lí suất chiếu</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('danh-sach-suatchieu') }}">Danh sách suất chiếu</a></li>
                    <li><a href="{{ route('them-suatchieu') }}">Thêm suất chiếu</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-th"></i>
                    <span>Quản lí lịch chiếu</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('danh-sach-lichchieu') }}">Danh sách lịch chiếu</a></li>
                    <li><a href="{{ route('them-lichchieu') }}">Thêm lịch chiếu</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-th"></i>
                    <span>Quản lí vé</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('danh-sach-ve') }}">Danh sách vé</a></li>
                    <li><a href="{{ route('them-ve') }}">Thêm vé</a></li>
                </ul>
            </li>
            </ul>
            </li>
            <li>
                <a class="active" href="/">
                    <i class="fa fa-dashboard"></i>
                    <span>Lịch chiếu phim</span>
                </a>
            </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>