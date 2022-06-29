<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <!-- meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
        <!-- css di header, side_menu e footer -->
        <link rel='stylesheet' href="<?php echo e(asset('css/log_reg.css')); ?>">
        <link rel='stylesheet' href="<?php echo e(asset('css/footer.css')); ?>">

        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> <!-- link font -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Social nel footer-->
        <?php echo $__env->yieldContent('script'); ?>
    
        <title><?php echo e(config('app.name', 'Laravel')); ?> <?php echo $__env->yieldContent('title'); ?></title> 
    </head>
    <body>

        <h1 id="logo">ar sport</h1>
        <main>
            <div class="form_container">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>

        <footer>
            <p>Seguici su</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
            <div id="links_footer">
                <a>Privacy</a>
                <a>Terms and conditions</a>
                <a>Cookie policy</a>
                <a>Cookie Settings</a>
            </div>
            <p>Powered by Alessandro Rocchello 1000005960</p>
        </footer>


    </body>
</html>


<?php /**PATH D:\CoseMie\xampp\htdocs\Programmi\AR_SPORT\resources\views/layouts/guest.blade.php ENDPATH**/ ?>