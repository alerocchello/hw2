

<?php $__env->startSection('title', '| Registration'); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/registration.js')); ?>" defer></script>
<script type="text/javascript">
    const REGISTRATION_ROUTE = "<?php echo e(url('registration')); ?>";
</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<h2>Registrati</h2>

<form name='registration' method='post' enctype='multipart/form-data' action="<?php echo e(url('registration')); ?>">
    
    <?php echo csrf_field(); ?>
    <div class="name control">
        <label><input type='text' name='name' placeholder="Nome" value='<?php echo e(old("name")); ?>' ></label>
    </div>
    <div class="surname control">
        <label><input type='text' name='surname' placeholder="Cognome" value='<?php echo e(old("surname")); ?>' ></label>
    </div>
    <div class="username control">
        <label><input type='text' name='username' placeholder="Nome utente" value='<?php echo e(old("username")); ?>' ></label>
        <!-- <span>&nbsp;<?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> -->
        <p></p>
    </div>
    <div class="email control">
        <label><input type='text' name='email' placeholder="E-mail" value='<?php echo e(old("email")); ?>' ></label>
        <p></p>
    </div>
    <div class="password control">
        <label><input type='password' name='password' placeholder="Password" ></label>
        <p></p>   
    </div>
    <div class="conf_password control">
        <label><input type='password' name='conf_password' placeholder="Conferma password" ></label>
        <p></p> 
    </div>
    <div class="control">
        <input type="submit" value="Invia">    
    </div>

</form>

<p>Hai già un account? <a href="<?php echo e(url('login')); ?>">Accedi</a></p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CoseMie\xampp\htdocs\Programmi\AR_SPORT\resources\views/registration.blade.php ENDPATH**/ ?>