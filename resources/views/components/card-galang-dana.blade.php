<div class="card" style="">
    <div class="card img bg-image hover-overlay ripple"  data-mdb-ripple-color="light">
        <a href="/donasi/{{ $attributes['slug'] }}" style="width:100%;height: 300px">
        <img src="assets/galangdana/{{ $attributes['path_image'] }}" style="width: 100%;height: 100%;object-fit: cover" class="img-fluid" />
        </a>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $attributes['judul'] }}</h5>
        <p>Kategori: {{ $attributes['kategoris'] }}</p>
        <p class="h6"> <strong> Donasi Dibutuhkan : </strong> </p> 
        <div class="kiri">Rp {{ number_format($attributes['goal'], 0, ',', '.') }}</div>
        <br>
        <div class="progress" role="progressbar" aria-label="Success example"
            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            @php
            if ($attributes['nominal']==0) {
              # code...
              $persentase=0;
            }else{
            $persentase = ($attributes['nominal'] / $attributes['goal']) * 100;
            }
            @endphp
            <div class="progress-bar bg-success" style="width: {{ $persentase }}%"></div>
        </div>
        <hr>
        <p>Donasi Diterima :</p>
        <div class="tulisan">
            <div class="kiri">Rp{{number_format($attributes['nominal'], 0, ',', '.') }}</div>
            @php
                $date1 = new DateTime($attributes['end_date']);
                $date2 = new DateTime(date('Y-m-d'));
                $diff = $date1->diff($date2);
            @endphp
            <div class="kanan">
                {{ $diff->format('%a') > 0 ? $diff->format('%a') : '-' }} hari lagi
            </div>
        </div>
        <br>
        <a href="/donasi/{{ $attributes['slug'] }}" class="btn btn-success">Selanjutnya</a>
    </div>
</div>