<header class="navbar navbar-header navbar-header-fixed">
    <a href="" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
    <div class="navbar-brand">
        <a href="#" class="df-logo">Dinas<span>Perhubungan</span></a>
    </div><!-- navbar-brand -->
    @if(Session::has('username'))
        <div class="navbar-right">

{{--            <div class="dropdown dropdown-message">--}}
{{--                <a href="" class="dropdown-link new-indicator" data-toggle="dropdown">--}}
{{--                    <i data-feather="message-square"></i>--}}
{{--                    <span>5</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                    <div class="dropdown-header">New Messages</div>--}}
{{--                    <a href="" class="dropdown-item">--}}
{{--                        <div class="media">--}}
{{--                            <div class="avatar avatar-sm avatar-online"><img src="../https://via.placeholder.com/350" class="rounded-circle" alt=""></div>--}}
{{--                            <div class="media-body mg-l-15">--}}
{{--                                <strong>Socrates Itumay</strong>--}}
{{--                                <p>nam libero tempore cum so...</p>--}}
{{--                                <span>Mar 15 12:32pm</span>--}}
{{--                            </div><!-- media-body -->--}}
{{--                        </div><!-- media -->--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-footer"><a href="">View all Messages</a></div>--}}
{{--                </div><!-- dropdown-menu -->--}}
{{--            </div><!-- dropdown -->--}}
{{--            <div class="dropdown dropdown-notification">--}}
{{--                <a href="" class="dropdown-link new-indicator" data-toggle="dropdown">--}}
{{--                    <i data-feather="bell"></i>--}}
{{--                    <span>2</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                    <div class="dropdown-header">Notifications</div>--}}
{{--                    <a href="" class="dropdown-item">--}}
{{--                        <div class="media">--}}
{{--                            <div class="avatar avatar-sm avatar-online"><img src="../https://via.placeholder.com/350" class="rounded-circle" alt=""></div>--}}
{{--                            <div class="media-body mg-l-15">--}}
{{--                                <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>--}}
{{--                                <span>Mar 15 12:32pm</span>--}}
{{--                            </div><!-- media-body -->--}}
{{--                        </div><!-- media -->--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-footer"><a href="">View all Notifications</a></div>--}}
{{--                </div><!-- dropdown-menu -->--}}
{{--            </div><!-- dropdown -->--}}
            <div class="dropdown dropdown-profile">
                <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
                    <div class="avatar avatar-sm"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                </a><!-- dropdown-link -->
                <div class="dropdown-menu dropdown-menu-right tx-13">
                    <div class="avatar avatar-lg mg-b-15"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                    <h6 class="tx-semibold mg-b-5">{{ strtoupper(\Illuminate\Support\Facades\Session::get('username')) }}</h6>
                    <p class="mg-b-25 tx-12 tx-color-03">{{ strtoupper(\Illuminate\Support\Facades\Session::get('level')) }}</p>

                    <a href="{{ route('updateProfil') }}" class="dropdown-item"><i data-feather="edit-3"></i> Edit Profile</a>
{{--                    <a href="page-profile-view.html" class="dropdown-item"><i data-feather="user"></i> View Profile</a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="page-help-center.html" class="dropdown-item"><i data-feather="help-circle"></i> Help Center</a>--}}
{{--                    <a href="" class="dropdown-item"><i data-feather="life-buoy"></i> Forum</a>--}}
{{--                    <a href="" class="dropdown-item"><i data-feather="settings"></i>Account Settings</a>--}}
{{--                    <a href="" class="dropdown-item"><i data-feather="settings"></i>Privacy Settings</a>--}}
                    <a href="{{ route('logout') }}" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </div><!-- navbar-right -->
    @endif
    <div id="navbarMenu" class="navbar-menu-wrapper">
        <div class="navbar-menu-header">
            <a href="#" class="df-logo">Dinas<span>Perhubungan</span></a>
            <a id="mainMenuClose" href=""><i data-feather="x"></i></a>
        </div><!-- navbar-menu-header -->
        <ul class="nav navbar-menu">

            <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li>
            @if(Session::has('username'))
                @if(Session::get('level') == 'admin')
                    <li class="nav-item with-sub">
                        <a href="" class="nav-link"><i data-feather="package"></i> Admin</a>
                        <ul class="navbar-menu-sub">
                            <li class="nav-sub-item"><a href="{{ route('depanPanel') }}" class="nav-sub-link"><i class="fa fa-home mg-r-15"></i>Dashboard</a></li>
{{--                            <li class="nav-sub-item"><a href="app-calendar.html" class="nav-sub-link"><i data-feather="alert-circle"></i>List Permohonan</a></li>--}}
                            <li class="nav-sub-item"><a href="{{ route('aduanPageAdmin') }}" class="nav-sub-link"><i class="fa fa-mail-bulk mg-r-15"></i>List Aduan</a></li>
                            <li class="nav-sub-item"><a href="{{ route('aduanPageAdmin') }}" class="nav-sub-link"><i class="fa fa-car-crash mg-r-15"></i>Pesanan Derek</a></li>
{{--                            <li class="nav-sub-item"><a href="app-contacts.html" class="nav-sub-link"><i data-feather="users"></i>Angkot</a></li>--}}
{{--                            <li class="nav-sub-item"><a href="app-file-manager.html" class="nav-sub-link"><i data-feather="message-circle"></i>Inbox</a></li>--}}
                            <li class="nav-sub-item"><a href="{{ route('postAdmin') }}" class="nav-sub-link"><i class="fa fa-pencil-alt mg-r-15"></i>Posting</a></li>
{{--                            <li class="nav-sub-item"><a href="app-mail.html" class="nav-sub-link"><i data-feather="credit-card"></i>Kartu</a></li>--}}
                        </ul>
                    </li>
                @endif
                    <li class="nav-item with-sub">
                        <a href="" class="nav-link"><i data-feather="package"></i> User</a>
                        <ul class="navbar-menu-sub">
                            <li class="nav-sub-item"><a href="{{ route('depanPanel') }}" class="nav-sub-link"><i data-feather="home"></i>Dashboard</a></li>
{{--                            <li class="nav-sub-item"><a href="app-calendar.html" class="nav-sub-link"><i data-feather="alert-circle"></i>Permohonan</a></li>--}}
                            <li class="nav-sub-item"><a href="{{ route('aduanPageUser') }}" class="nav-sub-link"><i data-feather="alert-octagon"></i>Pengaduan</a></li>
{{--                            <li class="nav-sub-item"><a href="app-file-manager.html" class="nav-sub-link"><i data-feather="message-circle"></i>Inbox</a></li>--}}
{{--                            <li class="nav-sub-item"><a href="app-mail.html" class="nav-sub-link"><i data-feather="credit-card"></i>Kartu</a></li>--}}
                        </ul>
                    </li>
            @endif
{{--            <li class="nav-item"><a href="../../collections/" class="nav-link"><i data-feather="alert-circle"></i> Pengaduan</a></li>--}}
{{--            <li class="nav-item"><a href="../../collections/" class="nav-link"><i data-feather="book-open"></i> News</a></li>--}}
{{--            <li class="nav-item"><a href="../../collections/" class="nav-link"><i data-feather="package" ></i> Angkot</a></li>--}}
{{--            <li class="nav-item"><a href="../../collections/" class="nav-link"><i data-feather="package"></i> Derek</a></li>--}}
{{--            <li class="nav-item"><a href="../../collections/" class="nav-link"><i data-feather="archive"></i> Parkir</a></li>--}}
        </ul>
    </div><!-- navbar-menu-wrapper -->
</header><!-- navbar -->
