<?php $__env->startSection('content'); ?>


<div class="content-body default-height">
    <div class="container-fluid">


        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="user/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Create Ticket</a></a></li>
            </ol>
        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card custom--card">
                <div class="card-body">
                    <form action="<?php echo e(route('ticket.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label"><?php echo app('translator')->get('Name'); ?></label>
                                <input type="text" name="name"
                                    value="<?php echo e(@$user->firstname . ' ' . @$user->lastname); ?>"
                                    class="form-control form--control" required readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label"><?php echo app('translator')->get('Email Address'); ?></label>
                                <input type="email" name="email" value="<?php echo e(@$user->email); ?>"
                                    class="form-control form--control" required readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label"><?php echo app('translator')->get('Subject'); ?></label>
                                <input type="text" name="subject" value="<?php echo e(old('subject')); ?>"
                                    class="form-control form--control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label"><?php echo app('translator')->get('Priority'); ?></label>
                                <select name="priority" class="form-control form--control" required>
                                    <option value="3"><?php echo app('translator')->get('High'); ?></option>
                                    <option value="2"><?php echo app('translator')->get('Medium'); ?></option>
                                    <option value="1"><?php echo app('translator')->get('Low'); ?></option>
                                </select>
                            </div>
                            <div class="col-12 form-group">
                                <label class="form-label"><?php echo app('translator')->get('Message'); ?></label>
                                <textarea name="message" id="inputMessage" rows="6" class="form-control form--control" required><?php echo e(old('message')); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-end">
                                <button type="button" class="btn btn-primary btn-sm addFile">
                                    <i class="las la-plus"></i> <?php echo app('translator')->get('Add New'); ?>
                                </button>
                            </div>
                            <div class="file-upload">
                                <label class="form-label"><?php echo app('translator')->get('Attachments'); ?></label> <small
                                    class="text--danger"><?php echo app('translator')->get('Max 5 files can be uploaded'); ?>. <?php echo app('translator')->get('Maximum upload size is'); ?>
                                    <?php echo e(ini_get('upload_max_filesize')); ?></small>
                                <input type="file" name="attachments[]" id="inputAttachments"
                                    class="form-control form--control mb-2" />
                                <div id="fileUploadsContainer"></div>
                                <p class="ticket-attachments-message text-muted">
                                    <?php echo app('translator')->get('Allowed File Extensions'); ?>: .<?php echo app('translator')->get('jpg'); ?>, .<?php echo app('translator')->get('jpeg'); ?>, .<?php echo app('translator')->get('png'); ?>,
                                    .<?php echo app('translator')->get('pdf'); ?>, .<?php echo app('translator')->get('doc'); ?>, .<?php echo app('translator')->get('docx'); ?>
                                </p>
                            </div>

                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary w-100" type="submit"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <div class="d-flex flex-wrap justify-content-end gap-2 align-items-center">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.back','data' => ['route' => ''.e(route('ticket.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => ''.e(route('ticket.index')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .input-group-text:focus {
            box-shadow: none !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            var fileAdded = 0;
            $('.addFile').on('click', function() {
                if (fileAdded >= 4) {
                    notify('error', 'You\'ve added maximum number of file');
                    return false;
                }
                fileAdded++;
                $("#fileUploadsContainer").append(`
                    <div class="input-group my-3">
                        <input type="file" name="attachments[]" class="form-control form--control" required />
                        <button type="button" class="input-group-text btn--danger remove-btn"><i class="las la-times"></i></button>
                    </div>
                `)
            });
            $(document).on('click', '.remove-btn', function() {
                fileAdded--;
                $(this).closest('.input-group').remove();
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.mainuser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/smm/core/resources/views/templates/basic/user/support/create.blade.php ENDPATH**/ ?>