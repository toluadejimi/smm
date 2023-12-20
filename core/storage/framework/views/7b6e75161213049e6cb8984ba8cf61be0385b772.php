<?php $__env->startSection('content'); ?>


<div class="content-body default-height">
    <div class="container-fluid">


        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="user/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Support Ticket</a></li>
            </ol>
        </div>


        <div class="card">
            <div class="card-body">

                <a href="<?php echo e(route('ticket.open')); ?>" class="btn btn-sm btn-outline-primary mb-2"> <i
                    class="las la-plus"></i>
                <?php echo app('translator')->get('New Ticket'); ?></a>

            </div>
        </div>

        <div class="row ">




            <div class="col-md-12">
                <div class="card b-radius--10">
                    <div class="card-body p-0">
                        <div class="table-responsive--sm table-responsive">
                            <table class="table table--light style--two">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('Subject'); ?></th>
                                        <th><?php echo app('translator')->get('Status'); ?></th>
                                        <th><?php echo app('translator')->get('Priority'); ?></th>
                                        <th><?php echo app('translator')->get('Last Reply'); ?></th>
                                        <th><?php echo app('translator')->get('Action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="break_line">
                                            <a href="<?php echo e(route('ticket.view', $support->ticket)); ?>" class="fw-bold">
                                                [<?php echo app('translator')->get('Ticket'); ?>#<?php echo e($support->ticket); ?>] <?php echo e(__($support->subject)); ?>

                                            </a>
                                        </td>
                                        <td>
                                            <?php echo $support->statusBadge; ?>
                                        </td>
                                        <td>
                                            <?php if($support->priority == Status::PRIORITY_LOW): ?>
                                            <span class="badge badge--dark"><?php echo app('translator')->get('Low'); ?></span>
                                            <?php elseif($support->priority == Status::PRIORITY_MEDIUM): ?>
                                            <span class="badge badge--success"><?php echo app('translator')->get('Medium'); ?></span>
                                            <?php elseif($support->priority == Status::PRIORITY_HIGH): ?>
                                            <span class="badge badge--primary"><?php echo app('translator')->get('High'); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(\Carbon\Carbon::parse($support->last_reply)->diffForHumans()); ?> </td>

                                        <td>
                                            <a href="<?php echo e(route('ticket.view', $support->ticket)); ?>"
                                                class="btn btn-outline--primary btn-sm">
                                                <i class="fa fa-desktop"></i> <?php echo app('translator')->get('Details'); ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="100%" class="text-center"><?php echo e(__($emptyMessage)); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if($supports->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo paginateLinks($supports) ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('breadcrumb-plugins'); ?>
<a href="<?php echo e(route('ticket.open')); ?>" class="btn btn-sm btn-outline--primary mb-2"> <i class="las la-plus"></i>
    <?php echo app('translator')->get('New Ticket'); ?></a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
<style>
    .break_line {
        white-space: initial !important;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.mainuser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/smm/core/resources/views/templates/basic/user/support/index.blade.php ENDPATH**/ ?>