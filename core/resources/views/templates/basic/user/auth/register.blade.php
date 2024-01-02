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
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('')}}/assets/public/assets/images/favicon.png">
    <link href="{{url('')}}/assets/public/assets/vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{url('')}}/assets/public/assets/css/style.css" rel="stylesheet">

</head>

<body>
    <div class="fix-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">

                    @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session()->has('message'))
                    <div class="alert alert-success mb-3">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-danger mb-3">
                        {{ session()->get('error') }}
                    </div>
                    @endif


                    <div class="card mb-0 h-auto">



                        <div class="card-body">



                            <div class="text-center mb-3">
                                <a href="index.html"><img class="logo-auth"
                                        src="{{url('')}}/assets/public/assets/images/loggo.png" height="110" width="250"
                                        alt=""></a>
                            </div>

                            <h4 class="text-center mb-4">Sign in your account</h4>
                            <form action="{{ route('user.register') }}" method="POST">
                                @csrf

                                <div class="form-group mb-4">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" class="form-control" name="username"
                                        value="{{ old('username') }}" required placeholder="@lang('Enter Username')">
                                    <small class="text--danger usernameExist"></small>
                                </div>



                                <div class="mb-sm-4 mb-3 position-relative">
                                    <label class="form-label" for="email-address">Email Address</label>
                                    <input type="email" class="form-control" placeholder="@lang('Your Email')"
                                        name="email" value="{{ old('email') }}" required>
                                </div>


                                <div class="form-group mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="@lang('Password')" required>
                                    @if ($general->secure_password)
                                    <div class="input-popup">
                                        <p class="error lower">@lang('1 small letter minimum')</p>
                                        <p class="error capital">@lang('1 capital letter minimum')</p>
                                        <p class="error number">@lang('1 number minimum')</p>
                                        <p class="error special">@lang('1 special character minimum')</p>
                                        <p class="error minimum">@lang('6 character password')</p>
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label" for="password">Confirm Password</label>
                                    <input type="password" class="form-control form--control"
                                        name="password_confirmation" required placeholder="@lang('Confirm Password')">
                                </div>

                        </div>

                    </div>

                    @if ($general->agree)
                    <div class="form-group form-checkbox my-3 text-center">
                        <input type="checkbox" id="agree" @checked(old('agree')) name="agree" required>
                        <label for="agree">@lang('I agree with')</label>
                        <span class="text--base">
                            <a href="http://mydevhost.com/policy/privacy-and-policy/93">Policy</a>
                        </span>
                    </div>
                    @endif




                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>

                    </form>
                    <div class="new-account mt-3 text-center">
                        <p>Have an account already? <a class="text-primary" href="/user/login">login</a></p>
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
    <script src="{{url('')}}/assets/public/assets/vendor/global/global.min.js"></script>
    <script src="{{url('')}}/assets/public/assets/js/custom.min.js"></script>
    <script src="{{url('')}}/assets/public/assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="{{url('')}}/assets/public/assets/js/dlabnav-init.js"></script>
    <script src="{{url('')}}/assets/public/assets/js/demo.js"></script>
</body>

</html>



@push('style')
<style>
    .country-code .input-group-text {
        background: #fff !important;
    }

    .country-code select {
        border: none;
    }

    .country-code select:focus {
        border: none;
        outline: none;
    }
</style>
@endpush
@if ($general->secure_password)
@push('script-lib')
<script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
@endpush
@endif
@push('script')
<script>
    "use strict";
        (function($) {
            @if ($mobileCode)
                $(`option[data-code={{ $mobileCode }}]`).attr('selected', '');
            @endif
            $('select[name=country]').change(function() {
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            $('.checkUser').on('focusout', function(e) {
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {
                        mobile: mobile,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response.data != false && response.type == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response.data != false) {
                        $(`.${response.type}Exist`).text(`${response.type} already exist`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);
</script>
@endpush
