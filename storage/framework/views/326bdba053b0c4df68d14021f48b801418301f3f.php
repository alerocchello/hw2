

<?php $__env->startSection('title', '| Login'); ?>


<?php $__env->startSection('content'); ?>
<h2>Accedi</h2>

<form name='login' method='post' action="<?php echo e(url('login')); ?>">

    <?php echo csrf_field(); ?>
    <div class="control">
        <label><input type='text' name='username' placeholder="Nome utente"></label>
        <!-- <span>&nbsp;<?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> -->
    </div>
    <div class="control">
        <label><input type='password' name='password' placeholder="Password"></label>    
    </div>
    <span><input type="checkbox"> Ricordami</span>
    <div class="control">
        <input type="submit" value="Invia">
    </div>

</form>
<p>Non hai ancora un account? <a href="<?php echo e(url('registration')); ?>">Registrati</a></p>
<?php $__env->stopSection(); ?>


<!-- Da controllare


<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CoseMie\xampp\htdocs\Programmi\AR_SPORT\resources\views//login.blade.php ENDPATH**/ ?>