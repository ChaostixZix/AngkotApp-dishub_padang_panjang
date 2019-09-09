@foreach($dataJurusan as $d)
    <h5 class="tx-color-03 mg-b-0">{{ $d->awal_jurusan }}
        -> {{ $d->tujuan_jurusan }}</h5>
    <div id="inputListRute" class="mg-b-5">
        <div class="form-group">
            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 tx-color-03">Rute</label>
            <input disabled value="{{ json_decode($d->rute)[0]}}" id="rute[]" type="text"
                   class="form-control"
                   placeholder="Rute">
        </div><!-- col -->
        @if($d->rute !== null)
            @foreach(json_decode($d->rute) as $key => $r)
                @if($key !== 0)
                    <div class="form-group">
                        <div class="input-group">
                            <input disabled value="{{ $r }}" id="rute[]" type="text"
                                   class="form-control">
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@endforeach
