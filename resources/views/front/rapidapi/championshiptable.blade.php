<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Championship Table</title>

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
                <div class="col-12 justify-content-center">
                    <h1 class="text-dark text-center">Championship Table</h1>
                </div>
                <div class="col-12 justify-content-center">
                    <p class="text-dark text-center">ข้อมูลจาก: <a href="rapidapi.com" target="_blank">rapidapi.com</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th colspan="9" class="text-center">Bet Championship 2023/24</th>
                            </tr>
                            <tr class="bg-light"> 
                            <th scope="col">#</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Team</th>
                            <th scope="col">Points</th>
                            <th scope="col">Played</th>
                            <th scope="col">Winned</th>
                            <th scope="col">Loosed</th>
                            <th scope="col">Tie</th>
                            <th scope="col">GD</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach ($response as $key=>$value)
                                
                                <tr>
                                    <td>{{$i +=1;}}</td>
                                    <td><img src="{{ $value['SquadLogo'] }}" class="img-fluid rounded-start" ></td>
                                    <td>{{$value['Name']}}</td>
                                    <td>{{$value['Points']}}</td>
                                    <td>{{$value['Played']}}</td>
                                    <td>{{$value['Winned']}}</td>
                                    <td>{{$value['Loosed']}}</td>
                                    <td>{{$value['Tie']}}</td>
                                    <td>{{$value['Goal Difference']}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
                
            </div>
        </div>
    
    </body>
</html>
