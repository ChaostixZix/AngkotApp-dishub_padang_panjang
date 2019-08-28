@foreach($detail as $d)
    <ul class="list-unstyled lh-7">
        <li class="d-flex justify-content-between">
            <span>Invoice Number</span>
            <span id="id">{{ $d->id }}</span>
        </li>
        <li class="d-flex justify-content-between">
            <span>Plat Nomor</span>
            <span class="tx-bolder" id="plat_nomor">{{ $d->plat_nomor }}</span>
        </li>
        <li class="d-flex justify-content-between">
            <span>Jenis Pesan</span>
            <span>Parkir</span>
        </li>
        <li class="d-flex justify-content-between">
            <span>Tanggal</span>
            <span id="tanggal">{{ $d->tanggal }}</span>
        </li>
        <li class="d-flex justify-content-between">
            <span>Harga</span>
            <span id="harga">{{ "Rp " . number_format($d->harga,2,',','.') }}</span>
        </li>
        <li class="d-flex justify-content-between">
            <span>Status</span>
            @if($d->status == 0)
                <button id="status" class="tx-12 tx-bolder btn btn-outline-secondary tx-success mg-b-0">New</button>
            @elseif($d->status == 1)
                <button id="status" class="tx-12 tx-bolder btn btn-outline-secondary tx-purple mg-b-0">Done</button>
            @endif
        </li>
    </ul>

@endforeach
