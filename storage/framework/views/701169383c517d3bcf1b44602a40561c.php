

<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
    <p style="color:mediumvioletred; margin-top:15px;"><?php echo e(session('success')); ?></p>
<?php endif; ?>

<table border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <?php if(auth()->user()->role == 'admin'): ?>
            <th>Nama</th>
            <th>NIS</th>
            <th>Kelas</th>
            <?php endif; ?>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $aspirasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aspirasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->index + 1); ?></td>
            <td><?php echo e($aspirasi->created_at->format('d-m-Y')); ?></td>
            <?php if(auth()->user()->role == 'admin'): ?>
            <td><?php echo e($aspirasi->user->name); ?></td>
            <td><?php echo e($aspirasi->user->nis); ?></td>
            <td><?php echo e($aspirasi->user->kelas); ?></td>
            <?php endif; ?>
            <td>
                <a href="<?php echo e(route('aspirasi.show', $aspirasi->id)); ?>">
                    <?php echo e($aspirasi->title); ?>

                </a>
            </td>
            <td><?php echo e($aspirasi->kategori->nama_kategori ?? '-'); ?></td>
            <td>
                <?php if(auth()->user()->role == 'admin'): ?>
                <form method="POST" action="<?php echo e(route('aspirasi.updateStatus', $aspirasi)); ?>">
                    <?php echo csrf_field(); ?>
                    <select name="status" onchange="this.form.submit()">
                        <option value="diajukan" <?php echo e($aspirasi->status == 'diajukan' ? 'seleted' : ''); ?>>Diajukan</option>
                        <option value="diproses" <?php echo e($aspirasi->status == 'diproses' ? 'selected' : ''); ?>>Diproses</option>
                        <option value="ditolak" <?php echo e($aspirasi->status == 'ditolak' ? 'selected' : ''); ?>>Ditolak</option>
                        <option value="diterima" <?php echo e($aspirasi->status == 'diterima' ? 'selected' : ''); ?>>Diterima</option>
                        <option value="selesai" <?php echo e($aspirasi->sttaus == 'selesai' ? 'selected' : ''); ?>>Selesai</option>
                    </select>
            </form>
            <?php else: ?>
            <?php echo e($aspirasi->status); ?>

            <?php endif; ?>
        </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACER\Aura\resources\views/aspirasi/index.blade.php ENDPATH**/ ?>