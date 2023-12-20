<!DOCTYPE html>
<html lang="en">

<head>
    <!-- PAGE TITLE HERE -->
    <title>PALASH - BEST SMM</title>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Dexignlabs">
    <meta name="robots" content="index, follow">

    <meta name="keywords" content="palash, smm, social media, boost">


    <meta name="description"
        content="Elevate your administrative efficiency and enhance productivity with the Fillow SaaS Admin Dashboard Template. Designed to streamline your tasks, this powerful tool provides a user-friendly interface, robust features, and customizable options, making it the ideal choice for managing your data and operations with ease.">

    <meta property="og:title" content="Fillow : CodeIgniter Saas Admin Dashboard Template | Dexignlabs">
    <meta property="og:description"
        content="Elevate your administrative efficiency and enhance productivity with the Fillow SaaS Admin Dashboard Template. Designed to streamline your tasks, this powerful tool provides a user-friendly interface, robust features, and customizable options, making it the ideal choice for managing your data and operations with ease.">
    <meta property="og:image" content="https://fillow.dexignlab.com/codeigniter/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <meta name="twitter:title" content="Fillow : CodeIgniter Saas Admin Dashboard Template | Dexignlabs">
    <meta name="twitter:description"
        content="Elevate your administrative efficiency and enhance productivity with the Fillow SaaS Admin Dashboard Template. Designed to streamline your tasks, this powerful tool provides a user-friendly interface, robust features, and customizable options, making it the ideal choice for managing your data and operations with ease.">
    <meta name="twitter:image" content="https://fillow.dexignlab.com/codeigniter/social-image.png">
    <meta name="twitter:card" content="summary_large_image">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('')); ?>/assets/public/assets/images/favicon.png">
    <link href="<?php echo e(url('')); ?>/assets/public/assets/vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo e(url('')); ?>/assets/public/assets/css/style.css" rel="stylesheet">

</head>

<body>
    <div class="fix-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">

                    <?php if($errors->any()): ?>
                    <div class="alert alert-danger mb-3">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if(session()->has('message')): ?>
                    <div class="alert alert-success mb-3">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(session()->has('error')): ?>
                    <div class="alert alert-danger mb-3">
                        <?php echo e(session()->get('error')); ?>

                    </div>
                    <?php endif; ?>


                    <div class="card mb-0 h-auto">



                        <div class="card-body">



                            <div class="text-center mb-3">
                                <a href="index.html"><img class="logo-auth"
                                        src="<?php echo e(url('')); ?>/assets/public/assets/images/loggo.png" height="110" width="250"
                                        alt=""></a>
                            </div>

                            <h4 class="text-center mb-4">Sign in your account</h4>
                            <form action="<?php echo e(route('user.verify.email')); ?>" method="POST" class="submit-form">
                                <?php echo csrf_field(); ?>


                                <p class="text-center my-4"> Verification code has been sent to <?php echo e(showEmailAddress(auth()->user()->email)); ?></p>


                                <div class="mb-4 mt-3">

                                    <label><?php echo app('translator')->get('Enter Code'); ?></label>
                                    <div class="verification-code ">
                                        <input type="text" name="code" id="verification-code" class="form-control"
                                            required autocomplete="off">
                                        <div class="boxes">
                                           
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-block"><?php echo app('translator')->get('Verify'); ?></button>
                                </div>

                                <div class="mb-3">
                                    <p>
                                        <?php echo app('translator')->get('If you don\'t get any code'); ?>, <a
                                            href="<?php echo e(route('user.send.verify.code', 'email')); ?>" class="text--base">
                                            <?php echo app('translator')->get('Try again'); ?></a>
                                    </p>


                                    <p class="text--base"><?php echo app('translator')->get('If verification code not found in Inbox, Check your
                                        spam folder.'); ?></p>


                                    <?php if($errors->has('resend')): ?>
                                    <small class="text-danger d-block"><?php echo e($errors->first('resend')); ?></small>
                                    <?php endif; ?>
                                </div>



                            </form>

                        </div>


                        <hr>

                        <div class="mb-3 p-4">
                            <a href="/user/logout" class="btn btn-warning text-center btn-block"><?php echo app('translator')->get('Log Out'); ?></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
	Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo e(url('')); ?>/assets/public/assets/vendor/global/global.min.js"></script>
    <script src="<?php echo e(url('')); ?>/assets/public/assets/js/custom.min.js"></script>
    <script src="<?php echo e(url('')); ?>/assets/public/assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="<?php echo e(url('')); ?>/assets/public/assets/js/dlabnav-init.js"></script>
    <script src="<?php echo e(url('')); ?>/assets/public/assets/js/demo.js"></script>


    <?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/verification-code.css')); ?>">
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('script'); ?>
    <script>
        $('#verification-code').on('input', function() {
            $(this).val(function(i, val) {
                if (val.length >= 6) {
                    $('.submit-form').find('button[type=submit]').html(
                        '<i class="las la-spinner fa-spin"></i>');
                    $('.submit-form').submit()
                }
                if (val.length > 6) {
                    return val.substring(0, val.length - 1);
                }
                return val;
            });
            for (let index = $(this).val().length; index >= 0; index--) {
                $($('.boxes span')[index]).html('');
            }
        });
    </script>
    <?php $__env->stopPush(); ?>



</body>

</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/smm/core/resources/views/templates/basic/user/auth/authorization/email.blade.php ENDPATH**/ ?>