

<?php $__env->startSection('title', '| Home page'); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/home.js')); ?>" defer></script>
<script type="text/javascript">
    const HOME_ROUTE = "<?php echo e(url('home')); ?>";
    const NEWS_ROUTE = "<?php echo e(url('warehouse_news')); ?>";
    const MATCHES_ROUTE = "<?php echo e(url('warehouse_matches')); ?>";
    const SPOTIFY_ROUTE = "<?php echo e(url('spotify')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel='stylesheet' href="<?php echo e(asset('css/home.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section>

        <a href="<?php echo e(url('news')); ?>" class="link_statistics_title">Ultime notizie</a>
        <h2>News, approfondimenti e il meglio dello sport</h2>
        <div id="news"></div>
        
        <a href="<?php echo e(url('matches')); ?>" class="link_statistics_title" id="second">Eventi sportivi più attesi</a>
        <div id="buttons2">
            <a class="button">Acquista biglietti</a>
            <a class="button">TV e streaming</a>
        </div>
        
        <div id="events"></div>

        <img src="./images/spotify.png" id="logo_spotify">
        <form id="spotify">            
            <h2>Scrivi il nome e scegli un album musicale<br>
                Noi lo riprodurremo in sottofondo</h2>
            <input type="text" id="album" />
            <input type="submit" value="Cerca">
            <div id="album-view"></div>
        </form>

    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.skeleton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CoseMie\xampp\htdocs\Programmi\AR_SPORT\resources\views/home.blade.php ENDPATH**/ ?>