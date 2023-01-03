<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('assets/css/public3.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/card.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>{{ $title }}</title>
</head>
<body>
  @include('partials.navpublic')
  <div class="container-pertama">

    <div class="bagian-search">
      <div class="search">
        <form action="{{ route('public.semuaDokumen') }}" method="GET">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari dokumen" name="search">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
      
    </div>

    <div class="bagian-dokumen">
      <div class="container-dokumen">
        @foreach ($dokumen as $item)
          @include('components.card')
        @endforeach
      </div>
    </div>

  </div>
  <x-footer></x-footer>
</body>
</html>