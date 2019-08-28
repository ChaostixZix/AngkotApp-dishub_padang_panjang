@include('panel.headerPanel')
@include('panel.navbarPanel')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<link href="{{ url('/') }}/dashforge/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css"
      rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/select2/css/select2.min.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/quill/quill.core.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/quill/quill.snow.css" rel="stylesheet">

<!-- DashForge CSS -->
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.css">
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.mail.css">


<div class="content content-fixed">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row row-xs">
            <div class="col-lg-12">
                <div class="card mg-b-10">
                    <div class="card-header tx-center ">
                        <div>
                            <h6 class="mg-b-5">Pesanan Parkir</h6>
                            <p class="tx-13 tx-color-03 mg-b-0">Pesanan parkir
                                30 days</p>
                        </div>
                    </div><!-- card-header -->
                    <div class="card-body tx-center">
                        <div class="row justify-content-center">
                            <div class="col-12 tx-100 lh-1"><i class="fa fa-parking"></i></div>
                            {{--                            <div class="col-12 dropdown">--}}
                            {{--                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                            {{--                                    Kategori--}}
                            {{--                                </button>--}}
                            {{--                                <div class="dropdown-menu tx-center" aria-labelledby="dropdownMenuButton">--}}
                            {{--                                    <a class="dropdown-item" href="#"><font class=" tx-bolder tx-success">New</font></a>--}}
                            {{--                                    <a class="dropdown-item" href="#"><font class="tx-bolder tx-purple">Terima Admin</font></a>--}}
                            {{--                                    <a class="dropdown-item" href="#"><font class="tx-bolder tx-primary">Proses</font></a>--}}
                            {{--                                    <a class="dropdown-item" href="#"><font class="tx-bolder tx-gray">Done</font></a>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div><!-- card-body -->
                </div><!-- card -->

            </div>
            <div class="col-lg-12">
                <div class="panel ht-100p">
                    <div class="panel-header">
                        <h6 class="mg-b-0">Data Pesanan</h6>
                    </div>
                    <div class="panel-body">
                        <table class="table tx-center justify-content-center" id="dataPesanan">
                            <thead>
                            <tr>
                                {{--                                <th scope="col">Id</th>--}}
                                <th scope="col">ID</th>
                                <th scope="col">Jenis Kendaraan</th>
                                <th scope="col">Plat Nomor</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            -
                            <tbody>
                            @foreach($pesanan as $p)
                                <tr>
                                    {{--                                    <th scope="row">{{ $p->id }}</th>--}}
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->jenis_kendaraan  }}</td>
                                    <td>{{ $p->plat_nomor }}</td>
                                    <td>{{ $p->nama_pemesan }}</td>
                                    <td>{{ $p->nohp_pemesan }}</td>
                                    @if($p->status == 0)
                                        <td>
                                            <button class="tx-12 tx-bolder btn btn-outline-secondary tx-success mg-b-0">
                                                New
                                            </button>
                                        </td>
                                    @elseif($p->status == 1)
                                        <td>
                                            <button class="tx-12 tx-bolder btn btn-outline-secondary tx-purple mg-b-0">
                                                Selesai
                                            </button>
                                        </td>
                                    @endif
                                    <td>
                                        <a class="btn btn-xs btn-white tx-bolder tx-black" target="_BLANK"
                                           href="{{ route('parkirInvoicePage') }}/{{ $p->id }}"><i
                                                class="fa fa-eye"></i></a>
                                        {{--                                    <button class="btn btn-xs btn-outline-secondary" href="" data-toggle="modal" data-target="#editPost"--}}
                                        {{--                                       onclick=""><i--}}
                                        {{--                                            class="fa fa-edit"></i>Edit</button>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div class="panel-footer text-center tx-13">
                            {{--                            <button id="newPost" data-toggle="modal" data-target="#newPost" class="btn btn-primary"--}}
                            {{--                                    type="submit">New Post--}}
                            {{--                            </button>--}}
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- content -->
@include('panel.scriptPanel')
<script src="{{ url('/') }}/dashforge/lib/select2/js/select2.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataPesanan').DataTable({
            language: {
                searchPlaceholder: 'Cari...',
                sSearch: '',
                lengthMenu: '_MENU_ pesanan/page',
            }
        });
    })
</script>

@include('panel.footerPanel')
