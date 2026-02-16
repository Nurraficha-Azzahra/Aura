<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Aura</title>
</head>
<body>

    <h1>Aspirasi & Usulan Responsif Anda</h1>
    <hr>

    <nav style="display: flex; align-items: center; gap: 10px;">
        <a href="<?php echo e(route('aspirasi.index')); ?>">Home</a>

        <?php if(auth()->user()->role === 'admin'): ?>
            <a href="<?php echo e(route('users.index')); ?>">Management User</a>
        <?php elseif(auth()->user()->role === 'user'): ?>
            <a href="<?php echo e(route('aspirasi.create')); ?>">Buat Aspirasi Baru</a>
        <?php endif; ?>

        <p style="margin: 0;">Hai, <?php echo e(auth()->user()->name); ?></p>

        <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin: 0;">
            <?php echo csrf_field(); ?>
            <button type="submit">Logout</button>
        </form>
    </nav>
    
    <hr>
    <h2><?php echo e($title ?? ''); ?></h2>
    <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH C:\Users\ACER\Aura\resources\views/layouts/app.blade.php ENDPATH**/ ?>