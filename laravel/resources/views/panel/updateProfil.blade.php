@include('panel.headerPanel')

@include('panel.navbarPanel')
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.css">
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.profile.css">
<div class="content content-fixed content-profile">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="media d-block d-lg-flex">
            <div class="profile-sidebar pd-lg-r-25">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-lg">
                        <div class="avatar avatar-xxl"><img src="https://via.placeholder.com/500"
                                                            class="rounded-circle" alt=""></div>
                    </div><!-- col -->
                    <div class="col-sm-8 col-md-7 col-lg mg-t-20 mg-sm-t-0 mg-lg-t-25">
                        <h5 class="mg-b-2 tx-spacing--1">
                            @if($statusProfil == true)
                                {{ $dataProfil[0]->nama_lengkap }}
                            @endif</h5>
                        <p class="tx-color-03 mg-b-25">@ {{ strtoupper(Session::get('username')) }}</p>

                        <p class="tx-13 tx-color-02 mg-b-25">Redhead, Innovator, Saviour of Mankind, Hopeless Romantic,
                            Attractive 20-something Yogurt Enthusiast... <a href="">Read more</a></p>

                        <div class="d-flex">
                            <div class="profile-skillset flex-fill">
                                <h4><a href="" class="link-01">1.4k</a></h4>
                                <label>Stars</label>
                            </div>
                            <div class="profile-skillset flex-fill">
                                <h4><a href="" class="link-01">2.8k</a></h4>
                                <label>Followers</label>
                            </div>
                            <div class="profile-skillset flex-fill">
                                <h4><a href="" class="link-01">437</a></h4>
                                <label>Following</label>
                            </div>
                        </div>
                    </div><!-- col -->

                </div><!-- row -->

            </div><!-- profile-sidebar -->
            <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10">
                @if($statusProfil == true)
                    @foreach($dataProfil as $d)
                        <div class="card mg-b-20 mg-lg-b-25">
                            <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                                <h6 class="tx-uppercase tx-semibold mg-b-0">Update Profil</h6>
                            </div><!-- card-header -->
                            <div class="card-body pd-20 pd-lg-25">
                                <div id="loadingLogo" class="text-center" style="display:none;">
                                    <div class="spinner-border text-info" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div id="formProfil">
                                    <fieldset class="form-fieldset mg-b-20">
                                        <legend class="tx-center">Informasi Dasar</legend>

                                        <div class="form-group">
                                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nama
                                                Lengkap <font class="tx-danger">*</font> </label>
                                            <input value="{{ $d->nama_lengkap }}" id="inputNamaLengkap" type="text"
                                                   class="form-control"
                                                   placeholder="Nama Lengkap">
                                        </div><!-- col -->
                                        <div class="form-group">
                                            <label
                                                class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">NIK</label>
                                            <input value="{{ $d->nik }}" id="inputNik" type="number"
                                                   class="form-control"
                                                   placeholder="Nomor Induk Keluarga">
                                        </div><!-- col -->
                                        <div class="form-group">
                                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Jenis
                                                Kelamin</label>
                                            <select id="inputJenisKelamin" type="text" class="form-control">
                                                <option value=""></option>
                                                @if($d->jenis_kelamin == "L")
                                                    <option selected value="L">Laki Laki</option>
                                                    <option value="P">Perempuan</option>
                                                @elseif($d->jenis_kelamin == "P")
                                                    <option value="L">Laki Laki</option>
                                                    <option selected value="P">Perempuan</option>
                                                @else
                                                    <option value="L">Laki Laki</option>
                                                    <option value="P">Perempuan</option>
                                                @endif
                                            </select>
                                        </div><!-- col -->
                                        <div class="form-group">
                                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Tempat
                                                Lahir</label>
                                            <input value="{{ $d->tempat_lahir }}" id="inputTempatLahir" type="text"
                                                   class="form-control"
                                                   placeholder="Tempat Lahir">
                                        </div>
                                        <div class="form-group">
                                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Agama</label>
                                            <input value="{{ $d->agama }}" id="inputAgama" type="text"
                                                   class="form-control"
                                                   placeholder="Agama">
                                        </div>
                                        <div class="form-group">
                                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Pendidikan</label>
                                            <input value="{{ $d->pendidikan }}" id="inputPendidikan" type="text"
                                                   class="form-control"
                                                   placeholder="Pendidikan">
                                        </div>
                                        <div class="form-group">
                                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Jenis
                                                Pekerjaan</label>
                                            <input value="{{ $d->jenis_pekerjaan }}" id="inputJenisPekerjaan"
                                                   type="text"
                                                   class="form-control"
                                                   placeholder="Jenis Pekerjaan">
                                        </div>
                                        <div class="form-group ">
                                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Kewarganegaraan</label>
                                            <select id="inputKewarganegaraan" type="text" class="form-control">
                                                @if($d->jenis_kelamin == "WNI")
                                                    <option selected value="WNI">WNI</option>
                                                    <option value="WNA">WNA</option>
                                                @elseif($d->jenis_kelamin == "WNA")
                                                    <option value="WNI">WNI</option>
                                                    <option selected value="WNA">WNA</option>
                                                @else
                                                    <option value="WNI">WNI</option>
                                                    <option value="WNA">WNA</option>
                                                @endif
                                            </select>
                                        </div>
                                    </fieldset>
                                    @if(Session::get('level') == 'supir')
                                        <fieldset class="form-fieldset mg-b-20">
                                            <legend>Informasi Supir</legend>
                                            <div class="row row-sm mg-b-20">
                                                <div class="col-sm-12 mg-b-20">
                                                    <label
                                                        class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Tinggi
                                                        Badan <font class="tx-danger">*</font></label>
                                                    <input value="{{ $d->tinggi_badan }}" id="inputTinggiBadan"
                                                           type="number"
                                                           class="form-control"
                                                           placeholder="Tinggi Badan">
                                                </div><!-- col -->
                                                <div class="col-sm-12">
                                                    <label
                                                        class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Golongan
                                                        <font class="tx-danger">*</font></label>
                                                    <input value="{{ $d->gol_darah }}" id="inputGolonganDarah"
                                                           type="email"
                                                           class="form-control"
                                                           placeholder="Golongan Darah">
                                                </div><!-- col -->
                                            </div>
                                            <div class="row row-sm mg-b-20">
                                                <div class="col-sm-6 mg-b-20">
                                                    <label
                                                        class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">No
                                                        Sim <font class="tx-danger">*</font></label>
                                                    <input value="{{ $d->no_sim }}" id="inputNoSim" type="text"

                                                           class="form-control"
                                                           placeholder="No Sim">
                                                </div><!-- col -->
                                                <div class="col-sm-6">
                                                    <label
                                                        class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Berlaku
                                                        Sampai <font class="tx-danger">*</font></label>
                                                    <input value="{{ $d->berlaku_sim }}" id="inputBerlakuSim"
                                                           type="email"
                                                           class="form-control"
                                                           placeholder="Berlaku Sampai">
                                                </div><!-- col -->
                                            </div>
                                        </fieldset>
                                    @endif
                                    <fieldset class="form-fieldset mg-b-20">
                                        <legend class="tx-center">Informasi Keluarga</legend>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Status
                                                    Perkawinan</label>
                                                <input value="{{ $d->status_perkawinan }}" id="inputStatusPerkawinan"
                                                       type="text"
                                                       class="form-control"
                                                       placeholder="Status Perkawinan">
                                            </div><!-- col -->
                                            <div class="col-sm-6">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Status
                                                    Hubungan Dalam Keluarga</label>
                                                <input value="{{ $d->status_hubungan_dalam_keluarga }}"
                                                       id="inputStatusHubunganDalamKeluarga"
                                                       type="text"
                                                       class="form-control"
                                                       placeholder="Status Hubungan Dalam Keluarga">
                                            </div><!-- col -->
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-fieldset mg-b-20">
                                        <legend>Informasi Imigrasi</legend>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">No
                                                    Passport</label>
                                                <input value="{{ $d->no_passport }}" id="inputNoPassport" type="number"
                                                       class="form-control"
                                                       placeholder="No Passport">
                                            </div><!-- col -->
                                            <div class="col-sm-6">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">No
                                                    KTA</label>
                                                <input value="{{ $d->no_kta }}" id="inputNoKta" type="number"
                                                       class="form-control"
                                                       placeholder="No KTA">
                                            </div><!-- col -->
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-fieldset mg-b-20">
                                        <legend class="tx-center">Orang Tua</legend>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nama
                                                    Ayah</label>
                                                <input value="{{ $d->nama_ayah }}" id="inputNamaAyah" type="text"
                                                       class="form-control"
                                                       placeholder="Nama Ayah">
                                            </div><!-- col -->
                                            <div class="col-sm-6">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nama
                                                    Ibu</label>
                                                <input value="{{ $d->nama_ibu }}" id="inputNamaIbu" type="text"
                                                       class="form-control"
                                                       placeholder="Nama Ibu">
                                            </div><!-- col -->
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-fieldset mg-b-20">
                                        <legend class="tx-center">Data Alamat</legend>
                                        <div class="row row-sm mg-b-20">
                                            <div class="col-sm-8">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Alamat
                                                    Lengkap</label>
                                                <input value="{{ $d->alamat }}" id="inputAlamatLengkap" type="text"
                                                       class="form-control"
                                                       placeholder="Alamat Lengkap">
                                            </div><!-- col -->
                                            <div class="col-sm-2">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Kode
                                                    Pos</label>
                                                <input value="{{ $d->kode_pos }}" id="inputKodePos" type="text"
                                                       class="form-control"
                                                       placeholder="Kode Pos">
                                            </div><!-- col -->
                                            <div class="col-sm-2">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">RT/RW</label>
                                                <input value="{{ $d->rt_rw }}" id="inputRtRw" type="text"
                                                       class="form-control"
                                                       placeholder="RT/RW">
                                            </div><!-- col -->
                                        </div>
                                        <div class="row row-sm mg-b-20">
                                            <div class="col-sm-4">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Desa/Kelurahan</label>
                                                <input value="{{ $d->desa_kelurahan }}" id="inputDesaKelurahan"
                                                       type="text"
                                                       class="form-control"
                                                       placeholder="Desa/Kelurahan">
                                            </div><!-- col -->
                                            <div class="col-sm-4">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Kecamatan</label>
                                                <input value="{{ $d->kecamatan }}" id="inputKecamatan" type="text"
                                                       class="form-control"
                                                       placeholder="Kecamatan">
                                            </div><!-- col -->
                                            <div class="col-sm-4">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Kabupaten/Kota</label>
                                                <input value="{{ $d->kabupaten_kota }}" id="inputKabupatenKota"
                                                       type="text"
                                                       class="form-control"
                                                       placeholder="Kabupaten/Kota">
                                            </div><!-- col -->
                                        </div>
                                        <div class="row row-sm mg-b-20">
                                            <div class="col-sm-12">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Provinsi</label>
                                                <input value="{{ $d->provinsi }}" id="inputProvinsi" type="text"
                                                       class="form-control"
                                                       placeholder="Provinsi">
                                            </div><!-- col -->
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-fieldset mg-b-20">
                                        <legend>Kontak & Sosial Media</legend>
                                        <div class="row row-sm mg-b-20">
                                            <div class="col-sm-6">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">No
                                                    HP <font class="tx-danger">*</font></label>
                                                <input value="{{ $d->no_hp }}" id="inputNoHp" type="number"
                                                       class="form-control"
                                                       placeholder="No Hp">
                                            </div><!-- col -->
                                            <div class="col-sm-6">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Email</label>
                                                <input value="{{ $d->email }}" id="inputEmail" type="email"
                                                       class="form-control"
                                                       placeholder="Email">
                                            </div><!-- col -->
                                        </div>
                                        <div class="row row-sm mg-b-20">
                                            <div class="col-sm-12 mg-b-20">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Facebook</label>
                                                <input value="{{ $d->facebook }}" id="inputFacebook" type="text"
                                                       class="form-control"
                                                       placeholder="Facebook">
                                            </div><!-- col -->
                                            <div class="col-sm-12">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Twitter</label>
                                                <input value="{{ $d->twitter }}" id="inputTwitter" type="email"
                                                       class="form-control"
                                                       placeholder="Twitter">
                                            </div><!-- col -->
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-fieldset">
                                        <legend>Informasi Tambahan</legend>
                                        <div class="row row-sm mg-b-5">
                                            <div class="col-sm">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Jenis
                                                    Kendaraan <font class="tx-danger">*</font></label>
                                                <select id="jenis_kendaraan" class="custom-select">
                                                    <option value="">Pilih</option>
                                                    <option value=""></option>
                                                    @if($d->jenis_kendaraan == "Mobil")
                                                        <option selected value="Mobil">Mobil</option>
                                                        <option value="Motor">Motor</option>
                                                    @elseif($d->jenis_kendaraan == "Motor")
                                                        <option value="Mobil">Mobil</option>
                                                        <option selected value="Motor">Motor</option>
                                                    @else
                                                        <option value="Mobil">Mobil</option>
                                                        <option value="Motor">Motor</option>
                                                    @endif
                                                </select>
                                            </div><!-- col -->
                                            <div class="col-sm-5">
                                                <label
                                                    class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Plat
                                                    Nomor <font class="tx-danger">*</font>
                                                </label>
                                                <input value="{{ $d->plat_nomor }}" id="plat_nomor" type="text"
                                                       class="form-control">
                                            </div><!-- col -->
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent pd-y-10 pd-sm-y-15 pd-x-10 pd-sm-x-20">
                                <nav class="nav nav-with-icon tx-13">
                                    <a onclick="updateProfile()" href="#" class="nav-link">
                                        <i class="fa fa-folder mg-r-5"></i>
                                        Save</a>
                                </nav>
                            </div><!-- card-footer -->
                        </div><!-- card -->

                    @endforeach
                @else
                    <div class="card mg-b-20 mg-lg-b-25">
                        <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                            <h6 class="tx-uppercase tx-semibold mg-b-0">Buat Profil</h6>
                        </div>
                        <div class="card-body pd-20 pd-lg-25 tx-center">
                            <div class="alert alert-primary" role="alert">Silahkan menyelesaikan profil terlebih dahulu
                                sebelum menggunakan fitur lain
                            </div>
                            <button id="btnBuat" class="btn btn-outline-primary" onclick="buatProfil()">Buat</button>
                            <div id="loadingLogo" class="text-center" style="display:none;">
                                <div class="spinner-border text-info" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent pd-y-10 pd-sm-y-15 pd-x-10 pd-sm-x-20"></div>
                    </div>
                @endif
            </div><!-- media-body -->
        </div><!-- media -->
    </div><!-- container -->
</div>

@include('panel.scriptPanel')
<script>
    function buatProfil() {
        $('#btnBuat').hide();
        $('#loadingLogo').show();
        $.ajax({
            url: '{{ route('profilBuat') }}',
            type: 'get',
            processData: false,
            contentType: false,
            success: function (data) {
                if (data === 'true') {
                    setTimeout(function () {
                        window.location.reload(1);
                    }, 5000);
                } else {
                    $('#btnBuat').show();
                    $('#loadingLogo').hide();
                }
            }
        });
    }

    function updateProfile() {
        $('#formProfil').hide();
        $('#loadingLogo').show();
        var formData = new FormData();
        var data = {
            'inputNik': 'inputNik',
            'inputNamaLengkap': 'inputNamaLengkap',
            'inputJenisKelamin': 'inputJenisKelamin',
            'inputTempatLahir': 'inputTempatLahir',
            'inputAgama': 'inputAgama',
            'inputPendidikan': 'inputPendidikan',
            'inputJenisPekerjaan': 'inputJenisPekerjaan',
            'inputStatusPerkawinan': 'inputStatusPerkawinan',
            'inputStatusHubunganDalamKeluarga': 'inputStatusHubunganDalamKeluarga',
            'inputKewarganegaraan': 'inputKewarganegaraan',

            'inputNoPassport': 'inputNoPassport',
            'inputNoKta': 'inputNoKta',

            'inputNamaAyah': 'inputNamaAyah',
            'inputNamaIbu': 'inputNamaIbu',

            'inputAlamatLengkap': 'inputAlamatLengkap',
            'inputRtRw': 'inputRtRw',
            'inputDesaKelurahan': 'inputDesaKelurahan',
            'inputKecamatan': 'inputKecamatan',
            'inputKabupatenKota': 'inputKabupatenKota',
            'inputProvinsi': 'inputProvinsi',

            'inputNoHp': 'inputNoHp',
            'inputEmail': 'inputEmail',

            'inputFacebook': 'inputFacebook',
            'inputTwitter': 'inputTwitter',

            'jenis_kendaraan': 'jenis_kendaraan',
            'plat_nomor': 'plat_nomor'
        };
            @if(Session::get('level') == 'supir')
        var dataProfil = {
                'inputTinggiBadan': 'inputTinggiBadan',
                'inputGolonganDarah': 'inputGolonganDarah',
                'inputNoSim': 'inputNoSim',
                'inputBerlakuSim': 'inputBerlakuSim'
            };
        Object.keys(dataProfil).forEach(function (value, index) {
            formData.append(value, $('#' + value).val());
        });
            @endif
        formData.append('_token', '{{ csrf_token() }}');
        Object.keys(data).forEach(function (value, index) {
            formData.append(value, $('#' + value).val());
        });
        $.ajax({
            url: '{{ route('profilUpdate') }}',
            type: 'post',
            processData: false,
            contentType: false,
            data: formData,
            success: function (data) {
                window.location.reload();
            }
        });
    }
</script>
@include('panel.footerPanel')
