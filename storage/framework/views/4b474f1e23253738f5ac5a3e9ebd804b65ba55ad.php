<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
        <title>Beheerpaneel Stadshuis</title>
    </head>
    <body>
        <div class="text-left container mt-5">
            <h2>Beheerpaneel Stadshuis</h2>
        </div>
        <div class="text-center container border border-dark mt-5 bg-secondary pt-5 pb-5 pl-5 pr-5 rounded-4">
            <h2 style="color:white;">Status ramen</h2>
            <div class="text-center container-inner border border-dark bg-secondary pt-4 pb-4 pl-1 pr-1 rounded-4">
            <?php $ramenonder = $ramenonderlateststate[0];  $ramenboven = $ramenbovenlateststate[0]; 
            if($ramenonder['onoff'] === 'off') { ?> <img src="<?php echo e(asset('img/raamopen.jpg')); ?>" width="45%" height="250" class="Raam open"> <?php } else { ?> <img src="<?php echo e(asset('img/ramendicht.jpg')); ?>" width="45%" height="250" class="Raam dicht"> <?php } if($ramenboven['onoff'] == 'off') { ?> <img src="<?php echo e(asset('img/raamopen.jpg')); ?>" width="45%" height="250" class="Raam open"> <?php } else { ?> <img src="<?php echo e(asset('img/ramendicht.jpg')); ?>" width="45%" height="250" class="Raam dicht"> <?php }?>
            </div>
            <br>
            <a href="/ramen/" class="btn btn-light btn-block">Lees verder</a><br>
        </div>
        <div class="text-center container border border-dark mt-5 bg-secondary pt-5 pb-5 pl-5 pr-5 rounded-4">
            <h2 style="color:white;">Status rookmelding</h2>
            <div class="text-center container-inner border border-dark bg-secondary pt-1 pb-4 pl-1 pr-1 rounded-4">
            <br>
            <?php if(isset($rookmeldingonderlateststate[0])) {  ?><a style="font-size: 20px;">Er is een recente rookmelding beneden</strong></a><br><?php } ?>
            <?php if(!isset($rookmeldingonderlateststate[0])) {  ?><a style="font-size: 20px;">Er zijn geen recente rookmeldingen</strong></a><br><?php } ?>
           </div>
            <br><a href="/rookmelding/" class="btn btn-light btn-block">Lees verder</a>
        </div>

        <div class="text-center container border border-dark mt-5 bg-secondary pt-5 pb-5 pl-5 pr-5 rounded-4">
            <h2 style="color:white;">Status gebruik kamers</h2>
            <div class="text-center container-inner border border-dark bg-secondary pt-1 pb-4 pl-1 pr-1 rounded-4">
            <a style="font-size: 20px;"><br><?php $beweging2 = $bewegingbovenlateststate[0]; $onoff2 = $beweging2['onoff']; if($onoff2 === 'on') {?> <a style="font-size: 20px;">Er is beweging in de kamer boven</a><br> <?php } ?><?php $beweging = $bewegingonderlateststate[0]; $onoff = $beweging['onoff']; if($onoff === 'on') {?> <a style="font-size: 20px;">Er is beweging in de kamer beneden</a><br> <?php } ?><?php $beweging2 = $bewegingbovenlateststate[0]; $onoff2 = $beweging2['onoff']; $beweging = $bewegingonderlateststate[0]; $onoff = $beweging['onoff'];  if($onoff2 === 'off' && $onoff === 'off') {?> <a style="font-size: 20px;">Er is in geen enkele kamer beweging</a><br> <?php } ?>
          </div>
          <br><a href="/beweging/" class="btn btn-light btn-block">Lees verder</a>
        </div>

        <div class="text-center container border border-dark mt-5 bg-secondary pt-5 pb-5 pl-5 pr-5 rounded-4">
        <h2 style="color:white;">Status verlichting</h2>
           <div class="text-center container-inner border border-dark bg-secondary pt-1 pb-4 pl-1 pr-1 rounded-4">
           <a style="font-size: 20px;"><br><?php $verlichting2 = $verlichtingbovenlateststate[0]; $onoff2 = $verlichting2['onoff']; if($onoff2 === 'on') {?> <a style="font-size: 20px;">Er staat verlichting aan in de kamer boven</a><br> <?php } ?><?php $verlichting = $verlichtingonderlateststate[0]; $onoff = $verlichting['onoff']; if($onoff === 'on') {?> <a style="font-size: 20px;">Er staat verlichting aan in de kamer beneden</a><br> <?php } ?><?php $verlichting2 = $verlichtingbovenlateststate[0]; $onoff2 = $verlichting2['onoff']; $verlichting = $verlichtingonderlateststate[0]; $onoff = $verlichting['onoff'];  if($onoff2 === 'off' && $onoff === 'off') {?> <a style="font-size: 20px;">Er staat in geen enkele kamer verlichting aan</a><br> <?php } ?>
           </div>
           <br>
        </div>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project09-2022/project2/project/resources/views/home.blade.php ENDPATH**/ ?>