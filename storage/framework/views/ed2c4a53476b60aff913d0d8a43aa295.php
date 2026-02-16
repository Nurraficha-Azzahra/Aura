<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aura</title>
</head>
<body>
    <header>
        <h1>Aspirasi Sekolah</h1>
    <header>
    <main>
        <h2><?php echo e($title); ?></h2>
        <?php if(session('success')): ?>
        <p style="color: green;"><?php echo e(session('success')); ?></p>
        <?php elseif($errors->any()): ?>
        <ul style="color: red;">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html><?php /**PATH C:\Users\ACER\Aura\resources\views/auth/app.blade.php ENDPATH**/ ?>