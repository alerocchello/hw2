

<?php $__env->startSection('title', '| Official online store'); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/cart.js')); ?>" defer></script>
<script type="text/javascript">
    const CART_ROUTE = "<?php echo e(url('return_cart')); ?>";
    const REMOVE_ROUTE = "<?php echo e(url('remove_from_cart')); ?>";  
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<nav>
    <h1 id="logo">AR sport</h1>
    <h1>Carrello</h1>
    <a href="<?php echo e(url('store')); ?>"><button><img src="./images/negozio.png" id="iconcart"> Compra ancora</button></a> 
</nav>

<section id="products-view"></section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.shopping', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CoseMie\xampp\htdocs\Programmi\AR_SPORT\resources\views/cart.blade.php ENDPATH**/ ?>