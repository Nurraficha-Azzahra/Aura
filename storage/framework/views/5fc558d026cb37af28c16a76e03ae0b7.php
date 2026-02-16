

<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(route('postLogin')); ?>">
    <?php echo csrf_field(); ?>
    <table cellpadding="5">
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </td>
        <tr>
            <td align="center">
                <button type="submit">Masuk</button>
            </td>
        </tr>
    </table>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACER\Aura\resources\views/auth/login.blade.php ENDPATH**/ ?>