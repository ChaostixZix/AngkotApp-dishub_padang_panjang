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
                    Alamat Penjemputan : <p id="alamatJemput"></p>
                    Alamat Pengantara : <p id="alamatAntar"></p>
                    Jarak : <p id="jarak"></p>
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
                <div class="tx-100 lh-1"><i class="fa fa-car-crash"></i></div>
                <h3 class="mg-b-25">Pesan Derek</h3>
                <p class="tx-color-03 mg-b-25">Pesan derek ke alamat mu</p>
                <h1 class="tx-rubik tx-normal mg-b-30 mg-t-auto">30Rb / KM</h1>
                <button class="btn btn-primary btn-block0" onclick="formPesan()">Pesan</button>
            </div><!-- col -->
        </div><!-- row -->
        <div id="formPesanDerek" style="display: none" class="row justify-content-center">
            <div class="col-10 col-sm-12 col-md-12 col-lg-12 mg-t-40 mg-sm-t-0 d-flex flex-column">
                <div class="pd-t-20 wd-100p">
                    <h4 class="tx-color-01 mg-b-5">Pesan Derek</h4>
                    <div class="tx-100 lh-1"><i class="fa fa-car-crash"></i></div>
                    <div class="form-group mg-b-5">
                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Koordinat
                            Anda</label>
                        <input readonly="" id="koordinat_pemesan" type="text" class="form-control">
                    </div><!-- col -->
                    <div class="row row-sm mg-b-5">
                        <div class="col-sm">
                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Alamat
                                Penjemputan</label>
                            <input id="alamat_jemput" type="text" class="form-control"
                                   placeholder="Masukkan alamat penjemputan">
                        </div><!-- col -->
                        <div class="col-sm-5">
                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Koordinat
                                Penjemputan</label>
                            <input readonly="" id="koordinat_jemput" type="text" class="form-control">
                        </div><!-- col -->
                    </div>
                    <div class="row row-sm mg-b-5">
                        <div class="col-sm">
                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Alamat
                                Pengantaran</label>
                            <input id="alamat_antar" type="text" class="form-control"
                                   placeholder="Masukkan alamat pengantaran">
                        </div><!-- col -->
                        <div class="col-sm-5">
                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Koordinat
                                Pengantaran</label>
                            <input readonly="" id="koordinat_antar" type="text" class="form-control">
                        </div><!-- col -->
                    </div>
                    <div class="form-group mg-b-5">
                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nomor HP</label>
                        <input value="{{ $dataProfil->no_hp }}" id="nohp_pemesan" type="text" class="form-control"
                               placeholder="Masukkan nomor HP">
                    </div>
                    <div class="form-group mg-b-5">
                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nama</label>
                        <input value="{{ $dataProfil->nama_lengkap }}" id="nama_pemesan" type="text"
                               class="form-control" placeholder="Masukkan nama">
                    </div>
                    <div class="form-group tx-12">
                        Setelah mengklik <strong>Pesan Sekarang</strong> saldo akan otomatis dikurangi
                    </div><!-- form-group -->

                    <button id="btnPesan" value="btn" onclick="promptPesan()" class="btn btn-brand-02 btn-block">Pesan Sekarang</button>
                </div>
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
</div><!-- content -->


@include('panel.footerPanel')
@include('panel.scriptPanel')
<script>
    $(document).ready(function () {
        $('#formPesanDerek').hide();

        $('#alamat_antar').on('change', function () {
            $('#koordinat_antar').val('');
            var alamat = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ route('getInfoOfOrigins') }}",
                dataType: 'json',
                data: {'origins': alamat},

                success: function (data) {
                    var json = $.parseJSON(JSON.stringify(data));
                    if (typeof (json) != "undefined" && json !== null) {
                        var geometry = json.results[0].geometry.location;
                        var lat = geometry.lat;
                        var lng = geometry.lng;
                        $('#koordinat_antar').val(lat + ", " + lng);
                    } else {
                        //gagal
                    }
                }
            }).done(function () {
                console.log("Done Maps");
            });
        });

        $('#alamat_jemput').on('change', function () {
            $('#koordinat_jemput').val('');
            var alamat = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ route('getInfoOfOrigins') }}",
                dataType: 'json',
                data: {'origins': alamat},

                success: function (data) {
                    var json = $.parseJSON(JSON.stringify(data));
                    if (typeof (json) != "undefined" && json !== null) {
                        var geometry = json.results[0].geometry.location;
                        var lat = geometry.lat;
                        var lng = geometry.lng;
                        $('#koordinat_jemput').val(lat + ", " + lng);
                    } else {
                        //gagal
                    }
                }
            }).done(function () {
                console.log("Done Maps");
            });
        });

    });

    function formPesan() {
        $('#formPesanDerek').show();
        getLocation()
    }

    function getLocation() {
        if (navigator.geolocation) {
            Swal.fire(
                'Info!',
                'Klik "Izinkan" saat diminta perizinan untuk menentukan lokasi anda.',
                'info'
            ).then(function () {
                navigator.geolocation.getCurrentPosition(showPosition);
                $('html, body').animate({
                    scrollTop: $("#formPesanDerek").offset().top
                }, 2000);
            });
        } else {
            Swal.fire(
                'Gagal!',
                'Klik "Izinkan" saat diminta perizinan untuk menentukan lokasi anda.',
                'error'
            ).then(function () {
                getLocation();
            });
        }
    }

    function showPosition(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        $('#koordinat_pemesan').val(latitude + ', ' + longitude);
    }

    function cekInput() {
        var lenght = $("#formPesanDerek :input").length;
        var a = 0;
        $("#formPesanDerek :input").each(function () {
            a++;
            console.log($('#btnPesan').attr('func') !== true && a === lenght);
            if ($(this).val() === '') {
                $(this).focus();
                alert('Harap isi semua input');
                $('#btnPesan').attr('func', true);
                return false;
            }
            if ($('#btnPesan').attr('func') !== true && a === lenght) {
                promptPesanS();
                $('#btnPesan').attr('func', false);
                return true;
            }
        });
    }

    function promptPesan() {
        cekInput();
    }

    function promptPesanS() {
            $('#placeholderPesan').show();
            $('#detailPesan').hide();
            $('#alamatJemput').text($('#alamat_jemput').val());
            $('#alamatAntar').text($('#alamat_antar').val());
            $.ajax({
                type: "get",
                url: "{{ route('getJarakDerek') }}",
                data: {koordinat_jemput: $('#koordinat_jemput').val(), koordinat_antar: $('#koordinat_antar').val()},

                success: function (data) {
                    $('#jarak').text(data + " KM");
                }
            }).done(function () {
                console.log("Done Maps");
            });
            $.ajax({
                type: "get",
                url: "{{ route('getHargaDerek') }}",
                data: {koordinat_jemput: $('#koordinat_jemput').val(), koordinat_antar: $('#koordinat_antar').val()},

                success: function (data) {
                    var number_string = data.toString(),
                        sisa = number_string.length % 3,
                        rupiah = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);

                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }
                    $('#harga').text("Rp. " + rupiah);
                }
            }).done(function () {
                $('#placeholderPesan').hide();
                $('#detailPesan').show();
            });

            $('#pesanModal').modal('show');
    }

    function pesan() {
        $('#placeholderPesan').show();
        $('#detailPesan').hide();
        var formData = new FormData();
        formData.append('pemesan', '{{ Session::get('username') }}');
        formData.append('_token', '{{ csrf_token() }}');
        var arrayData = ['koordinat_pemesan', 'alamat_jemput', 'koordinat_jemput', 'alamat_antar', 'koordinat_antar', 'nama_pemesan', 'nohp_pemesan'];
        arrayData.forEach(function (value) {
            formData.append(value, $('#' + value).val());
        });
        console.log(formData);
        $.ajax({
            type: "post",
            url: "{{ route('derekNew') }}",
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,

            success: function (data) {
                var json = $.parseJSON(JSON.stringify(data));

                if (json['status'] !== "false") {
                    window.location.replace("{{ route('derekInvoicePage') }}/" + json.invoiceId)
                } else {
                    Swal.fire({title: 'Gagal', text: 'Reason : ' + json['reason'], type: 'error'})
                }
            }
        }).done(function () {
            console.log("Done Maps");
        });
    }


</script>
