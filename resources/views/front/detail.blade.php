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
              <a class="navbar-brand" href="{{ url('listRouteRecommend') }}">LOGO</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
            </div>
          </nav>
        <div class="container pt-5">
            <div class="row py-5">
                <div class="col d-flex justify-content-center">
                    <h1 class="text-dark text-center">{{ $result['place_name']}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {{-- card --}}
                    <div class="card" >
                        <img src="{{ $result['thumbnail_url'] }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <span class="badge text-bg-light">ที่ตั้ง 
                                {{ $result['place_information']['attraction_types'][0]['description']}} 
                                {{ $result['location']['address'] }}
                                {{ $result['location']['sub_district'] }}
                                {{ $result['location']['district']  }}
                                จ. {{ $result['location']['province']  }}
                                {{ $result['location']['postcode']  }}
                            </span>
                          <h5 class="card-text">{{ $result['place_information']['introduction']}}</h5>
                          <p class="card-text pt-3">{{ $result['place_information']['detail']}}</p>
                        </div>
                        <div class="row">
                            {{-- activiries --}}
                            <div class="col-6">
                                <div class="card ms-3 my-3" style="width: 25rem;">
                                    <div class="card-header">
                                    กิจกรรมที่น่าสนใจ
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        @if(!empty($result['place_information']['activities']))
                                            @foreach ($result['place_information']['activities'] as $activity)
                                                <li class="list-group-item">{{ $activity }}</li>
                                            @endforeach
                                        @else 
                                        <li class="list-group-item">-</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            {{-- end --}}
                            {{-- fee --}}
                            <div class="col-6">
                                <div class="card ms-3 my-3" style="width: 25rem;">
                                    <div class="card-header">
                                        ค่าธรรมเนียมเข้าชม
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">คนไทย: <br>
                                            - เด็ก {{ $result['place_information']['fee']['thai_child'] }} .- <br>
                                            - ผู้ใหญ่ {{ $result['place_information']['fee']['foreigner_child'] }} .-
                                        </li>
                                        <li class="list-group-item">ต่างชาติ {{ $result['place_information']['fee']['foreigner_adult'] }} .-</li>
                                    </ul>
                                </div>
                            </div>
                            {{-- end --}}
                            {{-- facilities --}}
                            <div class="col-6">
                                <div class="card ms-3 my-3" style="width: 25rem;">
                                    <div class="card-header">
                                    สิ่งอำนวยความสะดวก: 
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        @if(!empty($result['facilities']))
                                            @foreach ($result['facilities'] as $facility)
                                                <li class="list-group-item">{{ $facility['description'] }}</li>
                                            @endforeach
                                        @else
                                            <li class="list-group-item">-</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            {{-- end --}}
                        </div>
                        
                        <div class="row">
                            {{-- target --}}
                            <div class="col-12 p-3">
                                <h2 class="text-dark">เหมาะสำหรับ :</h2>
                                <ul>
                                    @if(!empty($result['place_information']['targets']))
                                        @foreach ($result['place_information']['targets'] as $target)
                                            <li class="text-dark">{{ $target }}</li>
                                        @endforeach
                                    @else
                                        <li class="text-dark">-</li>
                                    @endif
                                </ul>
                            </div>
                            {{-- end --}}
                        </div>
                        {{-- pictures --}}
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-dark">ภาพบรรยากาศ</h2>
                            </div>
                            @foreach ($result['web_picture_urls'] as $pic) 
                                <div class="col-6">
                                    <img src="{{ $pic }}" class="d-flex img-fluid p-3" alt="" >
                                </div>
                            @endforeach
                        </div>
                        {{-- end --}}
                        {{-- how to go --}}
                        <div class="row">
                            <div class="col-12">
                                <h2>วิธีการเดินทาง: </h2>
                                <p>{{ $result['how_to_travel'] }}</p>
                            </div>
                        </div>

                        {{-- end --}}

                        
                    </div>
                    {{-- end .card --}}
                </div>
            </div>
            {{-- end .row --}}
            
            
        </div>
    
    </body>
</html>
