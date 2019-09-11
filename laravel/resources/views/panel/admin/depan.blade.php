@include('panel.headerPanel')

@include('panel.navbarPanel')

<div class="content content-fixed">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <h4 class="mg-b-0 tx-spacing--1">Selamat Datang, {{ \Illuminate\Support\Facades\Session::get('username') }}</h4>
            </div>
        </div>

        <div class="row row-xs">
           <div class="d-md-flex mg-b-10">
               <div class="card text-center">
                   <div class="card-body">
                       <h4>Menu</h4>


                               <a class="btn btn-outline-secondary mg-r-5 mg-b-5"  href="{{ route('depanPublik') }}"><i class="fa  fa-home"></i><br> Home</a>
                               <a class="btn btn-outline-secondary mg-r-5 mg-b-5"  href="{{ route('publikAngkot') }}"><i class="fa fa-shuttle-van"></i><br> Angkot</a>

                               <a class="btn btn-outline-secondary mg-r-5 mg-b-5"  href="{{ route('publikAduan') }}"><i class="fa  fa-mail-bulk"></i><br> Aduan</a>
                               <a class="btn btn-outline-secondary mg-r-5 mg-b-5"  href="{{ route('updateProfil') }}"><i class="fa fa-user"></i><br> Edit Profil</a>
                               <a class="btn btn-outline-secondary mg-r-5 mg-b-5"  href="{{ route('derekPage') }}"><i class="fa  fa-car-crash"></i><br> Pesan Derek</a>
                               <a class="btn btn-outline-secondary mg-r-5 mg-b-5"  href="{{ route('parkirPage') }}"><i class="fa  fa-parking"></i><br> Pesan Parkir</a>



                   </div>
               </div>
           </div>
            <div class="d-md-flex mg-b-10">
                <div class="card text-center">
                    <div class="card-body">
                        <h4>Parkir</h4>
                            <a class="btn btn-outline-secondary mg-r-5 mg-b-5"  href="{{ route('angkotPageAdmin') }}"><i class="fa  fa-shuttle-van"></i><br> Data Angkot</a>
                            <a class="btn btn-outline-secondary mg-r-5 mg-b-5"  href="{{ route('jurusanPageAdmin') }}"><i class="fa  fa-route"></i><br> Data Jurusan</a>
                    </div>
                </div>
            </div>
            <div class="d-md-flex mg-b-10">
                <div class="card text-center">
                    <div class="card-body">
                        <h4>Parkir</h4>
                        <a class="btn btn-outline-secondary mg-r-5 mg-b-5"  href="{{ route('parkirPesananPageAdmin') }}"><i class="fa  fa-parking"></i><br> Pesanan Parkir</a>
                        <a class="btn btn-outline-secondary mg-r-5 mg-b-5"  href="{{ route('parkirPesananSearchPageAdmin') }}"><i class="fa  fa-search"></i><br> Cari Pesanan Parkir</a>
                    </div>
                </div>
            </div>
            <div class="d-md-flex mg-b-10">
                <div class="card text-center">
                    <div class="card-body">
                        <h4>Derek</h4>
                        <a class="btn btn-outline-secondary mg-r-5 mg-b-5"  href="{{ route('derekPesananPageAdmin') }}"><i class="fa  fa-car-crash"></i><br> Pesanan Derek</a>
                    </div>
                </div>
            </div>
            <div class="d-md-flex mg-b-10">
                <div class="card text-center">
                    <div class="card-body">
                        <h4>Aduan</h4>
                        <a class="btn btn-outline-secondary mg-r-5 mg-b-5"  href="{{ route('aduanPageAdmin') }}"><i class="fa  fa-mail-bulk"></i><br> List Aduan</a>
                    </div>
                </div>
            </div>
            <div class="d-md-flex mg-b-10">
                <div class="card text-center">
                    <div class="card-body">
                        <h4>User</h4>
                        <a class="btn btn-outline-secondary mg-r-5 mg-b-5"  href="{{ route('userAdmin') }}"><i class="fa  fa-users"></i><br> User</a>
                    </div>
                </div>
            </div>

        </div><!-- row -->
    </div><!-- container -->
</div><!-- content -->



@include('panel.footerPanel')
@include('panel.scriptPanel')
