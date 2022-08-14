<?php $__env->startSection('title', 'Design.pro - Sign in'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="section-title">
            <h2>Update request</h2>
        </div>
        <div class="form">
            <form id="form" action="<?php echo e(route('requests.update')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="form-field">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control readonly" readonly
                           value="<?php echo e($request->name); ?>">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="form-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-field">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" cols="30" rows="10" readonly
                              class="form-control readonly"><?php echo e(trim($request->description)); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="form-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-field">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category" class="form-control readonly" disabled>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category); ?>"
                                    <?php if($category == $request->category): ?> selected <?php endif; ?>><?php echo e($category); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="form-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-field">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-control readonly" readonly>
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="form-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-field">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control">
                        <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status); ?>"
                                    <?php if($status == $request->status): ?> selected <?php endif; ?>><?php echo e($status); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="form-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-field design">
                    <label for="design" class="form-label">Design</label>
                    <input type="file" id="design" class="form-control" name="design">
                    <?php $__errorArgs = ['design'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="form-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-field comment">
                    <label for="comment" class="form-label">Comment</label>
                    <input type="text" id="comment" class="form-control" name="comment" value="<?php echo e($request->comment); ?>">
                    <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="form-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <input type="hidden" name="id" value="<?php echo e($request->id); ?>">
                <div class="form-field">
                    <input type="submit" class="btn-submit" value="Save">
                </div>
            </form>
        </div>
    </div>

    <script>
        $('.btn-submit').click(function () {
            console.log('submit')
            $('#form').submit();
        })

        $(document).ready(function () {
            setAvailableStatuses();

            $('#status').change(function () {
                var newStatus = $('#status').val();

                updateStatus(newStatus)
            }).change()

            function updateStatus(status) {
                switch (status) {
                    case 'New':
                        $('#comment').attr('required', false).parent().hide();
                        $('#design').attr('required', false).parent().hide();
                        console.log('new')
                        break;
                    case 'In process':
                        $('#comment').attr('required', true).parent().show();
                        $('#design').attr('required', false).parent().hide();
                        console.log('in process')
                        break;
                    case 'Completed':
                        $('#comment').attr('required', false).parent().hide();
                        $('#design').attr('required', true).parent().show();
                        console.log('completed')
                        break;
                }
            }

            function setAvailableStatuses() {
                var $status = '<?php echo e($request->status); ?>';
                var statuses = {};

                switch ($status) {
                    case 'New':
                        statuses = {
                            'New': 'New',
                            'In process': 'In process',
                            'Completed': 'Completed',
                        }
                        updateAvailableStatuses(statuses);
                        break;
                    case 'In process':
                        statuses = {
                            'In process': 'In process',
                        }
                        updateAvailableStatuses(statuses);
                        break;
                    case 'Completed':
                        statuses = {
                            'Completed': 'Completed',
                        }
                        updateAvailableStatuses(statuses);
                        break;
                }

            }

            function updateAvailableStatuses(statuses) {
                var $el = $("#status");
                $el.empty(); // remove old options
                $.each(statuses, function (key, value) {
                    $el.append($("<option></option>")
                        .attr("value", value).text(key))
                });
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\ws-asia-2021\resources\views/requests/edit.blade.php ENDPATH**/ ?>