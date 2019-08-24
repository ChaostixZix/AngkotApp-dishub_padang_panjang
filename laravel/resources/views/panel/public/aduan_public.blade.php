@include('panel.headerPanel')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@include('panel.navbarPanel')
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.css">
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.profile.css">
<div class="content content-fixed content-profile">
    <div class="modal modal fade" id="aduanModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered wd-sm-650" role="document">
            <div class="modal-content">
                <div class="modal-header pd-y-20 pd-x-20 pd-sm-x-30">
                    <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal"
                       aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                    <div class="media align-items-center">
                        <div id="logoAduanSelesai">
                            <div style="display: none;"
                                 class="wd-40 wd-md-50 ht-40 ht-md-50 bg-teal tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded">
                                <i id="faAduan" class="icon ion-md-checkmark"></i>
                            </div>
                        </div>
                        <div id="logoAduanPenting">
                            <div style="display: none;"
                                 class="wd-40 wd-md-50 ht-40 ht-md-50 bg-danger tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded">
                                <i id="faAduan" class="icon ion-md-warning"></i>
                            </div>
                        </div>
                        <div id="logoAduanBiasa">
                            <div style="display: none;"
                                 class="wd-40 wd-md-50 ht-40 ht-md-50 bg-orange tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded">
                                <i id="faAduan" class="icon ion-md-warning"></i>
                            </div>
                        </div>

                        <div class="media-body mg-sm-l-20">
                            <h4 class="tx-18 tx-sm-20 mg-b-2">Aduan #<span id="idAtasAduan">ID</span></h4>
                            <p id="judulAtasAduan" class="tx-16 tx-color-03 mg-b-0">Judul Aduan.</p>
                        </div>
                    </div><!-- media -->
                </div><!-- modal-header -->
                <div class="modal-body pd-sm-t-30 pd-sm-b-40 pd-sm-x-30">
                    <div class="form-group">
                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">ID Aduan</label>
                        <input readonly id="idAduan" type="text" class="form-control" placeholder="ID Aduan">
                    </div>
                    <div class="row row-sm mg-b-5">
                        <div class="col-sm">
                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Judul
                                Aduan</label>
                            <input readonly id="judulAduan" type="text" class="form-control" placeholder="Judul Aduan">
                        </div><!-- col -->
                        <div class="col-sm-5 mg-t-20 mg-sm-t-0">
                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Pengadu</label>
                            <input readonly id="pengaduAduan" type="text" class="form-control" placeholder="Pengadu">
                        </div><!-- col -->
                    </div>
                    <div class="form-group mg-t-5">
                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Konten</label>
                        <textarea rows="9" readonly id="kontenAduan" type="text" class="form-control"
                                  placeholder="Konten Aduan"></textarea>
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer text-center">
                    {{--                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>--}}
                    <a type="button" id="gambarAduan" href="http://google.com" target="_blank" class="btn btn-primary">Lihat Gambar</a>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="media d-block d-lg-flex">

            <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10">

                @foreach($listAduan as $a)
                    <div class="card mg-b-20 mg-lg-b-25">
                        <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                            <h6 class=" tx-semibold mg-b-0"><font class="tx-uppercase">Aduan #{{ $a->id }}</font> - "{{ $a->judul }}"</h6>

                        </div><!-- card-header -->
                        <div class="card-body pd-20 pd-lg-25">
                            <div class="media align-items-center mg-b-20">
                                <div class="avatar avatar-online"><img src="https://via.placeholder.com/500"
                                                                       class="rounded-circle" alt=""></div>
                                <div class="media-body pd-l-15">
                                    <h6 class="mg-b-3">{{ $a->pengadu  }}</h6>
                                    <span class="d-block tx-13 tx-color-03">{{ \Carbon\Carbon::parse($a->tanggal_pengaduan)->subDay()->subMonth()->format('l d F, Y') }}</span>
                                </div>

                            </div><!-- media -->
                            <p >{{ $a->aduan }}</p>



                        </div>
                        <div class="card-footer bg-transparent pd-y-15 pd-x-20">
                            <nav class="nav nav-with-icon tx-13">
                                <a href="#" onclick="seeAduan('{{ $a->id }}')" class="nav-link">
                                    Lihat Detail
                                    <i class="fa fa-picture-o"></i>
                                </a>
                            </nav>
                        </div>
                    </div><!-- card -->
                @endforeach


            </div><!-- media-body -->

        </div><!-- media -->
    </div><!-- container -->
</div><!-- content -->

@include('panel.scriptPanel')
<script>
    var logoAduanSelesai = $('#logoAduanSelesai');
    var logoAduanPenting = $('#logoAduanPenting');
    var logoAduanBiasa = $('#logoAduanBiasa');
    function logoAduanReset() {
        logoAduanSelesai.hide();
        logoAduanPenting.hide();
        logoAduanBiasa.hide();
    }

    var classLogo = "bg-danger";
    var classFa = "ion-md-warning";
    var logoAduan = $('#logoAduan');
    var faAduan = $('#faAduan');
    function seeAduan(id) {
        $.ajax({
            url: '{{ route('getAduan') }}',
            data: {id: id, _token: '{{ csrf_token() }}'},
            type: 'post',
            dataType: 'json',
            async: false,
            success: function (data) {
                var json = $.parseJSON(JSON.stringify(data));
                console.log(data);
                $('#idAduan').val(json[0].id);
                $('#idAtasAduan').text(json[0].id);
                $('#pengaduAduan').val(json[0].pengadu);
                $('#judulAduan').val(json[0].judul);
                $('#judulAtasAduan').text(json[0].judul);
                $('#kontenAduan').text(json[0].aduan);
                if(json[0].gambar !== null)
                {
                    $('#gambarAduan').show();
                    $('#gambarAduan').attr("href", "{{ url('/') }}/aduanGambar/" + json[0].gambar);
                }else {
                    $('#gambarAduan').hide();
                }
                $('#aduanModal').modal();

                console.log(json[0].status);
                logoAduan.removeClass(classLogo);
                faAduan.removeClass(classFa);
                delete classLogo;
                delete classFa;
                logoAduanReset();


                if (json[0].status == '0') {
                    if (json[0].tindakan == '1') {
                        logoAduanPenting.show();
                    } else if (json[0].tindakan == '0') {
                        logoAduanBiasa.show();
                    }
                } else if (json[0].status == '1') {
                    logoAduanSelesai.show();
                }

            }
        })
    }
</script>

@include('panel.footerPanel')
