@include('panel.headerPanel')
@include('panel.navbarPanel')
@foreach($data as $d)
    <div class="content content-fixed bd-b">
        <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
            <div class="row">
                <div class="col-sm-6">
                    <label class="tx-sans tx-uppercase tx-10 tx-medium tx-spacing-1 tx-color-03">Billed From</label>
                    <h6 class="tx-15 mg-b-10">DinasPerhubungan.</h6>
                    {{--                    <p class="mg-b-0">201 Something St., Something Town, YT 242, Country 6546</p>--}}
                    {{--                    <p class="mg-b-0">Tel No: 324 445-4544</p>--}}
                    {{--                    <p class="mg-b-0">Email: youremail@companyname.com</p>--}}
                </div><!-- col -->
                <div class="col-sm-6 tx-right d-none d-md-block">
                    <label class="tx-sans tx-uppercase tx-10 tx-medium tx-spacing-1 tx-color-03">Invoice Number</label>
                    <h1 class="tx-normal tx-color-04 mg-b-10 tx-spacing--2">#{{$d->id}}</h1>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-8 mg-t-40 mg-sm-t-0 mg-md-t-40">
                    <label class="tx-sans tx-uppercase tx-10 tx-medium tx-spacing-1 tx-color-03">Billed To</label>
                    <h6 class="tx-15 mg-b-10">{{ $d->nama_pemesan }} ( {{ $d->pemesan }} )</h6>
                    <p class="mg-b-0">No Hp: {{ $d->nohp_pemesan }}</p>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-4 mg-t-40">
                    <label class="tx-sans tx-uppercase tx-10 tx-medium tx-spacing-1 tx-color-03">Invoice
                        Information</label>
                    <ul class="list-unstyled lh-7">
                        <li class="d-flex justify-content-between">
                            <span>Invoice Number</span>
                            <span>{{$d->id}}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Jenis Pesan</span>
                            <span>Derek</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Tanggal</span>
                            <span>{{ $d->date }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Jam</span>
                            <span>{{ $d->time }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Status</span>
                            @if($d->status == 0)
                                <button class="tx-12 tx-bolder btn btn-outline-secondary tx-success mg-b-0">New</button>
                            @elseif($d->status == 1)
                                <button class="tx-12 tx-bolder btn btn-outline-secondary tx-purple mg-b-0">Terima
                                    Admin
                                </button>
                            @elseif($d->status == 2)
                                <button class="tx-12 tx-bolder btn btn-outline-secondary tx-primary mg-b-0">Proses
                                </button>
                            @elseif($d->status == 3)
                                <button class="tx-12 tx-bolder btn btn-outline-secondary tx-gray mg-b-0">Done</button>
                            @endif
                        </li>
                    </ul>
                </div><!-- col -->
            </div><!-- row -->

            <div class="table-responsive mg-t-40">
                <table class="table table-invoice bd-b">
                    <thead>
                    <tr>
                        <th class="wd-10p">Type</th>
                        <th class="wd-30p d-none d-sm-table-cell">Alamat Penjemputan</th>
                        <th class="wd-30p d-none d-sm-table-cell">Alamat Pengantaran</th>
                        <th class="tx-right">Unit Price</th>
                        <th class="tx-right">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="tx-nowrap">Derek</td>
                        <td class="d-none d-sm-table-cell tx-color-03">{{ $d->alamat_jemput }}
                            ( {{ $d->koordinat_jemput }} )
                        </td>
                        <td class="d-none d-sm-table-cell tx-color-03">{{ $d->alamat_antar }}( {{ $d->koordinat_antar }}
                            )
                        </td>
                        <td class="tx-right">Rp. 30.000 /KM</td>
                        <td class="tx-right">{{ "Rp " . number_format($d->harga,2,',','.') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="row justify-content-between">
                <div class="col-sm-6 col-lg-6 order-2 order-sm-0 mg-t-40 mg-sm-t-0">
                    <label class="tx-sans tx-uppercase tx-10 tx-medium tx-spacing-1 tx-color-03">Notes</label>
                    <p>Anda akan dihubungi oleh Admin DinasPerhubungan. Anda bisa menelepon 08112233445566.</p>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-4 order-1 order-sm-0">
                    <ul class="list-unstyled lh-7 pd-r-10">
                        <li class="d-flex justify-content-between">
                            <span>Sub-Total</span>
                            <span>{{ "Rp " . number_format($d->harga,2,',','.') }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Total Due</strong>
                            <strong>{{ "Rp " . number_format($d->harga,2,',','.') }}</strong>
                        </li>
                    </ul>

                    <button class="btn btn-block btn-primary"><i data-feather="printer" class="mg-r-5"></i>Print
                    </button>
                    @if(Session::get('level') == "admin")
                        @if($d->status == 0)
                            <button class="btn btn-block btn-outline-success"><i class="fa fa-check"></i><br>Terima Pesanan
                            </button>
                        @else
                            <button class="btn btn-block btn-outline-primary"><i class="fa fa-pencil-alt"></i><br>Ganti
                                Status
                            </button>
                        @endif
                    @endif
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- content -->
@endforeach

@include('panel.footerPanel')
@include('panel.scriptPanel')
