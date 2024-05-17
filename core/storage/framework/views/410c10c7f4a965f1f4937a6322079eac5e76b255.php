<?php $__env->startSection('content'); ?>

<div class="content-body default-height">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card tryal-gradient">
                                    <div class="card-body tryal row">
                                        <div class="col-xl-7 col-sm-7">
                                            <h2 class="mb-0"> Hi, <?php echo e(Auth::user()->username); ?></h2>
                                            <span>Get Amazing prices on all our products.
                                            </span>
                                            <a href="service" class="btn btn-rounded">Explore Services</a>
                                        </div>
                                        <div class="col-xl-5 col-sm-5 ">
                                            <img src="<?php echo e(url('')); ?>/assets/public/assets/images/chart.png" alt="" class="sd-shape">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body card-padding d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h4 class="mb-3 text-nowrap">Balance</h4>
                                                    <div class="d-flex align-items-center">
                                                        <h2 class=""><?php echo e($general->cur_sym); ?><?php echo e(showAmount($widget['balance'])); ?></h2>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body card-padding d-flex align-items-center justify-content-between">
                                                <div class="w-75">
                                                    <h4 class="mb-3 text-nowrap">Total Spent</h4>
                                                    <div class="d-flex align-items-center">
                                                        <h2 class=""><?php echo e($general->cur_sym); ?><?php echo e(showAmount($widget['balance'])); ?></h2>

                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex px-4  justify-content-between">

                                                <div>
                                                    <div class="">
                                                        <h2 class="fs-32 font-w700 counter"><?php echo e($widget['total_transaction']); ?></h2>
                                                        <a class="mb-0 text-nowrap "
                                                            href="<?php echo e(route('user.transactions')); ?>">Total
                                                            Transaction</a>
                                                    </div>
                                                </div>
                                                <div id="NewCustomers"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex px-4  justify-content-between">
                                                <div>
                                                    <div class="">


                                                        <h2 class="fs-32 font-w700 counter"><?php echo e($widget['total_transaction']); ?></h2>
                                                        <a class="mb-0 text-nowrap "
                                                            href="<?php echo e(route('user.transactions')); ?>">Total Deposit</a>

                                                    </div>
                                                </div>
                                                <div id="NewCustomers1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0 flex-wrap">
                                <h4 class="card-title">Recent Orders</h4>

                            </div>


                            <div class="card b-radius--10">
                                <div class="card-body p-0">
                                    <div class="table-responsive--sm table-responsive">
                                        <table class="table--light style--two table">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('Trx'); ?></th>
                                                    <th><?php echo app('translator')->get('Transacted'); ?></th>
                                                    <th><?php echo app('translator')->get('Amount'); ?></th>
                                                    <th><?php echo app('translator')->get('Post Balance'); ?></th>
                                                    <th><?php echo app('translator')->get('Detail'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td>
                                                        <strong><?php echo e($trx->trx); ?></strong>
                                                    </td>
                
                                                    <td>
                                                        <?php echo e(showDateTime($trx->created_at)); ?><br><?php echo e(diffForHumans($trx->created_at)); ?>

                                                    </td>
                
                                                    <td class="budget">
                                                        <span
                                                            class="fw-bold <?php if($trx->trx_type == '+'): ?> text-success <?php else: ?> text-danger <?php endif; ?>">
                                                            <?php echo e($trx->trx_type); ?> <?php echo e(showAmount($trx->amount)); ?>

                                                            <?php echo e($general->cur_text); ?>

                                                        </span>
                                                    </td>
                
                                                    <td class="budget">
                                                        <?php echo e(showAmount($trx->post_balance)); ?> <?php echo e(__($general->cur_text)); ?>

                                                    </td>
                
                                                    <td class="break_line"><?php echo e(__($trx->details)); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?>

                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if($transactions->hasPages()): ?>
                                <div class="card-footer">
                                    <?php echo e($transactions->links()); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="<?php echo e($whatsapp_link); ?>" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make($activeTemplate . 'layouts.mainuser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/smm/core/resources/views/templates/basic/user/dashboard.blade.php ENDPATH**/ ?>