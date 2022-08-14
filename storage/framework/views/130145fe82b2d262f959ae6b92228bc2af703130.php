<?php $__env->startSection('title', 'Design.pro - Главная'); ?>

<?php $__env->startSection('header'); ?>
    <div class="header">
        <?php echo \Illuminate\View\Factory::parentPlaceholder('header'); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section id="latestRequests">
        <div class="section-title">
            <h2 class="underline">Newest requests</h2>
        </div>
        <div class="container">
            <div class="requests">
                <?php $__currentLoopData = $latestRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="request">
                    <div class="request-img">
                        <img src="<?php echo e($request->image); ?>" alt="request image" class="request-preview">
                        <img src="<?php echo e(asset('img/pr1.jpg')); ?>" alt="request scheme" class="request-scheme">
                    </div>
                    <p class="request-name"><?php echo e($request->name); ?></p>
                    <div class="request-category"><?php echo e($request->category); ?></div>
                    <div class="request-time"><?php echo e(date('d.m.Y', strtotime($request->created_at))); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <section id="requestsCounter">
        <div class="section-title">
            <h2 class="underline">Now in process</h2>
        </div>
        <div class="container">
            <div class="counter">
                <?php echo e($counter); ?>

            </div>
        </div>
    </section>

    <script>
        setInterval(function () {
            $.ajax({
                url: '<?php echo e(route('updateCounter')); ?>',
                data: '',
                type: 'GET',
                success: (data) => {
                    $('.counter').text(data);
                }
            })
        }, 4000)
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\ws-asia-2021\resources\views/index.blade.php ENDPATH**/ ?>