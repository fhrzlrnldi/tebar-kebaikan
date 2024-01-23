<div class="d-flex " style="gap: 10px ">
    <a href="/blog/{{ $id }}"  class="btn btn-info">
        <i class="fas fa-eye "></i>
    </a>
    <a href="/artikel/{{ $id }}/edit" class="btn btn-success bg-green2">
        <i class="fas fa-pen"></i>
    </a>
    <button onclick="hapusartikel('{{ $id }}')" class="btn btn-danger">
        <i class="fas  fa-trash "></i>
    </button>
</div>