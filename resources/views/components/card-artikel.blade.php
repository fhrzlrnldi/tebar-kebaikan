<div class="col-xl-4 col-md-6">
    <article>
        <div class="post-img">
            <a href="{{ route('artikel.user.show',['id'=>$attributes['id']]) }}" style="width:100%;height: 300px">
                <img src="assets/artikel/{{ $attributes['cover'] }}" alt="{{ $attributes['judul'] }}" class="img-fluid" style="width: 100%;height: 100%;object-fit: cover">
            </a>
        </div>
        <div class="d-flex " style="column-gap: 10px">
            <div class="d-flex align-items-center" style="column-gap: 10px"><i
                    class="bi bi-person"></i> {{ $attributes['author'] }}</div>
            <div class="d-flex align-items-center" style="column-gap: 10px"><i
                    class="bi bi-clock"></i> <time>{{ $attributes['time'] }}</time></div>
        </div>
        <h2 class="title mt-3 mb-0">
            <a href="{{ route('artikel.user.show',['id'=>$attributes['id']]) }}">{{ $attributes['judul'] }}</a>
        </h2>
    </article>
</div>