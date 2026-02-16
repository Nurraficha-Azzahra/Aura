

<?php $__env->startSection('content'); ?>
<h1>Management User</h1>

<a href="<?php echo e(route('users.create')); ?>"
    style="display: inline-block;padding:8px 12px;background: white;color:black;text-decoration:none;border:1px solid black;border-radius:4px;margin-bottom:15px"> 
    + Tambah User Baru
</a>

<?php if(session('success')): ?>
    <p style="color: green; margin-top:15px;"><?php echo e(session('success')); ?></p>
<?php endif; ?>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Username</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->username); ?></td>
            <td><?php echo e($user->nis); ?></td>
            <td><?php echo e($user->kelas); ?></td>
            <td><?php echo e($user->role); ?></td>
            <td>
                <a href="<?php echo e(route('users.edit', $user )); ?>">Edit</a>
                <form action="<?php echo e(route('users.destroy', $user )); ?>" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" style="background:none;border:none;color:red;cursor:pointer;">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACER\Aura\resources\views/users/index.blade.php ENDPATH**/ ?>