@extends('template.public')


<div class="hero d-flex align-items-center" style="width:100%; height: 100vh;">
  <div class="container">
    <h1>{{ $document->judul }}</h1>
    <div class="row">
      <div class="card">
        <div class="card-body">
          <table class="table">
            <tbody>
              <tr>
                <td>Judul</td>
                <td>{{ $document->judul }}</td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td>{{ $document->kategori->jenis }}</td>
              </tr>
              <tr>
                <td>Nomor</td>
                <td>{{ $document->nomor }}</td>
              </tr>
              <tr>
                <td>Tanggal Pengesahan</td>
                <td>{{ showDate($document->tanggal_pengesahan, 'j F Y') }}</td>
              </tr>
              <tr>
                <td>file</td>
                <td>{{ $document->dokumen !== null ? 'file tersedia' : 'file tidak tersedia' }}</td>
              </tr>
              <tr>
                <td>Status</td>
                <td>{{ $status }}</td>
              </tr>
              <tr>
                <td>Dokumen Pengganti</td>
                  @if (count($dokumenPengganti) === 0 and count($dokYangDiganti) === 0)
                    <td>Tidak ada dokumen pengganti</td>
                  @else
                      <td>
                        @foreach ([$dokumenPengganti] as $no)
                            @foreach ($no as $dokumen)
                            <div class="card">
                              <div class="card-header">
                                Status : {{ $dokumen->pivot->statusPergantian->nama_pergantian_pasif }}
                              </div>
                              <div class="card-body">
                                {{ $dokumen->judul }}
                              </div>
                            </div>
                            @endforeach
                        @endforeach
                        @foreach ([$dokYangDiganti] as $no)
                            @foreach ($no as $dokumen)
                            <div class="card">
                              <div class="card-header">
                                Status : {{ $dokumen->pivot->statusPergantian->nama_pergantian }}
                              </div>
                              <div class="card-body">
                                {{ $dokumen->judul }}
                              </div>
                            </div>
                            @endforeach
                        @endforeach
                      </td>
                  @endif
              </tr>
              <tr>
                <td>Dokumen Terkait</td>
                @if (count($dokumenTerkait) === 0 and count($dikaitkanDengan) === 0)
                  <td>Tidak ada berkas terkait</td>
                @else
                    <td>
                      @foreach ([$dokumenTerkait, $dikaitkanDengan] as $item)
                          @foreach ($item as $dokumen)
                            <li>
                              <a href="{{ route('admin.detailDokumen', ['id' => $dokumen->id]) }}">{{ $dokumen->judul }}</a>
                            </li>
                            <br>
                          @endforeach
                      @endforeach
                    </td>
                @endif
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  
    </div>
  </div>
</div>
<div class="hero d-flex align-items-center" style="width:100%; height: 100vh;">
  <div class="container">
    <div class="card">
      @if ($document->dokumen === null)
        <h1>file tidak ada</h1>
    @else
      <iframe src="{{ asset('storage/'. $document->dokumen) }}" width="100%" height="1000"></iframe>
    @endif
    </div>
  </div>
</div>

  

