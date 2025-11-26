

<?php $__env->startSection('title', 'Iniciar Sesión'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-5">
        <div class="card shadow-lg">
            <div class="card-header text-center py-4">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="DreamSound Academy" height="80" class="mb-3" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <i class="bi bi-music-note-beamed" style="font-size: 4rem; color: #ffc107; display: none;"></i>
                <h3 class="mt-3 mb-0" style="color: white; font-weight: 700;">DreamSound Academy</h3>
                <p class="mb-0 mt-2" style="color: rgba(255,255,255,0.9);">Iniciar Sesión</p>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">
                            <i class="bi bi-envelope"></i> Email
                        </label>
                        <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
                               placeholder="tu@email.com">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">
                            <i class="bi bi-lock"></i> Contraseña
                        </label>
                        <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               id="password" name="password" required placeholder="••••••••">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Recordarme</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                        </button>
                    </div>
                </form>

                <hr class="my-4">
                <div class="text-center">
                    <p class="mb-0 text-muted">¿No tienes cuenta?</p>
                    <a href="<?php echo e(route('register')); ?>" class="text-decoration-none fw-semibold" style="color: #3949ab;">
                        <i class="bi bi-person-plus"></i> Regístrate aquí
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\giova\Downloads\escuelademusica\resources\views/auth/login.blade.php ENDPATH**/ ?>