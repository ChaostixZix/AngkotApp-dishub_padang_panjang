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
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.calendar.css">


<div class="contact-wrapper">
    <!-- contact-navleft -->

    <!-- contact-sidebar -->
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
                <div class="modal-footer tx-center2 pd-x-20 pd-y-15">
{{--                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>--}}
{{--                    <button type="button" class="btn btn-primary">Save Info</button>--}}
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>
    <div class="content content-fixed" id="contentAduan">
        <div class="content-header">
            <h6>Pengaduan</h6>
        </div><!-- contact-content-header -->

        <div class="content-body ps">

            <div class="col-lg-12">
                <div class="card mg-b-10">
                    <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                        <div>
                            <h6 class="mg-b-5">List Aduan</h6>
                            <p class="tx-13 tx-color-03 mg-b-0">Your sales and referral earnings over the last
                                30 days</p>
                        </div>
                    </div><!-- card-header -->
                    <div class="card-body ">
                        <div class="d-sm-flex">
                            <div class="media">
                                <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-teal tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded">
                                    <i class="icon ion-md-checkmark"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8">
                                        Aduan Selesai</h6>
                                    <h4 class="tx-20 tx-sm-18 tx-md-24 tx-normal tx-rubik mg-b-0">
                                        1</h4>
                                </div>
                            </div>
                            <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                                <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-pink tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-5">
                                    <i class="fa fa-book"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">
                                        Aduan Proses</h6>
                                    <h4 class="tx-20 tx-sm-18 tx-md-24 tx-normal tx-rubik mg-b-0">2
                                    </h4>
                                </div>
                            </div>
                            <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                                <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-danger tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded">
                                    <i class="icon ion-md-warning"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">
                                        Aduan Penting</h6>
                                    <h4 class="tx-20 tx-sm-18 tx-md-24 tx-normal tx-rubik mg-b-0">1
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- card-body -->
                </div><!-- card -->

            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h6 class="mg-b-0">Data Aduan</h6>
                        {{--                        <div class="d-flex tx-18">--}}
                        {{--                            <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>--}}
                        {{--                            <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>--}}
                        {{--                        </div>--}}
                    </div>
                    <ul class="list-group list-group-flush tx-13">
                        @foreach($listAduan as $i => $val)
                            <div id="listAduan{{ $i }}" style="display: none;">
                                @foreach($val as $l)
                                    <li class="list-group-item d-flex pd-sm-x-20">
                                        @if($l->status == 1)
                                            <div class="avatar d-none d-sm-block"><span
                                                        class="avatar-initial rounded-circle bg-teal"><i
                                                            class="icon ion-md-checkmark"></i></span></div>
                                        @elseif($l->status == 0)
                                            @if($l->tindakan == 0)
                                                <div class="avatar d-none d-sm-block"><span
                                                            class="avatar-initial rounded-circle bg-orange"><i
                                                                class="icon ion-md-warning"></i></span>
                                                </div>
                                            @elseif($l->tindakan == 1)
                                                <div class="avatar d-none d-sm-block"><span
                                                            class="avatar-initial rounded-circle bg-danger"><i
                                                                class="icon ion-md-warning"></i></span>
                                                </div>
                                            @endif
                                        @endif
                                        <div class="pd-sm-l-10">
                                            <p class="tx-medium mg-b-0">Aduan #{{ $l->id }}</p>
                                            <small class="tx-12 tx-color-03 mg-b-0">{{ \Carbon\Carbon::parse($l->tanggal_pengaduan)->subDay()->subMonth()->format('l d F, Y') }}</small>
                                        </div>
                                        <div class="mg-l-auto text-right">
                                            <button href="#" onclick="seeAduan('{{ $l->id }}')"
                                                    class="btn btn-sm pd-x-15 btn-white btn-uppercase">
                                                Show <i class="fa fa-eye"> </i>
                                            </button>
                                        </div>
                                @endforeach
                            </div>
                        @endforeach
                    </ul>
                    <div class="card-footer text-center tx-13">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mg-b-5">
                                {{--                            <li class="page-item disabled"><a class="page-link page-link-icon" href="#"><i data-feather="chevron-left"></i></a></li>--}}
                                @foreach($listAduan as $i => $val)
                                    <li id="buttonIndexAduan{{ $i }}" class="page-item"><a class="page-link" href="#" onclick="showAduan('{{ $i }}')">{{ $i + 1}}</a></li>
                                @endforeach
                                {{--                            <li class="page-item"><a class="page-link page-link-icon" href="#"><i data-feather="chevron-right"></i></a></li>--}}
                            </ul>
                        </nav>
                    </div><!-- card-footer -->
                </div><!-- card -->
            </div>


        </div><!-- contact-content-body -->
    </div><!-- contact-content-body -->

</div><!-- contact-content -->


<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

@include('panel.scriptPanel')
<script>
    $(document).ready(function () {
        logoAduanReset();
    });
    var logoAduanSelesai = $('#logoAduanSelesai');
    var logoAduanPenting = $('#logoAduanPenting');
    var logoAduanBiasa = $('#logoAduanBiasa');

    var indexAduan = 0;

    $(document).ready(function () {
        logoAduanReset();

        @foreach($listAduan as $i => $val)
        $('#listAduan{{ $i }}').hide();
        indexAduan++;
        @endforeach

        showAduan('0');
    });

    function showAduan(i) {
        for (var a = 0; a < indexAduan; a++) {
            var aduanNonAktif = $('#listAduan' + a);
            aduanNonAktif.hide();

            $('#buttonIndexAduan' + a).removeClass('active');
        }
        var aduanAktif = $('#listAduan' + i);
        aduanAktif.show();

        $('#buttonIndexAduan' + i).addClass('active');
    }

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

<script src="{{ url('/') }}/dashforge/lib/select2/js/select2.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>


@include('panel.footerPanel')
