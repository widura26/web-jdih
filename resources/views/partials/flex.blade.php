<div class="isi">
  <div class="isi-semuaDokumen-dokumenTerbaru">
    
    <div class="button-semuaDokumen">
      <button onclick="window.location.href ='{{ route('public.semuaDokumen') }}'">
        Semua Dokumen
      </button>
    </div>

    <div class="semua">

      <div class="semuaDokumen">
        <div class="baris">
          @foreach ($dokumen as $item)
            @include('components.card')
            
          @endforeach
        </div>
      </div>

      <div class="dokumenTerbaru-jumlahDokumen">

        <div class="dokumenTerbaru">
          {{-- margin --}}
          <div class="dokumen-terbaru">
            {{-- padding --}}
            <div class="judul-dokumen-terbaru">
              <h4>Dokumen Peraturan Terbaru</h4>
            </div>
            <div class="daftar-dokumen-terbaru">
              @if($dokumen->count())
              <div class="dokumen-1">
                <h5>{{ $dokumen[0]->judul }}</h5>
                <p>Tentang {{ $dokumen[0]->kategori->singkatan }} Tahun 2022</p>
              </div>
              @endif
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>