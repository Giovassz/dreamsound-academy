

<?php $__env->startSection('title', 'Dashboard - Administrador'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-12">
        <h1 class="page-title">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard - Administrador</span>
        </h1>
        <p class="text-muted">Bienvenido, <strong><?php echo e(auth()->user()->name); ?></strong></p>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase mb-2" style="opacity: 0.9; font-size: 0.85rem;">Usuarios</h6>
                    <h2 class="mb-0"><?php echo e($stats['users']); ?></h2>
                </div>
                <i class="bi bi-people"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #2e7d32 0%, #4caf50 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase mb-2" style="opacity: 0.9; font-size: 0.85rem;">Alumnos</h6>
                    <h2 class="mb-0"><?php echo e($stats['alumnos']); ?></h2>
                </div>
                <i class="bi bi-person-badge"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #0288d1 0%, #03a9f4 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase mb-2" style="opacity: 0.9; font-size: 0.85rem;">Instrumentos</h6>
                    <h2 class="mb-0"><?php echo e($stats['instrumentos']); ?></h2>
                </div>
                <i class="bi bi-music-note-list"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #f57c00 0%, #ffc107 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase mb-2" style="opacity: 0.9; font-size: 0.85rem;">Clases</h6>
                    <h2 class="mb-0"><?php echo e($stats['clases']); ?></h2>
                </div>
                <i class="bi bi-calendar-event"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-lightning-charge"></i> Accesos Rápidos</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-primary">
                        <i class="bi bi-people"></i> Gestionar Usuarios
                    </a>
                    <a href="<?php echo e(route('admin.alumnos.index')); ?>" class="btn btn-success">
                        <i class="bi bi-person-badge"></i> Gestionar Alumnos
                    </a>
                    <a href="<?php echo e(route('admin.instrumentos.index')); ?>" class="btn btn-info">
                        <i class="bi bi-music-note-list"></i> Gestionar Instrumentos
                    </a>
                    <a href="<?php echo e(route('admin.clases.index')); ?>" class="btn btn-warning">
                        <i class="bi bi-calendar-event"></i> Gestionar Clases
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-info-circle"></i> Información del Sistema</h5>
            </div>
            <div class="card-body">
                <p class="mb-2"><strong>Rol:</strong> <span class="badge bg-primary"><?php echo e(ucfirst(auth()->user()->role->name)); ?></span></p>
                <p class="mb-2"><strong>Email:</strong> <?php echo e(auth()->user()->email); ?></p>
                <p class="mb-0"><strong>Estado:</strong> 
                    <?php if(auth()->user()->is_active): ?>
                        <span class="badge bg-success">Activo</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Inactivo</span>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\giova\Downloads\escuelademusica\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>