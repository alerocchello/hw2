

<?php $__env->startSection('title', '| News'); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/news.js')); ?>" defer></script>
<script type="text/javascript">
    const NEWS_ROUTE = "<?php echo e(url('warehouse_news')); ?>";  
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel='stylesheet' href="<?php echo e(asset('css/news.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<a href="<?php echo e(url('news')); ?>" class="title">Tutte le ultime notizie</a>
<div id="news"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.skeleton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CoseMie\xampp\htdocs\Programmi\AR_SPORT\resources\views/news.blade.php ENDPATH**/ ?>