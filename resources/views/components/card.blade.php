<a href="{{ route('public.detailDokumen', $item->id) }}" class="box-link">

    <div class="judul-box">
      <h5>{{ $item->kategori->singkatan }} No. {{ $item->nomor }} Tahun 2022</h5>
    </div>

    <div class="container-box">

      <div class="isi-box">
        <p>{{ $item->kategori->singkatan }} Tentang {{ $item->judul }}</p>
      </div>

    </div>
</a>


{{-- <div class="box-dokumen">
  <div class="judul-box">
    <h5>{{ $item->kategori->singkatan }} No. {{ $item->nomor }} Tahun 2022</h5>
  </div>
  <div class="container-box">
    <div class="isi-box">
      <p>{{ $item->kategori->singkatan }} Tentang {{ $item->judul }}</p>
    </div>
  </div>
</div> --}}
