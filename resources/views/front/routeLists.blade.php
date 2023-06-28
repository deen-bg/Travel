<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ททท. รายชื่อเส้นทางท่องเที่ยวแนะนำ</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,700;1,100;1,700&display=swap" rel="stylesheet">

        {{-- cdn bootstrap v.5 --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Prompt', sans-serif;
            }
            
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light fixed-top">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">LOGO</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
            </div>
          </nav>
        <div class="container pt-5">
            <div class="row py-5">
                <div class="col d-flex justify-content-center">
                    <h1 class="text-dark text-center">{{ $response['result']['route_name']}}</h1>
                </div>
            </div>
            {{-- loop --}}
            <div class="row">
                @foreach ($places as $place)
                    <div class="col-12">
                        {{-- card --}}
                        <div class="card mb-3">
                            <div class="row g-0">
                              <div class="col-md-4">
                                <img src="{{ $place['thumbnail_url'] }}" class="img-fluid rounded-start" alt="{{ $place['place_name'] }}" width="500" height="500">
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $place['place_name'] }}</h5>
                                  <span class="badge text-bg-primary"><small class="text-white">{{ $place['category_description'] }}</small></span>
                                  <br>
                                  <span class="badge text-bg-light"><small class="text-dark">Lat: {{ $place['latitude'] }}, Long: {{ $place['longitude'] }}</small></span>
                                  <p class="card-text">{{ $place['place_introduction'] }}</p>
                                  <a href="{{ url('attraction/'.$place['place_id']) }}" class="btn btn-primary">View more...</a>
                                </div>
                              </div>
                            </div>
                        </div>
                        {{-- end .card --}}
                    </div>
                @endforeach
            </div>
            
            {{-- end --}}
            
        </div>
    
    </body>
</html>
