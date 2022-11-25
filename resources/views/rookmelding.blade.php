<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/js/app.js'])
        <title>Rookmelding</title>
    </head>
    <body>
        <div class="text-left container mt-5">
            <h2>Status rookmelding</h2>
        </div>
        <div class="text-center container border border-dark mt-5 bg-secondary pt-5 pb-5 pl-5 pr-5 rounded-4">
            <h2 style="color:white;">Aantal rookmeldingen</h2>
            <div class="text-center container-inner border border-dark bg-secondary pt-4 pb-4 pl-1 pr-1 rounded-4">
            <a style="font-size: 20px;">In deze maand zijn er <strong><?php  echo count($rookmeldingcountmaand) ?></strong> rookmeldingen geweest, <br>
             En in dit jaar zijn er maar <strong><?php  echo count($rookmeldingcountjaar) ?></strong> rookmeldingen geweest. </a>
            </div>
        </div>

        <div class="text-center container border border-dark mt-5 bg-secondary pt-5 pb-5 pl-5 pr-5 rounded-4">
            <h2 style="color:white;">Laatste 20 rookmeldingen</h2>
            <div class="text-center container-inner border border-dark bg-secondary pt-4 pb-4 pl-1 pr-1 rounded-4">
            <div class="row justify-content-center">
            <div class="col-auto">
            <table class="table table-responsive">
            <tr>
            <td>Waar</td>
            <td>Wat</td>
            <td>Tijd</td>
            </tr>
            @foreach ($rookmeldinggetall as $rookmelding)
            <tr>
            <td>{{ $rookmelding->waar }}</td>
            <td>{{ $rookmelding->wat }}</td>
            <td>{{ $rookmelding->create_at }}</td>
            </tr>
            @endforeach
            </table>
            </div>
            </div>
            </div>
        </div>