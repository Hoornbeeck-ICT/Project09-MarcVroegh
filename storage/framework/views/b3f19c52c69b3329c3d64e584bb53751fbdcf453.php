<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
        <title>PlanetNews</title>
    </head>
    <body>
        <div class="text-left container mt-5">
            <h2>Beheerspaneel Stadshuis</h2>
        </div>
        <div class="text-center container mt-5 bg-secondary pt-5 pb-5 pl-5 pr-5 rounded-4">
            <h2 style="color:white;">Status ramen</h2>
            <?php print_r($array); ?>
            <a href="/ramen/" class="btn btn-light btn-block">Lees verder</a>
        </div>
        <div class="text-center container mt-5 bg-secondary pt-5 pb-5 pl-5 pr-5 rounded-4">
            <h2 style="color:white;">Status rookmelding</h2>
            <a href="/rookmelding/" class="btn btn-light btn-block">Lees verder</a>
        </div>

        <div class="text-center container mt-5 bg-secondary pt-5 pb-5 pl-5 pr-5 rounded-4">
            <h2 style="color:white;">Status verlichting</h2>
            <a href="/verlichting/" class="btn btn-light btn-block">Lees verder</a>
        </div>

        <div class="text-center container mt-5 bg-secondary pt-5 pb-5 pl-5 pr-5 rounded-4">
            <h2 style="color:white;">Status gebruik kamers</h2>
            <a href="/beweging/" class="btn btn-light btn-block">Lees verder</a>
        </div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project09-2022/project2/project/resources/views/layouts/app.blade.php ENDPATH**/ ?>