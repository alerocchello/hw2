

<?php $__env->startSection('title', '| Matches'); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/matches.js')); ?>" defer></script>
<script type="text/javascript">
    const MATCHES_ROUTE = "<?php echo e(url('warehouse_matches')); ?>";  
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel='stylesheet' href="<?php echo e(asset('css/matches.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<a href="<?php echo e(url('matches')); ?>" class="title">Tutti gli eventi sportivi più attesi</a>
<div id="matches"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.skeleton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CoseMie\xampp\htdocs\Programmi\AR_SPORT\resources\views/matches.blade.php ENDPATH**/ ?>