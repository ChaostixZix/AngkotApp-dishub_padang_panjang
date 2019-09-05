@include('panel.headerPanel')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
                <div class="card ht-100p">
                    <div class="card-header">
                        <h6 class="mg-b-0">Data Post</h6>
                    </div>
                    <div class="card-body">
                        <table class="table" id="dataUser">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Level</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Aksi</th>
                                <th scope="col">Verify</th>
                            </tr>
                            </thead>
                            -
                            <tbody>
                            @foreach($userList as $p)
                                <tr>
                                    <th scope="row">{{ $p->id }}</th>
                                    <td>{{ $p->username }}</td>
                                    <td>{{ $p->nama_lengkap }}</td>
                                    <td class="tx-bolder">
                                        <button
                                            class="btn btn-xs btn-outline-secondary">{{ strtoupper($p->level) }}</button>
                                    </td>
                                    <td>{{ $p->saldo }}</td>
                                    <td>
                                        <button class="btn btn-xs btn-info"><i class="fa fa-user"></i></button>
                                        <button class="btn btn-xs btn-info"><i class="fa fa-dollar-sign"></i></button>
                                    </td>
                                    <td>
                                        @if($p->verify !== 1 && $p->level !== 'admin')
                                            <button onclick="verify('{{ $p->id }}', 1, $(this))" class="btn btn-xs btn-outline-success"><i class="fa fa-check"></i>
                                            </button>
                                            @else
                                            <button class="btn btn-xs btn-success">Verified</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- content -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@include('panel.scriptPanel')
<script src="{{ url('/') }}/dashforge/lib/select2/js/select2.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script>
    var dataPost = $('#dataUser').DataTable({
        order: [[0, "asc"]],
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_',
        }
    });

    function verify(id, status, button) {
        $.ajax({
            url: '{{ route('verifyAdmin') }}/' + id + '/' + status,
            type: 'get',
            success: function (data) {
                if(data === 'true')
                {
                    swal.fire({title: 'Berhasil', text: 'Berhasil verify', type: 'success'}).then( function () {
                        button.removeClass('btn-outline-success').addClass('btn-success').text('Verified');
                    });
                }
            }
        })
    }
</script>
@include('panel.footerPanel')
