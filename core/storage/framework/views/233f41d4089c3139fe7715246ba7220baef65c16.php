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
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="common-form-style bg-one">

                        <h4>
                            <?php echo app('translator')->get('To recover your account please provide your email or username to find your account.'); ?>
                        </h4>
                        <form method="POST" action="<?php echo e(route('user.password.email')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Email or Username'); ?></label>
                                <input type="text" class="form-control form--control" name="value"
                                    value="<?php echo e(old('value')); ?>" required autofocus="off" placeholder="<?php echo app('translator')->get('Username or Email'); ?>">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn--base w-100 mt-3"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/smm/core/resources/views/templates/basic/user/auth/passwords/email.blade.php ENDPATH**/ ?>