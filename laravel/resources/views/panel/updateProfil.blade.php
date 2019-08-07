@include('panel.headerPanel')

@include('panel.navbarPanel')
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.css">
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.profile.css">
<div class="content content-fixed content-profile">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="media d-block d-lg-flex">
            <div class="profile-sidebar pd-lg-r-25">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-lg">
                        <div class="avatar avatar-xxl avatar-online"><img src="https://via.placeholder.com/500"
                                                                          class="rounded-circle" alt=""></div>
                    </div><!-- col -->
                    <div class="col-sm-8 col-md-7 col-lg mg-t-20 mg-sm-t-0 mg-lg-t-25">
                        <h5 class="mg-b-2 tx-spacing--1">{{ strtoupper(Session::get('username')) }}</h5>
                        <p class="tx-color-03 mg-b-25">@fenchiumao</p>
                        {{--                        <div class="d-flex mg-b-25">--}}
                        {{--                            <button class="btn btn-xs btn-white flex-fill">Message</button>--}}
                        {{--                            <button class="btn btn-xs btn-primary flex-fill mg-l-10">Follow</button>--}}
                        {{--                        </div>--}}

                        <p class="tx-13 tx-color-02 mg-b-25">Redhead, Innovator, Saviour of Mankind, Hopeless Romantic,
                            Attractive 20-something Yogurt Enthusiast... <a href="">Read more</a></p>

                        <div class="d-flex">
                            <div class="profile-skillset flex-fill">
                                <h4><a href="" class="link-01">1.4k</a></h4>
                                <label>Stars</label>
                            </div>
                            <div class="profile-skillset flex-fill">
                                <h4><a href="" class="link-01">2.8k</a></h4>
                                <label>Followers</label>
                            </div>
                            <div class="profile-skillset flex-fill">
                                <h4><a href="" class="link-01">437</a></h4>
                                <label>Following</label>
                            </div>
                        </div>
                    </div><!-- col -->
                    {{--                    <div class="col-sm-6 col-md-5 col-lg mg-t-40">--}}
                    {{--                        <label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">Skills</label>--}}
                    {{--                        <ul class="list-inline list-inline-skills">--}}
                    {{--                            <li class="list-inline-item"><a href="">HTML5</a></li>--}}
                    {{--                            <li class="list-inline-item"><a href="">Sass</a></li>--}}
                    {{--                            <li class="list-inline-item"><a href="">CSS</a></li>--}}
                    {{--                            <li class="list-inline-item"><a href="">React</a></li>--}}
                    {{--                            <li class="list-inline-item"><a href="">jQuery</a></li>--}}
                    {{--                            <li class="list-inline-item"><a href="">Angular</a></li>--}}
                    {{--                            <li class="list-inline-item"><a href="">Wordpress</a></li>--}}
                    {{--                            <li class="list-inline-item"><a href="">Photoshop</a></li>--}}
                    {{--                            <li class="list-inline-item"><a href="">PHP</a></li>--}}
                    {{--                            <li class="list-inline-item"><a href="">Node</a></li>--}}
                    {{--                            <li class="list-inline-item"><a href="">Git</a></li>--}}
                    {{--                            <li class="list-inline-item"><a href="">Front-End Development</a></li>--}}
                    {{--                            <li class="list-inline-item"><a href="">Web Design</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </div><!-- col -->--}}
                    {{--                    <div class="col-sm-6 col-md-5 col-lg mg-t-40">--}}
                    {{--                        <label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">Websites--}}
                    {{--                            &amp; Social Channel</label>--}}
                    {{--                        <ul class="list-unstyled profile-info-list">--}}
                    {{--                            <li>--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-globe">--}}
                    {{--                                    <circle cx="12" cy="12" r="10"></circle>--}}
                    {{--                                    <line x1="2" y1="12" x2="22" y2="12"></line>--}}
                    {{--                                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>--}}
                    {{--                                </svg>--}}
                    {{--                                <a href="">http://fenchiumao.me/</a></li>--}}
                    {{--                            <li>--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-github">--}}
                    {{--                                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>--}}
                    {{--                                </svg>--}}
                    {{--                                <a href="">@fenchiumao</a></li>--}}
                    {{--                            <li>--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-twitter">--}}
                    {{--                                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>--}}
                    {{--                                </svg>--}}
                    {{--                                <a href="">@fenmao</a></li>--}}
                    {{--                            <li>--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-instagram">--}}
                    {{--                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>--}}
                    {{--                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>--}}
                    {{--                                    <line x1="17.5" y1="6.5" x2="17.5" y2="6.5"></line>--}}
                    {{--                                </svg>--}}
                    {{--                                <a href="">@fenchiumao</a></li>--}}
                    {{--                            <li>--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-facebook">--}}
                    {{--                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>--}}
                    {{--                                </svg>--}}
                    {{--                                <a href="">@fenchiumao</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </div><!-- col -->--}}
                    {{--                    <div class="col-sm-6 col-md-5 col-lg mg-t-40">--}}
                    {{--                        <label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">Contact--}}
                    {{--                            Information</label>--}}
                    {{--                        <ul class="list-unstyled profile-info-list">--}}
                    {{--                            <li>--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-briefcase">--}}
                    {{--                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>--}}
                    {{--                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>--}}
                    {{--                                </svg>--}}
                    {{--                                <span class="tx-color-03">Bay Area, San Francisco, CA</span></li>--}}
                    {{--                            <li>--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-home">--}}
                    {{--                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>--}}
                    {{--                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>--}}
                    {{--                                </svg>--}}
                    {{--                                <span class="tx-color-03">Westfield, Oakland, CA</span></li>--}}
                    {{--                            <li>--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-smartphone">--}}
                    {{--                                    <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>--}}
                    {{--                                    <line x1="12" y1="18" x2="12" y2="18"></line>--}}
                    {{--                                </svg>--}}
                    {{--                                <a href="">(+1) 012 345 6789</a></li>--}}
                    {{--                            <li>--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-phone">--}}
                    {{--                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>--}}
                    {{--                                </svg>--}}
                    {{--                                <a href="">(+1) 987 654 3201</a></li>--}}
                    {{--                            <li>--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-mail">--}}
                    {{--                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>--}}
                    {{--                                    <polyline points="22,6 12,13 2,6"></polyline>--}}
                    {{--                                </svg>--}}
                    {{--                                <a href="">me@fenchiumao.me</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </div><!-- col -->--}}
                    {{--                    <div class="col-sm-6 col-md-5 col-lg mg-t-40">--}}
                    {{--                        <label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">Explore</label>--}}
                    {{--                        <nav class="nav nav-classic tx-13">--}}
                    {{--                            <a href="" class="nav-link">--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-users">--}}
                    {{--                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>--}}
                    {{--                                    <circle cx="9" cy="7" r="4"></circle>--}}
                    {{--                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>--}}
                    {{--                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>--}}
                    {{--                                </svg>--}}
                    {{--                                <span>Groups</span></a>--}}
                    {{--                            <a href="" class="nav-link">--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-calendar">--}}
                    {{--                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>--}}
                    {{--                                    <line x1="16" y1="2" x2="16" y2="6"></line>--}}
                    {{--                                    <line x1="8" y1="2" x2="8" y2="6"></line>--}}
                    {{--                                    <line x1="3" y1="10" x2="21" y2="10"></line>--}}
                    {{--                                </svg>--}}
                    {{--                                <span>Events</span></a>--}}
                    {{--                            <a href="" class="nav-link">--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-briefcase">--}}
                    {{--                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>--}}
                    {{--                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>--}}
                    {{--                                </svg>--}}
                    {{--                                <span>Jobs</span></a>--}}
                    {{--                            <a href="" class="nav-link">--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-globe">--}}
                    {{--                                    <circle cx="12" cy="12" r="10"></circle>--}}
                    {{--                                    <line x1="2" y1="12" x2="22" y2="12"></line>--}}
                    {{--                                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>--}}
                    {{--                                </svg>--}}
                    {{--                                <span>Discover People</span></a>--}}
                    {{--                            <a href="" class="nav-link">--}}
                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                    {{--                                     stroke-linejoin="round" class="feather feather-shopping-bag">--}}
                    {{--                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>--}}
                    {{--                                    <line x1="3" y1="6" x2="21" y2="6"></line>--}}
                    {{--                                    <path d="M16 10a4 4 0 0 1-8 0"></path>--}}
                    {{--                                </svg>--}}
                    {{--                                <span>Buy &amp; Sell</span></a>--}}
                    {{--                        </nav>--}}
                    {{--                    </div><!-- col -->--}}
                </div><!-- row -->

            </div><!-- profile-sidebar -->
            <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10">
                {{--                <div class="profile-update-option bg-white ht-50 bd d-flex justify-content-end mg-b-20 mg-lg-b-25 rounded">--}}
                {{--                    <div class="d-flex align-items-center pd-x-20 mg-r-auto">--}}
                {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
                {{--                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                             class="feather feather-edit-3">--}}
                {{--                            <polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon>--}}
                {{--                            <line x1="3" y1="22" x2="21" y2="22"></line>--}}
                {{--                        </svg>--}}
                {{--                        <a href="" class="link-03 mg-l-10"><span class="d-none d-sm-inline">Share an</span> Update</a>--}}
                {{--                    </div>--}}
                {{--                    <div class="wd-50 bd-l d-flex align-items-center justify-content-center">--}}
                {{--                        <a href="" class="link-03" data-toggle="tooltip" title="" data-original-title="Publish Photo">--}}
                {{--                            <i class="fa fa-image"></i>--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
                {{--                    <div class="wd-50 bd-l d-flex align-items-center justify-content-center">--}}
                {{--                        <a href="" class="link-03" data-toggle="tooltip" title="" data-original-title="Publish Video">--}}
                {{--                            <i class="fa fa-camera"></i>--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
                {{--                    <div class="wd-50 bd-l d-flex align-items-center justify-content-center">--}}
                {{--                        <a href="" class="link-03" data-toggle="tooltip" title=""--}}
                {{--                           data-original-title="Write an Article">--}}
                {{--                            <i class="fa fa-paper-plane"></i>--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                @if($statusProfil == false)
                    <div class="card mg-b-20 mg-lg-b-25">
                        <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                            <h6 class="tx-uppercase tx-semibold mg-b-0">Update Profil</h6>
                            {{--                        <nav class="nav nav-icon-only">--}}
                            {{--                            <a href="" class="nav-link">--}}
                            {{--                                <i class="fa fa-dot-circle"></i>--}}
                            {{--                            </a>--}}
                            {{--                        </nav>--}}
                        </div><!-- card-header -->
                        <div class="card-body pd-20 pd-lg-25">
                            <fieldset class="form-fieldset mg-b-20">
                                <legend class="tx-center">Informasi Dasar</legend>

                                <div class="form-group">
                                    <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nama
                                        Lengkap</label>
                                    <input readonly id="inputNamaLengkap" type="text" class="form-control"
                                           placeholder="Nama Lengkap">
                                </div><!-- col -->
                                <div class="form-group">
                                    <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">NIK</label>
                                    <input readonly id="inputNik" type="text" class="form-control"
                                           placeholder="Nomor Induk Keluarga">
                                </div><!-- col -->
                                <div class="form-group">
                                    <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Jenis
                                        Kelamin</label>
                                    <select readonly id="inputJenisKelamin" type="text" class="form-control">
                                        <option value=""></option>
                                        <option value="L">Laki Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div><!-- col -->
                                <div class="form-group">
                                    <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Tempat
                                        Lahir</label>
                                    <input readonly id="inputTempatLahir" type="text" class="form-control"
                                           placeholder="Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Agama</label>
                                    <input readonly id="inputAgama" type="text" class="form-control"
                                           placeholder="Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Pendidikan</label>
                                    <input readonly id="inputPendidikan" type="text" class="form-control"
                                           placeholder="Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Jenis
                                        Pekerjaan</label>
                                    <input readonly id="inputJenisPekerjaan" type="text" class="form-control"
                                           placeholder="Tempat Lahir">
                                </div>
                                <div class="form-group ">
                                    <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Kewarganegaraan</label>
                                    <select id="inputKewarganegaraan" type="text" class="form-control">
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="form-fieldset">
                                <legend class="tx-center">Informasi Keluarga</legend>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Status
                                            Perkawinan</label>
                                        <input readonly id="inputStatusPerkawinan" type="text" class="form-control"
                                               placeholder="Status Perkawinan">
                                    </div><!-- col -->
                                    <div class="col-sm-6">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Status
                                            Hubungan Dalam Keluarga</label>
                                        <input readonly id="inputStatusHubunganDalamKeluarga" type="text"
                                               class="form-control"
                                               placeholder="Status Hubungan Dalam Keluarga">
                                    </div><!-- col -->
                                </div>
                            </fieldset>
                            <fieldset class="form-fieldset mg-b-20">
                                <legend>Informasi Imigrasi</legend>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">No
                                            Passport</label>
                                        <input readonly id="inputNoPassport" type="text" class="form-control"
                                               placeholder="No Passport">
                                    </div><!-- col -->
                                    <div class="col-sm-6">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">No
                                            KTA</label>
                                        <input readonly id="inputNoKta" type="text"
                                               class="form-control"
                                               placeholder="No KTA">
                                    </div><!-- col -->
                                </div>
                            </fieldset>
                            <fieldset class="form-fieldset mg-b-20">
                                <legend class="tx-center">Orang Tua</legend>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nama
                                            Ayah</label>
                                        <input readonly id="inputNamaAyah" type="text" class="form-control"
                                               placeholder="Nama Ayah">
                                    </div><!-- col -->
                                    <div class="col-sm-6">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nama
                                            Ibu</label>
                                        <input readonly id="inputNamaIbu" type="text"
                                               class="form-control"
                                               placeholder="Nama Ibu">
                                    </div><!-- col -->
                                </div>
                            </fieldset>
                            <fieldset class="form-fieldset mg-b-20">
                                <legend class="tx-center">Data Alamat</legend>
                                <div class="row row-sm mg-b-20">
                                    <div class="col-sm-8">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Alamat
                                            Lengkap</label>
                                        <input readonly id="inputAlamatLengkap" type="text" class="form-control"
                                               placeholder="Alamat Lengkap">
                                    </div><!-- col -->
                                    <div class="col-sm-2">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Kode
                                            Pos</label>
                                        <input readonly id="inputKodePos" type="text"
                                               class="form-control"
                                               placeholder="Kode Pos">
                                    </div><!-- col -->
                                    <div class="col-sm-2">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">RT/RW</label>
                                        <input readonly id="inputRtRw" type="text"
                                               class="form-control"
                                               placeholder="RT/RW">
                                    </div><!-- col -->
                                </div>
                                <div class="row row-sm mg-b-20">
                                    <div class="col-sm-4">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Desa/Kelurahan</label>
                                        <input readonly id="inputDesaKelurahan" type="text"
                                               class="form-control"
                                               placeholder="Desa/Kelurahan">
                                    </div><!-- col -->
                                    <div class="col-sm-4">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Kecamatan</label>
                                        <input readonly id="inputKecamatan" type="text"
                                               class="form-control"
                                               placeholder="Kecamatan">
                                    </div><!-- col -->
                                    <div class="col-sm-4">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Kabupaten/Kota</label>
                                        <input readonly id="inputKabupatenKota" type="text"
                                               class="form-control"
                                               placeholder="Kabupaten/Kota">
                                    </div><!-- col -->
                                </div>
                                <div class="row row-sm mg-b-20">
                                    <div class="col-sm-12">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Provinsi</label>
                                        <input readonly id="inputProvinsi" type="text"
                                               class="form-control"
                                               placeholder="Provinsi">
                                    </div><!-- col -->
                                </div>
                            </fieldset>
                            <fieldset class="form-fieldset">
                                <legend>Kontak & Sosial Media</legend>
                                <div class="row row-sm mg-b-20">
                                    <div class="col-sm-6">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">No
                                            HP</label>
                                        <input readonly id="inputNoHp" type="text"
                                               class="form-control"
                                               placeholder="No Hp">
                                    </div><!-- col -->
                                    <div class="col-sm-6">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Email</label>
                                        <input readonly id="inputEmail" type="email"
                                               class="form-control"
                                               placeholder="No Hp">
                                    </div><!-- col -->
                                </div>
                                <div class="row row-sm mg-b-20">
                                    <div class="col-sm-12 mg-b-20">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Facebook</label>
                                        <input readonly id="inputFacebook" type="text"
                                               class="form-control"
                                               placeholder="Facebook">
                                    </div><!-- col -->
                                    <div class="col-sm-12">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Twitter</label>
                                        <input readonly id="inputTwitter" type="email"
                                               class="form-control"
                                               placeholder="Twitter">
                                    </div><!-- col -->
                                </div>
                            </fieldset>
                        </div>
                        <div class="card-footer bg-transparent pd-y-10 pd-sm-y-15 pd-x-10 pd-sm-x-20">
                            <nav class="nav nav-with-icon tx-13">
                                <a href="" class="nav-link">
                                    <i class="fa fa-folder mg-r-5"></i>
                                    Save</a>
                            </nav>
                        </div><!-- card-footer -->
                    </div><!-- card -->
                @endif
                <div class="card card-profile-interest">
                    <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                        <h6 class="tx-uppercase tx-semibold mg-b-0">Interests</h6>
                        <nav class="nav nav-with-icon tx-13">
                            <a href="" class="nav-link">Browse Interests
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </nav>
                    </div><!-- card-header -->
                    <div class="card-body pd-25">
                        <div class="row">
                            <div class="col-sm col-lg-12 col-xl">
                                <div class="media">
                                    <div class="wd-45 ht-45 bg-gray-900 rounded d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-github tx-white-7 wd-20 ht-20">
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg>
                                    </div>
                                    <div class="media-body pd-l-25">
                                        <h6 class="tx-color-01 mg-b-5">Github, Inc.</h6>
                                        <p class="tx-12 mg-b-10">Web-based hosting service for version control using
                                            Git... <a href="">Learn more</a></p>
                                        <span class="tx-12 tx-color-03">6,182,220 Followers</span>
                                    </div>
                                </div><!-- media -->

                                <div class="media">
                                    <div class="wd-45 ht-45 bg-warning rounded d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-truck tx-white-7 wd-20 ht-20">
                                            <rect x="1" y="3" width="15" height="13"></rect>
                                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                        </svg>
                                    </div>
                                    <div class="media-body pd-l-25">
                                        <h6 class="tx-color-01 mg-b-5">DHL Express</h6>
                                        <p class="tx-12 mg-b-10">Logistics company providing international courier
                                            service... <a href="">Learn more</a></p>
                                        <span class="tx-12 tx-color-03">3,005,192 Followers</span>
                                    </div>
                                </div><!-- media -->
                            </div><!-- col -->
                            <div class="col-sm col-lg-12 col-xl mg-t-25 mg-sm-t-0 mg-lg-t-25 mg-xl-t-0">
                                <div class="media">
                                    <div class="wd-45 ht-45 bg-primary rounded d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-facebook tx-white-7 wd-20 ht-20">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                        </svg>
                                    </div>
                                    <div class="media-body pd-l-25">
                                        <h6 class="tx-color-01 mg-b-5">Facebook, Inc.</h6>
                                        <p class="tx-12 mg-b-10">Online social media and social networking service
                                            company... <a href="">Learn more</a></p>
                                        <span class="tx-12 tx-color-03">12,182,220 Followers</span>
                                    </div>
                                </div><!-- media -->

                                <div class="media">
                                    <div class="wd-45 ht-45 bg-pink rounded d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-instagram tx-white-7 wd-20 ht-20">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.5" y2="6.5"></line>
                                        </svg>
                                    </div>
                                    <div class="media-body pd-l-25">
                                        <h6 class="tx-color-01 mg-b-5">Instagram</h6>
                                        <p class="tx-12 mg-b-10">Photo and video-sharing social networking service by
                                            Facebook... <a href="">Learn more</a></p>
                                        <span class="tx-12 tx-color-03">3,005,192 Followers</span>
                                    </div>
                                </div><!-- media -->
                            </div><!-- col -->
                        </div><!-- row -->
                    </div><!-- card-body -->
                </div><!-- card -->

            </div><!-- media-body -->
            {{--            <div class="profile-sidebar mg-t-40 mg-lg-t-0 pd-lg-l-25">--}}
            {{--                <div class="row">--}}
            {{--                    <div class="col-sm-6 col-md-5 col-lg">--}}
            {{--                        <div class="d-flex align-items-center justify-content-between mg-b-20">--}}
            {{--                            <h6 class="tx-13 tx-spacng-1 tx-uppercase tx-semibold mg-b-0">Stories</h6>--}}
            {{--                            <a href="" class="link-03">Watch All</a>--}}
            {{--                        </div>--}}
            {{--                        <ul class="list-unstyled media-list mg-b-15">--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar avatar-online"><span--}}
            {{--                                                class="avatar-initial rounded-circle bg-dark">S</span></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-0"><a href="" class="link-01">Socrates Itumay</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">2 hours ago</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar avatar-online"><span--}}
            {{--                                                class="avatar-initial rounded-circle bg-primary">I</span></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-0"><a href="" class="link-01">Isidore Dilao</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">5 hours ago</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar avatar-offline"><img src="../https://via.placeholder.com/500"--}}
            {{--                                                                            class="rounded-circle" alt=""></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-0"><a href="" class="link-01">Angeline Mercado</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">1 day ago</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar avatar-online"><span--}}
            {{--                                                class="avatar-initial rounded-circle bg-info">K</span></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-0"><a href="" class="link-01">Kirby Avendula</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">2 days ago</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar avatar-online"><span--}}
            {{--                                                class="avatar-initial rounded-circle bg-dark">S</span></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-0"><a href="" class="link-01">Socrates Itumay</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">2 hours ago</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                        </ul>--}}
            {{--                        <a href="" class="link-03 d-inline-flex align-items-center">See more stories <i--}}
            {{--                                    class="icon ion-ios-arrow-down mg-l-5 mg-t-3 tx-12"></i></a>--}}
            {{--                    </div><!-- col -->--}}
            {{--                    <div class="col-sm-6 col-md-5 col-lg mg-t-40 mg-sm-t-0 mg-lg-t-40">--}}
            {{--                        <div class="d-flex align-items-center justify-content-between mg-b-20">--}}
            {{--                            <h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-b-0">People Also Viewed</h6>--}}
            {{--                        </div>--}}
            {{--                        <ul class="list-unstyled media-list mg-b-15">--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar avatar-online"><img src="../https://via.placeholder.com/350"--}}
            {{--                                                                           class="rounded-circle" alt=""></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Roy Recamadas</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">UI/UX Designer &amp; Developer</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar avatar-offline"><img src="../https://via.placeholder.com/600"--}}
            {{--                                                                            class="rounded-circle" alt=""></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Raymart Serencio</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">Full-Stack Developer</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar avatar-offline"><span--}}
            {{--                                                class="avatar-initial rounded-circle bg-teal">R</span></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Rolando Paloso Jr</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">Licensed Architect</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar avatar-online"><span--}}
            {{--                                                class="avatar-initial rounded-circle bg-indigo">R</span></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Robert Restificar</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">Business Analyst</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar avatar-online"><span--}}
            {{--                                                class="avatar-initial rounded-circle bg-gray-600">A</span></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Archie Cantones</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">Senior Software Architect</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                        </ul>--}}
            {{--                    </div><!-- col -->--}}
            {{--                    <div class="col-sm-6 col-md-5 col-lg mg-t-40">--}}
            {{--                        <div class="d-flex align-items-center justify-content-between mg-b-20">--}}
            {{--                            <h6 class="tx-13 tx-uppercase tx-semibold mg-b-0">People You May Know</h6>--}}
            {{--                        </div>--}}
            {{--                        <ul class="list-unstyled media-list mg-b-15">--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar"><img src="https://via.placeholder.com/500"--}}
            {{--                                                             class="rounded-circle" alt=""></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Allan Ray Palban</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">Senior Business Analyst</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar"><img src="https://via.placeholder.com/500"--}}
            {{--                                                             class="rounded-circle" alt=""></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Rhea Castanares</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">Product Designer</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar"><img src="https://via.placeholder.com/500"--}}
            {{--                                                             class="rounded-circle" alt=""></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Philip Cesar Galban</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">Executive Assistant</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar"><img src="https://via.placeholder.com/500"--}}
            {{--                                                             class="rounded-circle" alt=""></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Randy Macapala</a></p>--}}
            {{--                                    <span class="tx-12 tx-color-03">Business Entrepreneur</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li class="media align-items-center">--}}
            {{--                                <a href="">--}}
            {{--                                    <div class="avatar"><img src="https://via.placeholder.com/500"--}}
            {{--                                                             class="rounded-circle" alt=""></div>--}}
            {{--                                </a>--}}
            {{--                                <div class="media-body pd-l-15">--}}
            {{--                                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Abigail Johnson</a></p>--}}
            {{--                                    <span class="d-block tx-12 tx-color-03">System Administrator</span>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                        </ul>--}}
            {{--                    </div><!-- col -->--}}
            {{--                    <div class="col-sm-6 col-md-5 col-lg mg-t-40 order-sm-1">--}}
            {{--                        <div class="d-flex align-items-center justify-content-between mg-b-15">--}}
            {{--                            <h6 class="tx-13 tx-uppercase tx-semibold mg-b-0">Mutual Connections</h6>--}}
            {{--                        </div>--}}
            {{--                        <div class="img-group img-group-mutual mg-b-20 justify-content-start">--}}
            {{--                            <img src="../https://via.placeholder.com/500" class="img rounded-circle" alt="">--}}
            {{--                            <img src="../https://via.placeholder.com/500" class="img rounded-circle" alt="">--}}
            {{--                            <img src="../https://via.placeholder.com/500" class="img rounded-circle" alt="">--}}
            {{--                            <img src="../https://via.placeholder.com/500" class="img rounded-circle" alt="">--}}
            {{--                            <img src="../https://via.placeholder.com/500" class="img rounded-circle" alt="">--}}
            {{--                        </div>--}}
            {{--                        <h6>You have 18 mutual connection</h6>--}}
            {{--                        <p class="tx-color-03 mg-b-0">You and Fen both know Archie Cantones, Socrates Itumay, and 17--}}
            {{--                            others</p>--}}
            {{--                    </div><!-- col -->--}}
            {{--                    <div class="col-sm-6 col-md-5 col-lg mg-t-40">--}}
            {{--                        <div class="d-flex align-items-center justify-content-between mg-b-15">--}}
            {{--                            <h6 class="tx-13 tx-uppercase tx-semibold mg-b-0">Photos</h6>--}}
            {{--                            <a href="" class="link-03">Add Photo</a>--}}
            {{--                        </div>--}}

            {{--                        <div class="row row-xxs">--}}
            {{--                            <div class="col-4">--}}
            {{--                                <a href="" class="d-block ht-60"><img src="../https://via.placeholder.com/640x426"--}}
            {{--                                                                      class="img-fit-cover" alt=""></a>--}}
            {{--                            </div><!-- col -->--}}
            {{--                            <div class="col-4">--}}
            {{--                                <a href="" class="d-block ht-60"><img src="../https://via.placeholder.com/500x281"--}}
            {{--                                                                      class="img-fit-cover" alt=""></a>--}}
            {{--                            </div><!-- col -->--}}
            {{--                            <div class="col-4">--}}
            {{--                                <a href="" class="d-block ht-60"><img src="../https://via.placeholder.com/500x281"--}}
            {{--                                                                      class="img-fit-cover" alt=""></a>--}}
            {{--                            </div><!-- col -->--}}
            {{--                            <div class="col-4 mg-t-2">--}}
            {{--                                <a href="" class="d-block ht-60"><img src="../https://via.placeholder.com/500x281"--}}
            {{--                                                                      class="img-fit-cover" alt=""></a>--}}
            {{--                            </div><!-- col -->--}}
            {{--                            <div class="col-4 mg-t-2">--}}
            {{--                                <a href="" class="d-block ht-60"><img src="../https://via.placeholder.com/350"--}}
            {{--                                                                      class="img-fit-cover" alt=""></a>--}}
            {{--                            </div><!-- col -->--}}
            {{--                            <div class="col-4 mg-t-2">--}}
            {{--                                <a href="" class="d-block ht-60"><img src="../https://via.placeholder.com/600"--}}
            {{--                                                                      class="img-fit-cover" alt=""></a>--}}
            {{--                            </div><!-- col -->--}}
            {{--                            <div class="col-4 mg-t-2">--}}
            {{--                                <a href="" class="d-block ht-60"><img src="https://via.placeholder.com/500"--}}
            {{--                                                                      class="img-fit-cover" alt=""></a>--}}
            {{--                            </div><!-- col -->--}}
            {{--                            <div class="col-4 mg-t-2">--}}
            {{--                                <a href="" class="d-block ht-60"><img src="https://via.placeholder.com/500"--}}
            {{--                                                                      class="img-fit-cover" alt=""></a>--}}
            {{--                            </div><!-- col -->--}}
            {{--                            <div class="col-4 mg-t-2">--}}
            {{--                                <a href="" class="d-block ht-60"><img src="https://via.placeholder.com/500"--}}
            {{--                                                                      class="img-fit-cover" alt=""></a>--}}
            {{--                            </div><!-- col -->--}}
            {{--                        </div><!-- row -->--}}
            {{--                    </div><!-- col -->--}}
            {{--                </div><!-- row -->--}}
            {{--            </div><!-- profile-sidebar -->--}}
        </div><!-- media -->
    </div><!-- container -->
</div>


@include('panel.footerPanel')
@include('panel.scriptPanel')