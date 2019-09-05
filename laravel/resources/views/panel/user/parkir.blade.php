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
<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel2">Map</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="search-form mg-b-5">
                        <input id="inputAlamat" type="search" class="form-control" placeholder="Cari alamat">
                        <button class="btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>
                    </div>
                    <div id="map_canvas" style="height: 500px;"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary tx-13">Pilih</button>
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
                                <option value=""></option>
                                @if($dataProfil->jenis_kendaraan == "Mobil")
                                    <option selected value="Mobil">Mobil</option>
                                    <option value="Motor">Motor</option>
                                @elseif($dataProfil->jenis_kendaraan == "Motor")
                                    <option value="Mobil">Mobil</option>
                                    <option selected value="Motor">Motor</option>
                                @else
                                    <option value="Mobil">Mobil</option>
                                    <option value="Motor">Motor</option>


                                @endif
                            </select>
                        </div><!-- col -->
                        <div class="col-sm-5">
                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Plat Nomor
                            </label>
                            <input value="{{ $dataProfil->plat_nomor }}" id="plat_nomor" type="text"
                                   class="form-control">
                        </div><!-- col -->
                    </div>
                    <div class="form-group mg-b-5">

                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Koordinat
                            Anda</label>
                        <div class="input-group">
                            <input readonly id="koordinat_pemesan" type="text"
                                   class="form-control">
                            <div class="input-group-append">
                                <button value="btnMap" onclick="mapModal()" class="btn btn-info" type="button"
                                        id="button-addon2"><i class="fa fa-map"></i> Map
                                </button>
                            </div>
                        </div>
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
                        silahkan cek sms pesan masuk untuk proses selesai
                        {{--                        Setelah mengklik <strong>Pesan Sekarang</strong> silahkan cek sms pesan masuk untuk proses selesai--}}
                    </div><!-- form-group -->
                    <button id="btnPesan" value="btn" onclick="promptPesan()" class="btn btn-brand-02 btn-block">Pesan
                        Sekarang
                    </button>
                </div>
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
</div><!-- content -->


@include('panel.footerPanel')
@include('panel.scriptPanel')
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAa0UwQAFnGd9eGwP2UDY4mWWVXXMrTb0Q"></script>
<script>
    var infowindow = new google.maps.InfoWindow();
    var markers = [];
    $(document).ready(function () {
        $('#inputAlamat').on('change', function () {
            $('#koordinat_pemesan').val($(this).val());
            var val = $(this).val();

            $.ajax({
                type: "get",
                url: "{{ route('getInfoOfOrigins') }}",
                async: false,
                dataType: 'json',
                data: {'origins': val},

                success: function (data) {
                    var json = $.parseJSON(JSON.stringify(data));
                    if (typeof (json) != "undefined" && json !== null) {
                        var geometry = json.results[0].geometry.location;
                        var lat = geometry.lat;
                        var lng = geometry.lng;
                        $('#inputAlamat').val(lat + ", " + lng);
                        createMarker(lat + ", " + lng);
                    } else {
                        //gagal
                    }
                }
            }).done(function () {
                console.log("Done Maps");
            });
        });
    });

    function mapModal() {
        $('#mapModal').modal('show')
    }

    function init_map() {
        var setting = {
            zoom: 16,
            center: new google.maps.LatLng(43.270441, 6.640888),
            mapTypeControl: true,
            draggable: true,
            panControl: false,
            scaleControl: false,
            streetViewControl: false,
            navigationControl: false,
            disableDoubleClickZoom: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [
                {
                    "featureType": "landscape.natural.landcover",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                }
            ]
        };
        map = new google.maps.Map(document.getElementById('map_canvas'), setting);
        createMarker("0, 0");
        google.maps.event.addListener(map, 'click', function (event) {

            console.log(event.latLng.lat());
            console.log(event.latLng.lng());
        });

        // Update lat/long value of div when you move the mouse over the map

        // Create new marker on double click event on the map
        google.maps.event.addListener(map, 'dblclick', function (event) {
            $('#koordinat_pemesan').val(event.latLng.lat() + ', ' + event.latLng.lng());
            $('#inputAlamat').val(event.latLng.lat() + ', ' + event.latLng.lng());
            createMarkerClick(event.latLng.lat() + ', ' + event.latLng.lng());
        });
    }

    function createMarker(coordsStr) {
        coords = coordsStr.split(", ");
        map.setCenter(new google.maps.LatLng(coords[0], coords[1]));
        var point = new google.maps.LatLng(coords[0], coords[1]);
        var marker = new google.maps.Marker({
            map: map,
            position: point
        });
        DeleteMarkers();
        var content = '<strong>Alamat Rumah</strong><br>';
        google.maps.event.addListener(marker, 'click', function () {
            infowindow.setContent(content);
            infowindow.open(map, marker);
        });
        markers.push(marker);
    }

    function createMarkerClick(coordsStr) {
        coords = coordsStr.split(", ");
        var point = new google.maps.LatLng(coords[0], coords[1]);
        var marker = new google.maps.Marker({
            map: map,
            position: point
        });
        DeleteMarkers();
        var content = '<strong>Alamat Anda</strong><br>';
        google.maps.event.addListener(marker, 'click', function () {
            infowindow.setContent(content);
            infowindow.open(map, marker);
        });
        markers.push(marker);
    }

    function DeleteMarkers() {
        //Loop through all the markers and remove
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
    }

    $(document).ready(function () {
        google.maps.event.addDomListener(window, 'load', init_map());
    });

    var hargaParkir =
        {
            @foreach($tempat_parkir_list[0] as $t)
            '{{ $t->id }}': {
                'Nama': '{{ $t->nama_tempat }}',
                'Mobil': '{{ $t->harga_mobil }}',
                'Motor': '{{ $t->harga_motor }}'
            },
            @endforeach
        };
    var koordinatParkir =
        {
            @foreach($tempat_parkir_list[0] as $t)
            '{{ $t->id }}': '{{ $t->koordinat }}',
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

            success: function (data, textStatus, xhr) {
                console.log(xhr.status);
                var json = $.parseJSON(JSON.stringify(data));

                if (json['status'] !== "false") {
                    window.location.replace("{{ route('parkirInvoicePage') }}/" + json.invoiceId)
                } else {
                    Swal.fire({title: 'Gagal', text: 'Reason : ' + json['reason'], type: 'error'})
                }
            }
        }).done(function () {
            console.log("Done Maps");
            $('#pesanModal').modal('hide');
        });
    }


    function cekInput() {
        var lenght = $("#formPesanParkir :input").length;
        var a = 1;
        $("#formPesanParkir :input").each(function () {
            console.log($(this));
            console.log($(this).val());
            a++;
            if ($('#btnPesan').attr('func') !== true && a === lenght) {
                promptPesanS();
                $('#btnPesan').attr('func', false);
                return false;
            }
            if ($(this).val() === '') {
                $(this).focus();
                alert('Harap isi semua input');
                $('#btnPesan').attr('func', true);
                return false;
            }
        });
    }

    function promptPesan() {
        cekInput();
    }


    function promptPesanS() {
        $.ajax({
            type: "get",
            url: "{{ route('getJarakParkir') }}",
            data: {koordinat_jemput: koordinatParkir[$('#tempat_parkir').val()], koordinat_antar: $('#koordinat_pemesan').val()},

            success: function (data) {
                if(data > 10)
                {
                    Swal.fire(
                        'Maaf',
                        'Jarak anda diatas 10KM dari lokasi Parkir.',
                        'error'
                    );
                }else{
                    $('#placeholderPesan').show();
                    $('#detailPesan').hide();
                    var id_tempat_parkir = $('#tempat_parkir').val();
                    var jenis_kendaraan = $('#jenis_kendaraan').val();
                    var plat_nomor = $('#plat_nomor').val();
                    var harga = hargaParkir[id_tempat_parkir][jenis_kendaraan];
                    $('#tempatParkir').text(hargaParkir[id_tempat_parkir]['Nama']);
                    $('#jenisKendaraan').text(jenis_kendaraan);
                    $('#harga').text(harga);
                    $('#platNomor').text(plat_nomor);
                    $('#pesanModal').modal('show');
                    $('#placeholderPesan').hide();
                    $('#detailPesan').show();
                }
            }
        });
    }

    @if($tempat_parkir_list['jumlah_kapasitas_all'] > 0)
    function formPesan() {
        $('#formPesanParkir').show();
        $('html, body').animate({
            scrollTop: $("#formPesanParkir").offset().top
        }, 2000);
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
                    scrollTop: $("#formPesanParkir").offset().top
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
        createMarker(latitude + ', ' + longitude);
        $('#koordinat_pemesan').val(latitude + ', ' + longitude);
        $('#inputAlamat').val(latitude + ', ' + longitude);
    }

    @else

    function formPesan() {

        Swal.fire({title: 'Penuh', text: 'Tempat parkir penuh!', type: 'error'})

    }
    @endif


</script>
