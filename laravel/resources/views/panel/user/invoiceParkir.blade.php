@include('panel.headerPanel')
@include('panel.navbarPanel')
<link href="{{ url('/') }}/dashforge/lib/select2/css/select2.min.css" rel="stylesheet">


@foreach($data as $d)
    <div class="content content-fixed bd-b">
        <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
            <div id="invoice" class="row">
                <div class="col-sm-6">
                    <label class="tx-sans tx-uppercase tx-10 tx-medium tx-spacing-1 tx-color-03">Billed From</label>
                    <h6 class="tx-15 tx-bolder mg-b-10">PEMERINTAH KOTA PADANG PANJANG .</h6>
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
                            <span>Nomor Spot</span>
                            <span>{{$d->nomor}}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Jenis Pesan</span>
                            <span>Parkir</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Tanggal</span>
                            <span>{{ $d->tanggal }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Status</span>
                            @if($d->status == 0)
                                <button class="tx-12 tx-bolder btn btn-outline-secondary tx-success mg-b-0">New</button>
                            @elseif($d->status == 1)
                                <button class="tx-12 tx-bolder btn btn-outline-secondary tx-purple mg-b-0">Selesai</button>
                            @endif
                        </li>
                    </ul>
                </div><!-- col -->
            </div><!-- row -->
            <h6 class="tx-15 tx-bolder">RETRIBUSI PELAYANAN PARKIR DITEPI JALAN UMUM .</h6>
            <div class="table-responsive mg-t-40">
                <table class="table table-invoice bd-b">
                    <thead>
                    <tr>
                        <th class="wd-10p">Type</th>
                        <th class="wd-30p d-none d-sm-table-cell">Tanggal</th>
                        <th class="wd-30p d-none d-sm-table-cell">Jenis Kendaraan</th>
                        <th class="wd-30p d-none d-sm-table-cell">Plat Nomor</th>
                        <th class="wd-30p d-none d-sm-table-cell">Nomor Spot</th>
                        <th class="tx-right">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="tx-nowrap">Parkir</td>
                        <td class="d-none d-sm-table-cell tx-color-03">{{ $d->tanggal }}
                        </td>
                        <td class="d-none d-sm-table-cell tx-color-03">{{ $d->jenis_kendaraan }}
                        </td>
                        <td class="d-none d-sm-table-cell tx-color-03">{{ strtoupper($d->plat_nomor) }}
                        </td>
                        <td class="d-none d-sm-table-cell tx-color-03">{{ strtoupper($d->nomor) }}
                        </td>
                        <td class="tx-right">{{ "Rp " . number_format($d->harga,2,',','.') }}</td>

                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="row justify-content-between">
                <div class="col-sm-6 col-lg-6 order-2 order-sm-0 mg-t-40 mg-sm-t-0">
                    <label class="tx-sans tx-uppercase tx-10 tx-medium tx-spacing-1 tx-color-03">Notes</label>
                    <p>Berikan ini pada tukang parkir.</p>
                    <h6 class="tx-15 tx-bolder mg-b-10">
                        Perwarko NO. 5 Tahun 2017, Tanggal 13 November 2017<br>
                        Tentang Retribusi Jalan Umum
                    </h6>
                    <h6 class="tx-15 tx-bolder mg-b-10">
                        KENDARAAN HARUS DIKUNCI/TIDAK MENGGANTI KERUGIAN KENDARAAN DAN BARANG-BARANG YANG RUSAK/HILANG
                    </h6>
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

                    <button onclick="printInvoice()" class="btn btn-block btn-primary"><i data-feather="printer" class="mg-r-5"></i>Print
                    </button>
                    @if($d->status == 0)
                        <button onclick="selesai('{{ $d->id }}')" class="btn btn-block btn-outline-secondary tx-purple tx-bolder"><i class="mg-r-5 fa fa-check"></i>Selesai
                        </button>
                    @endif
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- content -->
@endforeach

@include('panel.footerPanel')
@include('panel.scriptPanel')
<script>
    function printInvoice()
    {
        window.print();
        // $('#invoice').print();
    }
    function selesai(id)
    {
        $.ajax({
            url: '{{ route('parkirSelesai') }}/' + id,
            dataType: 'json',
            success: function (data) {
                var json = $.parseJSON(JSON.stringify(data));
                if(json['status'] === 'true')
                {
                    location.reload();
                }
            }
        })
    }
</script>
<script src="{{ url('/') }}/dashforge/lib/select2/js/select2.min.js"></script>
