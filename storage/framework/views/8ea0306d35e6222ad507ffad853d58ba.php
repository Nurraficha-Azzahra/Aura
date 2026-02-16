

<?php $__env->startSection('content'); ?>
<article>
    <header>
        <h2><?php echo e($aspirasi->title); ?></h2>
        <p>Status: <strong><?php echo e($aspirasi->status); ?></strong></p>
    </header>

    <section>
        <p>Deskripsi: <?php echo e($aspirasi->description); ?></p>

        <?php if($aspirasi->photo): ?>
            <p>Foto Pendukung:</p>
            <img
                src="<?php echo e(asset('storage/' . $aspirasi->photo)); ?>"
                alt="Foto aspirasi"
                style="max-width: 420px; height: auto; border: 1px solid #ccc; padding: 4px;"
            >
        <?php endif; ?>
    </section>

    <?php if(auth()->user()->role == 'admin' || auth()->id() == $aspirasi->user_id): ?>
    <section>
        <h3>Kirim Balasan</h3>

        <form method="POST" action="<?php echo e(route('responses.store', $aspirasi)); ?>">
            <?php echo csrf_field(); ?>
            <table>
                <tr>
                    <td><label for="message">Pesan:</label></td>
                </tr>
                <tr>
                    <td>
                        <textarea id="message" name="message" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <button type="submit">Kirim Balasan</button>
                    </td>
                </tr>
            </table>
        </form>
    </section>
    <?php endif; ?>

    <section>
        <h3>Balasan</h3>

        <?php if($aspirasi->responses->isEmpty()): ?>
            <p>Belum ada balasan.</p>
        <?php else: ?>
            <table>
                <?php $__currentLoopData = $aspirasi->responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><strong><?php echo e($response->user->name); ?></strong></td>
                    <td>:</td>
                    <td><?php echo e($response->message); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        <?php endif; ?>
    </section>
</article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACER\Aura\resources\views/aspirasi/show.blade.php ENDPATH**/ ?>