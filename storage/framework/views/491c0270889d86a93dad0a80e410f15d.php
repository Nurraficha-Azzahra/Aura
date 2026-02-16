

<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(route('aspirasi.store')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <table cellpadding="5">
        <tr>
            <td>Judul</td>
            <td>
                <input type="text" name="title" value="<?php echo e(old('title')); ?>" required>
            </td> 
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
                <select name="kategori_id" required>
                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>"
                            <?php echo e(old('kategori_id') == $item->id ? 'selected' : ''); ?>>
                            <?php echo e($item->nama_kategori); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </td>
        </tr>
        
        <tr>
            <td>Deskripsi</td>
            <td>
                <input type="text" name="description" value="<?php echo e(old('description')); ?>">
            </td>
        </tr>

        <tr>
            <td>Foto</td>
            <td>
                <input type="file" name="foto" accept="image/*">
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit">Kirim</button>
            </td>
        </tr>
    </table>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACER\Aura\resources\views/aspirasi/create.blade.php ENDPATH**/ ?>