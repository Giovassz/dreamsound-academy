<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'DreamSound Academy'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a237e;
            --secondary-color: #3949ab;
            --accent-color: #ffc107;
            --dark-color: #0d47a1;
            --light-color: #e3f2fd;
            --success-color: #2e7d32;
            --danger-color: #c62828;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            background-attachment: fixed;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--dark-color) 100%) !important;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #fff !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand i {
            font-size: 2rem;
            color: var(--accent-color);
        }

        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            transition: all 0.3s;
            margin: 0 0.5rem;
        }

        .nav-link:hover {
            color: var(--accent-color) !important;
            transform: translateY(-2px);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border-radius: 8px;
        }

        .dropdown-item {
            transition: all 0.3s;
        }

        .dropdown-item:hover {
            background: var(--light-color);
            transform: translateX(5px);
        }

        .main-content {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            margin: 2rem auto;
            padding: 2rem;
            min-height: calc(100vh - 200px);
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 1.25rem;
            font-weight: 600;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 8px;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26, 35, 126, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success-color) 0%, #4caf50 100%);
            border: none;
            border-radius: 8px;
        }

        .btn-info {
            background: linear-gradient(135deg, #0288d1 0%, #03a9f4 100%);
            border: none;
            border-radius: 8px;
        }

        .btn-warning {
            background: linear-gradient(135deg, #f57c00 0%, var(--accent-color) 100%);
            border: none;
            border-radius: 8px;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
        }

        .table tbody tr {
            transition: all 0.3s;
        }

        .table tbody tr:hover {
            background: var(--light-color);
            transform: scale(1.01);
        }

        .badge {
            padding: 0.5rem 0.75rem;
            border-radius: 6px;
            font-weight: 500;
        }

        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 2px solid #e0e0e0;
            padding: 0.75rem;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(57, 73, 171, 0.25);
        }

        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            transition: transform 0.3s;
        }

        .stats-card:hover {
            transform: translateY(-5px) scale(1.02);
        }

        .stats-card i {
            font-size: 3rem;
            opacity: 0.8;
        }

        .stats-card h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0.5rem 0;
        }

        .page-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .page-title i {
            color: var(--accent-color);
            font-size: 2.5rem;
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <?php if(auth()->guard()->check()): ?>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="DreamSound Academy" height="40" class="me-2" onerror="this.style.display='none'; this.nextElementSibling.style.display='inline';">
                <i class="bi bi-music-note-beamed" style="display: none;"></i>
                <span>DreamSound Academy</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <?php if(auth()->user()->isAdmin() || auth()->user()->isStaff()): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-gear"></i> Gestión
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo e(route('admin.alumnos.index')); ?>">
                                <i class="bi bi-person-badge"></i> Alumnos
                            </a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('admin.instrumentos.index')); ?>">
                                <i class="bi bi-music-note-list"></i> Instrumentos
                            </a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('admin.clases.index')); ?>">
                                <i class="bi bi-calendar-event"></i> Clases
                            </a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(auth()->user()->isAdmin()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('admin.users.index')); ?>">
                            <i class="bi bi-people"></i> Usuarios
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> <?php echo e(auth()->user()->name); ?>

                            <span class="badge bg-warning text-dark ms-1"><?php echo e(ucfirst(auth()->user()->role->name)); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="<?php echo e(route('logout')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php endif; ?>

    <div class="container-fluid">
        <div class="main-content">
            <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> <?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\giova\Downloads\escuelademusica\resources\views/layouts/app.blade.php ENDPATH**/ ?>