<?php $__env->startSection('content'); ?>



<div class="content-body default-height">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="user/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Funding History</a></li>
            </ol>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-8 col-md-12 col-sm-12 my-3">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-form','data' => ['placeholder' => 'Search by Trx']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Search by Trx']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    <div class="col-xl-4 col-md-12 col-sm-12 my-3">
                        <a href="<?php echo e(route('user.deposit.index')); ?>" class="btn btn-primary btn-block">
                            <i class="las la-plus"></i>
                            <?php echo app('translator')->get('Deposit Now'); ?>
                        </a>
                    </div>

                </div>
            </div>
        </div>










        <div class="row">
            <div class="col-md-12">

                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if(session()->has('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session()->get('message')); ?>

                </div>
                <?php endif; ?>
                <?php if(session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session()->get('error')); ?>

                </div>
                <?php endif; ?>

                <div class="card b-dadius--10">
                    <div class="card-body p-0">

                        <div class="table-responsive--sm table-responsive">
                            <table class="table table--light style--two">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('Gateway | Transaction'); ?></th>
                                        <th class="text-center"><?php echo app('translator')->get('Initiated'); ?></th>
                                        <th class="text-center"><?php echo app('translator')->get('Amount'); ?></th>
                                        <th class="text-center"><?php echo app('translator')->get('Status'); ?></th>
                                        <th class="text-center"><?php echo app('translator')->get('Action'); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = @$deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>


                                        <div class="modal fade" id="exampleModal<?php echo e($deposit->id); ?>" tabindex=""
                                            aria-labelledby="exampleModalLabel" data-backdrop="false"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Resolve Deposit
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>


                                                    <div class="modal-body">


                                                        <p>Resolve pending transactions by using your bank session ID /
                                                            Refrence
                                                            No on your transaction recepit</p>

                                                        <form action="/user/session-resolve" method="POST">
                                                            <?php echo csrf_field(); ?>

                                                            <label class="">Transaction ID</label>

                                                            <div>
                                                                <?php echo e($deposit->trx); ?>


                                                            </div>


                                                            <label class="my-3">Enter Session ID</label>
                                                            <div>
                                                                <input type="text" name="session_id" required
                                                                    class="form-control" placeholder="Enter session ID">

                                                                <input type="text" hidden name="order_id"
                                                                    value="<?php echo e($deposit->trx); ?>">

                                                            </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Verify</button>
                                                    </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>






                                        <td>
                                            <span class="fw-bold"> <span class="text-primary"><?php echo e(__($deposit->gateway?->name)); ?></span>
                                            </span>
                                            <br>
                                            <small> <?php echo e($deposit->trx); ?> </small>
                                        </td>

                                        <td class="text-center">
                                            <?php echo e(showDateTime($deposit->created_at)); ?><br><?php echo e(diffForHumans($deposit->created_at)); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($deposit->amount)); ?> + <span
                                                class="text--danger" title="<?php echo app('translator')->get('charge'); ?>"><?php echo e(showAmount($deposit->charge)); ?>

                                            </span>
                                            <br>
                                            <strong title="<?php echo app('translator')->get('Amount with charge'); ?>">
                                                <?php echo e(showAmount($deposit->amount + $deposit->charge)); ?>

                                                <?php echo e(__($general->cur_text)); ?>

                                            </strong>
                                        </td>

                                        <td class="text-center">
                                            <?php echo $deposit->statusBadge ?>
                                        </td>
                                        <?php
                                        $details = $deposit->detail != null ? json_encode($deposit->detail) : null;
                                        ?>

                                        <?php if($deposit->status == 2): ?>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal<?php echo e($deposit->id); ?>"
                                                class="btn btn-warning">
                                                <i class="las la-coin"></i>
                                                <?php echo app('translator')->get('Resolve Deposit'); ?>
                                            </a>
                                        </td>



                                        <?php elseif($deposit->status == 1): ?>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm">
                                                <i class="las la-bank"></i>
                                                <?php echo app('translator')->get('Transaction Completed'); ?>
                                            </a>
                                        </td>

                                        <?php elseif($deposit->status == 5): ?>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm">
                                                <i class="las la-bank"></i>
                                                <?php echo app('translator')->get('Reslove Completed'); ?>
                                            </a>
                                        </td>
                                        <?php endif; ?>




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
                    <?php if($deposits->hasPages()): ?>
                    <div class="card-footer">
                        <?php echo e($deposits->links()); ?>

                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        




    </div>
</div>
<?php $__env->stopSection(); ?>









<?php $__env->startPush('script'); ?>
<script>
    (function($) {
            "use strict";
            $('.detailBtn').on('click', function() {
                var modal = $('#detailModal');

                var userData = $(this).data('info');
                var html = '';
                if (userData) {
                    userData.forEach(element => {
                        if (element.type != 'file') {
                            html += `
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>${element.name}</span>
                                <span">${element.value}</span>
                            </li>`;
                        }
                    });
                }

                modal.find('.userData').html(html);

                if ($(this).data('admin_feedback') != undefined) {
                    var adminFeedback = `
                        <div class="my-3">
                            <strong><?php echo app('translator')->get('Admin Feedback'); ?></strong>
                            <p>${$(this).data('admin_feedback')}</p>
                        </div>
                    `;
                } else {
                    var adminFeedback = '';
                }
                modal.find('.feedback').html(adminFeedback);
                modal.modal('show');
            });
        })(jQuery);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.mainuser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/smm/core/resources/views/templates/basic/user/deposit_history.blade.php ENDPATH**/ ?>