@include('panel.headerPanel')

@include('panel.navbarPanel')

<div class="content content-fixed">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <h4 class="mg-b-0 tx-spacing--1">Selamat
                    Datang, {{ \Illuminate\Support\Facades\Session::get('username') }}</h4>
            </div>
        </div>

        <div class="row row-xs">
            @foreach($listAngkot as $l)
                <div class="col-md-6 col-xl-4 mg-t-10">
                    <div class="card card-help ht-100p">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="mg-b-0">Angkot</h6>
                        </div>
                        <div class="card-body tx-13">
                            <div class="tx-60 lh-0 mg-b-25"><i class="fa fa-shuttle-van"></i></div>
                            <h5><a href="" class="link-01">{{ $l->nama_angkot }}</a></h5>
                            @foreach($dataJurusan as $c)
                                @if($c->id == $l->id_jurusan)
                                    <p class="tx-color-03 mg-b-0">{{ $c->awal_jurusan }}
                                        -> {{ $c->tujuan_jurusan }}</p>
                                @endif
                            @endforeach
                        </div>
                        <div class="card-footer text-center tx-13">
                            <select id="id_jurusan" class="custom-select mg-r-5">
                                <option value=""></option>
                                @foreach($dataJurusan as $c)
                                    @if($c->id !== $l->id_jurusan)
                                        <option value="{{ $c->id }}">{{ $c->awal_jurusan }}
                                            -> {{ $c->tujuan_jurusan }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button onclick="gantiJurusan('{{ $l->id }}')" class="btn btn-primary">Set</button>
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div>
            @endforeach
        </div><!-- row -->
    </div><!-- container -->
</div><!-- content -->


@include('panel.footerPanel')
@include('panel.scriptPanel')
<script>
    function gantiJurusan(id) {
        var id_jurusan = $('#id_jurusan').val();
        $.ajax({
            url: '{{ route('gantiJurusan') }}/' + id + '/' + id_jurusan,
            type: 'get',
            processData: false,
            contentType: false,
            success: function (data) {
                if (data === 'true') {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Berhasil mengganti jurusan',
                        type: 'success'
                    }).then(function () {
                        window.location.reload();
                    });
                } else {
                    Swal.fire('Gagal', 'Gagal mengganti jurusan', 'error');
                }

            }
        })
    }
</script>
