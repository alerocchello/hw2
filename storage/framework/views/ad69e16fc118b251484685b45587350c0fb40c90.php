

<?php $__env->startSection('title', '| Official online store'); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/store.js')); ?>" defer></script>
<script type="text/javascript">
    const TSHIRT_ROUTE = "<?php echo e(url('return_tshirt')); ?>";
    const ADD_ROUTE = "<?php echo e(url('add_to_cart')); ?>";  
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<nav>
    <h1 id="logo">AR sport</h1>
    <form id="search_team" method="GET">
        <input type='text' name="team" id="team" placeholder="Nome squadra">
        <input type="submit" value="Invia" id="submit">
    </form>
    <a href="<?php echo e(url('cart')); ?>"><button><img src="./images/carrello.png" id="iconcart"> Carrello</button></a> 
</nav>

<div id="intro">
    <h2>store</h2>
    <span>Acquista la maglietta della tua squadra del cuore</span>
</div>
    
<section id="divstore"></section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.shopping', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CoseMie\xampp\htdocs\Programmi\AR_SPORT\resources\views/store.blade.php ENDPATH**/ ?>