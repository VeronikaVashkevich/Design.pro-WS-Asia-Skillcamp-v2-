<?php $__env->startSection('title', 'Design.pro - Личный кабинет'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="myRequests">
        <div class="container">
            <div class="section-title">
                <h2 class="underline">My requests</h2>
            </div>
            <div class="new-request">
                <a href="<?php echo e(route('requests.create')); ?>" class="new-request-link underline">New request</a>
            </div>
            <?php if(count($designRequests) > 0): ?>
                <div class="requests">
                    <?php $__currentLoopData = $designRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="request">
                            <div class="request-img">
                                <img src="<?php echo e($designRequest->image); ?>" alt="request image" class="request-preview">
                                <img src="<?php echo e($designRequest->image); ?>" alt="request scheme" class="request-scheme">
                            </div>
                            <p class="request-name"><?php echo e($designRequest->name); ?></p>
                            <p class="request-status"><?php echo e($designRequest->status); ?></p>
                            <div class="request-category"><?php echo e($designRequest->category); ?></div>
                            <div class="request-time"><?php echo e(date('d.m.Y', strtotime($designRequest->created_at))); ?></div>
                            <div class="controls">
                                <a class="control-link delete-link">Delete</a>
                                <form action="<?php echo e(route('requests.destroy', ['designRequest' => $designRequest->id])); ?>"
                                      id="deleteRequest" method="post">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="section-title">
                    <h2>You don't have requests</h2>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        $('.delete-link').click(function () {
            $('#deleteRequest').submit();
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\ws-asia-2021\resources\views/home.blade.php ENDPATH**/ ?>