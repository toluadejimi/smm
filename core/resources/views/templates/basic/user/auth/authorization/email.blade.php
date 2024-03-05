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
                                <a href="/" class="brand-logo">
                                    <div class="brand-title">
                                        <svg width="121" height="36" viewBox="0 0 121 36" fill="none"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <rect x="13" y="6" width="28" height="28" fill="url(#pattern0)"/>
                                            <path
                                                d="M1.40625 29V7.18182H10.8239C12.4432 7.18182 13.8601 7.50142 15.0746 8.14062C16.2891 8.77983 17.2337 9.67827 17.9084 10.8359C18.5831 11.9936 18.9205 13.3466 18.9205 14.8949C18.9205 16.4574 18.5724 17.8104 17.8764 18.9538C17.1875 20.0973 16.218 20.978 14.968 21.5959C13.7251 22.2138 12.2727 22.5227 10.6108 22.5227H4.9858V17.9205H9.41761C10.1136 17.9205 10.7067 17.7997 11.1967 17.5582C11.6939 17.3097 12.0739 16.9581 12.3366 16.5036C12.6065 16.049 12.7415 15.5128 12.7415 14.8949C12.7415 14.2699 12.6065 13.7372 12.3366 13.2969C12.0739 12.8494 11.6939 12.5085 11.1967 12.2741C10.7067 12.0327 10.1136 11.9119 9.41761 11.9119H7.32955V29H1.40625ZM39.0234 29V7.18182H44.9467V24.2273H53.7678V29H39.0234ZM61.8297 29H55.4377L62.6394 7.18182H70.736L77.9377 29H71.5456L66.7729 13.1903H66.6025L61.8297 29ZM60.6365 20.392H72.6536V24.8239H60.6365V20.392ZM90.9508 14C90.894 13.2898 90.6277 12.7358 90.1518 12.3381C89.6831 11.9403 88.9693 11.7415 88.0105 11.7415C87.3997 11.7415 86.899 11.8161 86.5083 11.9652C86.1248 12.1072 85.8407 12.3026 85.6561 12.5511C85.4714 12.7997 85.3755 13.0838 85.3684 13.4034C85.3542 13.6662 85.4004 13.9041 85.5069 14.1172C85.6206 14.3232 85.7981 14.5114 86.0396 14.6818C86.2811 14.8452 86.59 14.9943 86.9664 15.1293C87.3429 15.2642 87.7903 15.3849 88.3088 15.4915L90.0985 15.875C91.3059 16.1307 92.3393 16.468 93.1987 16.8871C94.0581 17.3061 94.7612 17.7997 95.3081 18.3679C95.8549 18.929 96.2562 19.5611 96.5119 20.2642C96.7747 20.9673 96.9096 21.7344 96.9167 22.5653C96.9096 24 96.551 25.2145 95.8407 26.2088C95.1305 27.2031 94.1149 27.9595 92.7939 28.478C91.4799 28.9964 89.8997 29.2557 88.0531 29.2557C86.1568 29.2557 84.502 28.9751 83.0886 28.4141C81.6824 27.853 80.5886 26.9901 79.8074 25.8253C79.0332 24.6534 78.6426 23.1548 78.6355 21.3295H84.2605C84.296 21.9972 84.4629 22.5582 84.7612 23.0128C85.0595 23.4673 85.4785 23.8118 86.0183 24.0462C86.5652 24.2805 87.215 24.3977 87.9679 24.3977C88.6 24.3977 89.1291 24.3196 89.5552 24.1634C89.9814 24.0071 90.3045 23.7905 90.5247 23.5135C90.7449 23.2365 90.8585 22.9205 90.8656 22.5653C90.8585 22.2315 90.7484 21.9403 90.5353 21.6918C90.3294 21.4361 89.9885 21.2088 89.5126 21.0099C89.0368 20.804 88.394 20.6122 87.5843 20.4347L85.411 19.9659C83.4792 19.5469 81.9558 18.8473 80.8407 17.8672C79.7328 16.88 79.1824 15.5341 79.1895 13.8295C79.1824 12.4446 79.5517 11.2337 80.2974 10.1967C81.0502 9.1527 82.0907 8.33949 83.4189 7.7571C84.7541 7.17472 86.2846 6.88352 88.0105 6.88352C89.7718 6.88352 91.2953 7.17827 92.5808 7.76776C93.8663 8.35724 94.8571 9.18821 95.5531 10.2607C96.2562 11.326 96.6113 12.5724 96.6184 14H90.9508ZM99.1699 29V7.18182H105.093V15.7045H112.934V7.18182H118.857V29H112.934V20.4773H105.093V29H99.1699Z"
                                                fill="#6666FF"/>
                                            <defs>
                                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                                         height="1">
                                                    <use xlink:href="#image0_2592_50"
                                                         transform="translate(0.192946) scale(0.00414938)"/>
                                                </pattern>
                                                <image id="image0_2592_50" width="148" height="241"
                                                       xlink:href="data:image/png;base64,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"/>
                                            </defs>
                                        </svg>


                                    </div>
                                </a>
                            </div>



                            <h4 class="text-center mb-4">Verify your email account</h4>
                            <form action="{{ route('user.verify.email') }}" method="POST" class="submit-form">
                                @csrf


                                <p class="text-center my-4"> Verification code has been sent to {{ showEmailAddress(auth()->user()->email) }}</p>


                                <div class="mb-4 mt-3">

                                    <label>@lang('Enter Code')</label>
                                    <div class="verification-code ">
                                        <input type="text" name="code" id="verification-code" class="form-control"
                                            required autocomplete="off">
                                        <div class="boxes">

                                        </div>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">@lang('Verify')</button>
                                </div>

                                <div class="mb-3">
                                    <p>
                                        @lang('If you don\'t get any code'), <a
                                            href="{{ route('user.send.verify.code', 'email') }}" class="text--base">
                                            @lang('Try again')</a>
                                    </p>


                                    <p class="text--base">@lang('If verification code not found in Inbox, Check your
                                        spam folder.')</p>


                                    @if ($errors->has('resend'))
                                    <small class="text-danger d-block">{{ $errors->first('resend') }}</small>
                                    @endif
                                </div>



                            </form>

                        </div>


                        <hr>

                        <div class="mb-3 p-4">
                            <a href="/user/logout" class="btn btn-warning text-center btn-block">@lang('Log Out')</a>
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


    @push('style')
    <link rel="stylesheet" href="{{ asset('assets/global/css/verification-code.css') }}">
    @endpush

    @push('script')
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
    @endpush



</body>

</html>
