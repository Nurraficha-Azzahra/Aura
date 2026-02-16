

<?php $__env->startSection('content'); ?>
<h1>Edit User</h1>

<form method="POST" action="<?php echo e(route('users.update', $user)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <table cellpadding="5" cellspacing="0">
        <tr>
            <td><label>Username:</label></td>
            <td><input type="text" name="username" value="<?php echo e(old('username', $user->username)); ?>" required></td>
        </tr>

        <tr>
            <td><lable>Nama:</lable></td>
            <td><input type="text" name="name" value="<?php echo e(old('name', $user->name )); ?>" required></td>
        </tr>
        
        <tr>
            <td><lable>NIS:</lable></td>
            <td><input type="text" name="nis" value="<?php echo e(old('nis', $user->nis)); ?>" required></td>
        </tr>

        <tr>
            <td><label>Kelas:</label></td>
            <td><input type="text" name="kelas" value="<?php echo e(old('kelas', $user->kelas)); ?>" required></td>
        </tr>

        <tr>
            <td><label>Password:</label></td>
            <td><input type="password" name="password"></td>
        </tr>

        <tr>
            <td><label>Konfigurasi Password:</label></td>
            <td><input type="password" name="password_confirmation"></td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit">Update</button>
            </td>
        </tr>
    </table>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACER\Aura\resources\views/users/edit.blade.php ENDPATH**/ ?>