@foreach($detail as $d)
    Nama Lengkap : <span id="nama_lengkap">{{ $d->nama_lengkap }}</span><br>
    Alamat : <span id="alamat">{{ $d->alamat }}</span><br>
    Tempat Lahir : <span id="tempat_lahir">{{ $d->tempat_lahir }}</span><br>
    Tinggi Badan : <span id="tinggi_badan">{{ $d->tinggi_badan }}</span><br>
    Golongan Darah : <span id="gol_darah">{{ $d->gol_darah }}</span><br>
    Pekerjaan : <span id="jenis_pekerjaan">{{ $d->jenis_pekerjaan }}</span><br>
    No Sim : <span id="no_sim">{{ $d->no_sim }}</span><br>
    Berlaku Sampai : <span id="berlaku_sim">{{ $d->berlaku_sim }}</span><br>
    Facebook  : <span id="facebook">{{ $d->facebook }}</span><br>
    Twitter : <span id="twitter">{{ $d->twitter }}</span><br>
    Email : <span id="email">{{ $d->email }}</span><br>
@endforeach
