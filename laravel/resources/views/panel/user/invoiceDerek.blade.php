@include('panel.headerPanel')
@include('panel.navbarPanel')
<link href="{{ url('/') }}/dashforge/lib/select2/css/select2.min.css" rel="stylesheet">


@foreach($data as $d)
    @if(Session::get('level') == 'admin')
        <div class="modal fade" id="prosesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content tx-14">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel2">Pilih Supir</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body col-12">
                        <div class="form-group">
                            <label>ID</label>
                            <input id="idPesanan" type="text" class="form-control" value="{{ $d->id }}">
                        </div>
                        <div class="form-group">
                            <label>Supir</label>
                            <select class="custom-select" id="selectSupir">
                                <option value=""></option>
                                @foreach($supirList as $s)
                                    <option value="{{ $s->nama_lengkap }}">{{ $s->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Batal</button>
                        <button onclick="proses('{{ $d->id }}', $('#selectSupir').val())" type="button" class="btn btn-primary tx-13">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
                                <button class="tx-12 tx-bolder btn btn-outline-secondary tx-teal mg-b-0">Terima
                                    Admin
                                </button>
                            @elseif($d->status == 2)
                                <button class="tx-12 tx-bolder btn btn-outline-secondary tx-primary mg-b-0">Proses
                                </button>
                            @elseif($d->status == 3)
                                <button class="tx-12 tx-bolder btn btn-outline-secondary tx-purple mg-b-0">Done</button>
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
                        @if($d->status == '0')
                            <button onclick="terima('{{ $d->id }}')" class="btn btn-block btn-outline-success"><i
                                    class="fa fa-check"></i><br>Terima
                                Pesanan
                            </button>
                        @elseif($d->status == '1')
                            <button onclick="promptProses()"
                                    class="btn btn-block btn-outline-primary"><i class="fa fa-pencil-alt"></i><br>Proses
                                Pesanan
                            </button>
                        @elseif($d->status == '2')
                            <button onclick="selesai('{{ $d->id }}')" class="btn btn-block btn-outline-secondary tx-bolder tx-purple"><i
                                    class="fa fa-pencil-alt"></i><br>Pesanan
                                Selesai
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
<script src="{{ url('/') }}/dashforge/lib/select2/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('.selectSearch').select2({
            placeholder: 'Pilih 1',
            searchInputPlaceholder: 'Search options'
        });
    });
    function terima(id) {
        $.ajax({
            url: "{{ route('derekChangeStatus') }}/" + id + "/1",
            success: function (data) {
                if (data === 'true') {
                    location.reload();
                }else {
                    alert('error');
                }
            }
        })
    }

    function promptProses() {
        $('#prosesModal').modal('show');
    }

    function proses(id, supir) {
        $.ajax({
            url: "{{ route('derekChangeStatus') }}/" + id + "/2/" + supir,
            success: function (data) {
                if (data === 'true') {
                    location.reload();
                }else {
                    alert('error');
                }
            }
        })
    }

    function selesai(id) {
        $.ajax({
            url: "{{ route('derekChangeStatus') }}/" + id + "/3",
            success: function (data) {
                if (data === 'true') {
                    location.reload();
                }else {
                    alert('error');
                }
            }
        })
    }
</script>
