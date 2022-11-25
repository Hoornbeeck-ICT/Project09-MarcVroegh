<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
        <title>Beweging</title>
    </head>
    <body>
        <div class="text-left container mt-5">
            <h2>Status gebruik kamers</h2>
        </div>
        <div class="text-center container border border-dark mt-5 bg-secondary pt-5 pb-5 pl-5 pr-5 rounded-4">
            <h2 style="color:white;">Aantal minuten gebruik kamers</h2>
            <div class="text-center container-inner border border-dark bg-secondary pt-4 pb-4 pl-1 pr-1 rounded-4">
            <?php $amountboven2 =  array_sum($amountboven); if($amountboven2 <= 60) { ?> <a style="font-size: 20px;">Er is in totaal voor <strong><?php echo $amountboven2; ?></strong> seconden gebruiken gemaakt van de kamer boven</strong></a><?php } else { ?> <a style="font-size: 20px;">Er is in totaal voor <strong><?php $amountbovenminutes = $amountboven2 / 60; echo(round($amountbovenminutes ,PHP_ROUND_HALF_UP)); ?></strong> minuten gebruiken gemaakt van de kamer boven</strong></a><?php } ?> <br>
            <?php $amountonder2 =  array_sum($amountonder); if($amountonder2 <= 60) { ?> <a style="font-size: 20px;">Er is in totaal voor <strong><?php echo $amountonder2; ?></strong> seconden gebruiken gemaakt van de kamer onder</strong></a><?php } else { ?> <a style="font-size: 20px;">Er is in totaal voor <strong><?php $amountonderminutes = $amountonder2 / 60; echo(round($amountonderminutes ,PHP_ROUND_HALF_UP)); ?></strong> minuten gebruiken gemaakt van de kamer onder</strong></a><?php } ?>
            </div>
        </div>

        <div class="text-center container border border-dark mt-5 bg-secondary pt-5 pb-5 pl-5 pr-5 rounded-4">
            <h2 style="color:white;">Laatste 20 bewegingen in kamer</h2>
            <div class="text-center container-inner border border-dark bg-secondary pt-4 pb-4 pl-1 pr-1 rounded-4">
            <div class="row justify-content-center">
            <div class="col-auto">
            <table class="table table-responsive">
            <tr>
            <td>Waar</td>
            <td>Aan?</td>
            <td>Tijd</td>
            </tr>
            <?php $__currentLoopData = $beweginggetall; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beweging): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($beweging->waar); ?></td>
            <td><?php echo e($beweging->onoff); ?></td>
            <td><?php echo e($beweging->create_at); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            </div>
            </div>
            </div>
        </div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project09-2022/project2/project/resources/views/beweging.blade.php ENDPATH**/ ?>