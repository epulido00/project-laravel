<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(count($errors) > 0): ?> 
<div class="alert alert-danger">
    <?php foreach($errors->all() as $error): ?>
        <li><?php echo e($error); ?></li>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<form action="<?php echo e(url('login')); ?>" method="post">
	<?php echo e(csrf_field()); ?>

	<input type="text" name="usuario" placeholder="Usuario" class="form-control"><br />
	<input type="password" name="password" placeholder="Contraseña" class="form-control"><br />
	<input type="submit" value="Login" class="btn btn-primary">
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>