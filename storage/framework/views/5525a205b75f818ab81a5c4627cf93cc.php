

<?php $__env->startSection('title', 'Gestión de Usuarios'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">
        <i class="bi bi-people"></i>
        <span>Gestión de Usuarios</span>
    </h1>
    <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary btn-lg">
        <i class="bi bi-plus-circle"></i> Nuevo Usuario
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-list-ul"></i> Listado de Usuarios</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><strong>#<?php echo e($user->id); ?></strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person-circle me-2" style="font-size: 1.5rem; color: #3949ab;"></i>
                                <span><?php echo e($user->name); ?></span>
                            </div>
                        </td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <span class="badge bg-secondary"><?php echo e(ucfirst($user->role->name)); ?></span>
                        </td>
                        <td>
                            <?php if($user->is_active): ?>
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle"></i> Activo
                                </span>
                            <?php else: ?>
                                <span class="badge bg-danger">
                                    <i class="bi bi-x-circle"></i> Inactivo
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="btn btn-sm btn-warning" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <?php if($user->id !== auth()->id()): ?>
                                <form action="<?php echo e(route('admin.users.destroy', $user)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('¿Desactivar este usuario?')" title="Desactivar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="text-muted mt-3">No hay usuarios registrados</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if($users->hasPages()): ?>
        <div class="mt-3 d-flex justify-content-center">
            <?php echo e($users->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\giova\Downloads\escuelademusica\resources\views/admin/users/index.blade.php ENDPATH**/ ?>