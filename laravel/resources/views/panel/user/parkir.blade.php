@include('panel.headerPanel')
@include('panel.navbarPanel')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<div class="modal fade" id="pesanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel2">Konfirmasi</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="placeholderPesan" style="display: none" class="placeholder-paragraph aligned-centered">
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <div id="detailPesan" style="display: none" class="mg-b-0">
                    Tempat Parkir : <p id="tempatParkir"></p>
                    Jenis Kendaraan : <p id="jenisKendaraan"></p>
                    Plat Nomor : <p id="platNomor"></p>
                    Harga : <p id="harga"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Batal</button>
                <button onclick="pesan()" type="button" class="btn btn-primary tx-13">Pesan</button>
            </div>
        </div>
    </div>
</div>
<div class="content content-fixed content-auth-alt">
    <div class="container ht-100p tx-center">
        <div class="row justify-content-center row-xs mg-b-250">
            <div class="col-10 col-sm-6 col-md-4 col-lg-3 mg-t-40 mg-sm-t-0 d-flex flex-column">
                <div class="tx-100 lh-1"><i class="fa fa-parking"></i></div>
                <h3 class="mg-b-25">Pesan Parkir</h3>
                <p class="tx-color-03 mg-b-25">Pesan tempat parkir</p>
                <h1 class="tx-rubik tx-normal mg-b-30 mg-t-auto">30Rb / KM</h1>
                <button class="btn btn-primary btn-block0" onclick="formPesan()">Pesan</button>
            </div><!-- col -->
        </div><!-- row -->
        <div id="formPesanParkir" style="display: none" class="row justify-content-center">
            <div class="col-10 col-sm-12 col-md-12 col-lg-12 mg-t-40 mg-sm-t-0 d-flex flex-column">
                <div class="pd-t-20 wd-100p">
                    <h4 class="tx-color-01 mg-b-5">Pesan Parkir</h4>
                    <div class="tx-100 lh-1"><i class="fa fa-parking"></i></div>
                    <div class="form-group mg-b-5">
                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Tempat
                            Parkir</label>
                        <select id="tempat_parkir" class="custom-select">
                            <option value=""></option>
                            @foreach($tempat_parkir_list[0] as $t)
                                @if($t->kapasitas_left > 0)
                                    <option value="{{ $t->id }}">{{ $t->nama_tempat }}</option>
                                @else
                                    <option value="{{ $t->id }}" disabled>{{ $t->nama_tempat }} (Penuh)</option>
                                @endif
                            @endforeach
                        </select>
                    </div><!-- col -->
                    <div class="row row-sm mg-b-5">
                        <div class="col-sm">
                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Jenis
                                Kendaraan</label>
                            <select id="jenis_kendaraan" class="custom-select">
                                <option value="">Pilih</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Motor">Motor</option>
                            </select>
                        </div><!-- col -->
                        <div class="col-sm-5">
                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Plat Nomor
                            </label>
                            <input id="plat_nomor" type="text" class="form-control">
                        </div><!-- col -->
                    </div>
                    <div class="form-group mg-b-5">
                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nomor HP</label>
                        <input id="nohp_pemesan" type="text" class="form-control" placeholder="Masukkan nomor HP">
                    </div>
                    <div class="form-group mg-b-5">
                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nama</label>
                        <input id="nama_pemesan" type="text" class="form-control" placeholder="Masukkan nama">
                    </div>
                    <div class="form-group tx-12">
                        Setelah mengklik <strong>Pesan Sekarang</strong> saldo akan otomatis dikurangi
                    </div><!-- form-group -->

                    <button onclick="promptPesan()" class="btn btn-brand-02 btn-block">Pesan Sekarang</button>
                </div>
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
</div><!-- content -->


@include('panel.footerPanel')
@include('panel.scriptPanel')
<script>
    var hargaPakir =
        {
            @foreach($tempat_parkir_list[0] as $t)
            '{{ $t->id }}': {
                'Nama': '{{ $t->nama_tempat }}',
                'Mobil': '{{ $t->harga_mobil }}',
                'Motor': '{{ $t->harga_motor }}'
            },
            @endforeach
        };
    $(document).ready(function () {
        $('#formPesanParkir').hide();


    });

    function pesan() {
        $('#placeholderPesan').show();
        $('#detailPesan').hide();
        var formData = new FormData();
        formData.append('pemesan', '{{ Session::get('username') }}');
        formData.append('_token', '{{ csrf_token() }}');
        var arrayData = ['tempat_parkir', 'jenis_kendaraan', 'plat_nomor', 'nama_pemesan', 'nohp_pemesan'];
        arrayData.forEach(function (value) {
            formData.append(value, $('#' + value).val());
        });
        console.log(formData);
        $.ajax({
            type: "post",
            url: "{{ route('parkirNew') }}",
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,

            success: function (data) {
                var json = $.parseJSON(JSON.stringify(data));

                if (json['status'] !== "false") {
                    window.location.replace("{{ route('parkirInvoicePage') }}/" + json.invoiceId)
                }
                else {
                    Swal.fire({title: 'Gagal', text: 'Reason : ' + json['reason'], type: 'error'})
                }
            }
        }).done(function () {
            console.log("Done Maps");
            $('#pesanModal').modal('hide');
        });
    }


    function promptPesan() {

        $('#placeholderPesan').show();
        $('#detailPesan').hide();
        var id_tempat_parkir = $('#tempat_parkir').val();
        var jenis_kendaraan = $('#jenis_kendaraan').val();
        var harga = hargaPakir[id_tempat_parkir][jenis_kendaraan];
        var plat_nomor = $('#plat_nomor').val();

        $('#tempatParkir').text(hargaPakir[id_tempat_parkir]['Nama']);
        $('#jenisKendaraan').text(jenis_kendaraan);
        $('#harga').text(harga);
        $('#platNomor').text($('#plat_nomor').val());
        $('#pesanModal').modal('show');

        $('#placeholderPesan').hide();
        $('#detailPesan').show();
    }

    @if($tempat_parkir_list['jumlah_kapasitas_all'] > 0)
    function formPesan() {
        $('#formPesanParkir').show();
        $('html, body').animate({
            scrollTop: $("#formPesanParkir").offset().top
        }, 2000);
    }

    @else

    function formPesan() {

        Swal.fire({title: 'Penuh', text: 'Tempat parkir penuh!', type: 'error'})

    }
    @endif


</script>
