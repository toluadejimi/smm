<?php $__env->startSection('content'); ?>
    <section class="register-section ptb-80">
        <div class="register-element-one">
            <img src="<?php echo e(asset($activeTemplateTrue . 'images/round.png')); ?>" alt="<?php echo app('translator')->get('shape'); ?>">
        </div>
        <div class="container">
            <figure class="figure highlight-background highlight-background--lean-left">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1439px"
                    height="480px">
                    <defs>
                        <linearGradient id="PSgrad_1" x1="42.262%" x2="0%" y1="90.631%" y2="0%">
                            <stop offset="28%" stop-color="rgb(245,246,252)" stop-opacity="1" />
                            <stop offset="100%" stop-color="rgb(255,255,255)" stop-opacity="1" />
                        </linearGradient>

                    </defs>
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                        d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                    <path fill="url(#PSgrad_1)"
                        d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                </svg>
            </figure>
            <div class="d-flex justify-content-center">
                <div class="verification-code-wrapper verify-form">
                    <div class="verification-area">
                        <form action="<?php echo e(route('user.password.verify.code')); ?>" method="POST" class="submit-form">
                            <?php echo csrf_field(); ?>
                            <p class="verification-text"><?php echo app('translator')->get('A 6 digit verification code sent to your email address'); ?> : <?php echo e(showEmailAddress($email)); ?></p>
                            <input type="hidden" name="email" value="<?php echo e($email); ?>">

                            <?php echo $__env->make($activeTemplate . 'partials.verification_code', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="form-group">
                                <button type="submit" class="btn btn--base w-100"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>

                            <div class="form-group">
                                <?php echo app('translator')->get('Please check including your Junk/Spam Folder. if not found, you can'); ?>
                                <a href="<?php echo e(route('user.password.request')); ?>" class="text--base"><?php echo app('translator')->get('Try to send again'); ?></a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .verification-code-wrapper {
            z-index: 100
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/smm/core/resources/views/templates/basic/user/auth/passwords/code_verify.blade.php ENDPATH**/ ?>