

<?php $__env->startSection('title', 'Gestión de Instrumentos'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-music-note-list"></i> Gestión de Instrumentos</h2>
    <a href="<?php echo e(route('admin.instrumentos.create')); ?>" class="btn btn-info">
        <i class="bi bi-plus-circle"></i> Nuevo Instrumento
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $instrumentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instrumento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($instrumento->id); ?></td>
                        <td><?php echo e($instrumento->nombre); ?></td>
                        <td><span class="badge bg-secondary"><?php echo e($instrumento->categoria); ?></span></td>
                        <td><?php echo e($instrumento->descripcion ? \Illuminate\Support\Str::limit($instrumento->descripcion, 50) : 'N/A'); ?></td>
                        <td>
                            <?php if($instrumento->is_active): ?>
                                <span class="badge bg-success">Activo</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Inactivo</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.instrumentos.edit', $instrumento)); ?>" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="<?php echo e(route('admin.instrumentos.destroy', $instrumento)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('¿Desactivar este instrumento?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay instrumentos registrados</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            <?php echo e($instrumentos->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\giova\Downloads\escuelademusica\resources\views/admin/instrumentos/index.blade.php ENDPATH**/ ?>