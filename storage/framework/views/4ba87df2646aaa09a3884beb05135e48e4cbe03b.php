<?php $__env->startSection('content'); ?>


<div>
    <h4>Pendientes por hacer</h4>
    <?php if(count($errors) > 0): ?> 
        <?php foreach($errors->all() as $error): ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; ?>
    <?php endif; ?>
    <form action="<?php echo e(url('addTask')); ?>" method = "POST">
        <?php echo e(csrf_field()); ?>

        <input type = "text" name = "titulo" />
        <input type = "text" name = "descripcion" />
        <input type = "submit" value = "Guardar" />
    </form>

    <?php if(count($tasks) > 0): ?>
    <?php foreach($tasks as $task): ?>
        <div>
            <h3><?php echo e($task->titulo); ?></h3>
            <p><?php echo e($task->descripcion); ?></p>
        </div>
    <?php endforeach; ?>
    <?php else: ?>
        No hay tareas de momento
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>