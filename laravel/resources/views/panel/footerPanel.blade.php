<nav class="fixed-bottom navbar navbar-expand-lg bg-gray-100 bd justify-content-center">
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa tx-12 fa-home"></i><br> Home</a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="#"><i class="fa tx-12 fa-book"></i><br> News</a>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('publikAduan') }}"><i class="fa tx-12 fa-mail-bulk"></i><br> Aduan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('publikAngkot') }}"><i class="fa fa-shuttle-van"></i><br> Angkot</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="modalMenu()"><i class="fa tx-12 fa-ellipsis-h"></i><br> More</a>
        </li>
    </ul>

</nav>
