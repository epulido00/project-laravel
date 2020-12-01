<?php $__env->startSection('content'); ?>

<h1>Editar</h1>
<?php if(count($errors) > 0): ?> 
    <?php foreach($errors->all() as $error): ?>
        <li><?php echo e($error); ?></li>
    <?php endforeach; ?>
<?php endif; ?>
<form action="<?php echo e(url('editTask/'.$task->id)); ?>" method = "POST">
    <?php echo e(csrf_field()); ?>

    <?php echo e(method_field('PUT')); ?>

    <div class="form-group">
        <input type = "text" name = "titulo" class="form-control" placeholder="Titulo" value = "<?php echo e($task->titulo); ?>"/>
    </div>
    <div class="form-group">
        <input type = "text" name = "descripcion" class="form-control" placeholder="Descripcion" value = "<?php echo e($task->descripcion); ?>" />
    </div>
    <input type = "submit" value = "Guardar cambios" class="form-control btn btn-primary" />
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>