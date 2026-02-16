

<?php $__env->startSection('content'); ?>
<h1>Tambah User Baru</h1>

 <form method="POST" action="<?php echo e(route('users.store')); ?>">
    <?php echo csrf_field(); ?>
    <table cellpadding="5" cellspacing="0">
        <tr>
            <td><label>Username:</label></td>
            <td><input type="text" name="username" value="<?php echo e(old('username')); ?>" required></td>
        </tr>

        <tr>
            <td><label>Nama:</label></td>
            <td><input type="text" name="name" value="<?php echo e(old('name')); ?>" required></td>
        </tr>

        <tr>
            <td><label>NIS:</label></td>
            <td><input type="text" name="nis" value="<?php echo e(old('nis')); ?>"></td>
        </tr>

        <tr>
            <td><label>Kelas:</label></td>
            <td><input type="text" name="kelas" value="<?php echo e(old('kelas')); ?>"></td>
        </tr>
        
        <tr>
            <td><lable>Password:</lable></td>
            <td><input type="password" name="password" required></td>
        </tr>

        <tr>
            <td><label>Konfirmasi Password:</label></td>
            <td><input type="password" name="password_confirmation" required></td>
        </tr>

        <tr>
            <td colspan="2">
            <button type="submit">Simpan</button>
            </td>
        </tr>
    </table>
 </form>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACER\Aura\resources\views/users/create.blade.php ENDPATH**/ ?>