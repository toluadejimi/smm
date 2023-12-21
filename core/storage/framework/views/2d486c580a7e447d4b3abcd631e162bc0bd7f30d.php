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


    <meta name="description" content="Elevate your administrative efficiency and enhance productivity with the Fillow SaaS Admin Dashboard Template. Designed to streamline your tasks, this powerful tool provides a user-friendly interface, robust features, and customizable options, making it the ideal choice for managing your data and operations with ease.">

    <meta property="og:title" content="Fillow : CodeIgniter Saas Admin Dashboard Template | Dexignlabs">
    <meta property="og:description" content="Elevate your administrative efficiency and enhance productivity with the Fillow SaaS Admin Dashboard Template. Designed to streamline your tasks, this powerful tool provides a user-friendly interface, robust features, and customizable options, making it the ideal choice for managing your data and operations with ease.">
    <meta property="og:image" content="https://fillow.dexignlab.com/codeigniter/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <meta name="twitter:title" content="Fillow : CodeIgniter Saas Admin Dashboard Template | Dexignlabs">
    <meta name="twitter:description" content="Elevate your administrative efficiency and enhance productivity with the Fillow SaaS Admin Dashboard Template. Designed to streamline your tasks, this powerful tool provides a user-friendly interface, robust features, and customizable options, making it the ideal choice for managing your data and operations with ease.">
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
                                <a href="/"><img class="logo-auth" src="<?php echo e(url('')); ?>/assets/public/assets/images/loggo.png" height="110" width="250" alt=""></a>
                            </div>

                            <h4 class="text-center mb-4">Sign in your account</h4>
                            <form class="create-account-form register-form verify-gcaptcha" method="POST"
                            action="<?php echo e(route('user.login')); ?>">
                            <?php echo csrf_field(); ?>



                                <div class="form-group mb-4">
                                    <label class="form-label" for="username">Username or Email</label>
                                    <input type="text" class="form-control" placeholder="Enter username" id="username"
                                    value="<?php echo e(old('username')); ?>" name="username" placeholder="<?php echo app('translator')->get('Username or Email'); ?>" required >
                                </div>
                                <div class="mb-sm-4 mb-3 position-relative">
                                    <label class="form-label" for="dlab-password">Password</label>
                                    <input type="password" id="dlab-password"  class="form-control" name="password"
                                    required autocomplete="current-password" placeholder="<?php echo app('translator')->get('Password'); ?>">
                                    <span class="show-pass eye">
                                        <i class="fa fa-eye-slash"></i>
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                                <div class="form-row d-flex flex-wrap justify-content-between mb-2">
                                    <div class="form-group mb-sm-4 mb-1">
                                        <div class="form-check custom-checkbox ms-1">
                                            <input type="checkbox" class="form-check-input" id="basic_checkbox_1" name="remember" id="remember"
                                            <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
                                        </div>
                                    </div>
                                    <div class="form-group ms-2">
                                        <a href="<?php echo e(route('user.password.request')); ?>"><?php echo app('translator')->get('Forgot Password?'); ?></a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                </div>

                        </form>
                            <div class="new-account mt-3">
                                <p>Don't have an account? <a class="text-primary" href="/user/register">Sign up</a></p>
                            </div>
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
</body>
</html>


<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/smm/core/resources/views/templates/basic/user/auth/login.blade.php ENDPATH**/ ?>