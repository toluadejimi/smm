<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $general->siteName($pageTitle ?? '') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{ getImage(getFilePath('logoIcon') . '/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('')}}/assets/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('')}}/assets/viseradmin/css/vendor/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/global/css/all.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/global/css/line-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @stack('style-lib')

    <link rel="stylesheet" href="{{ url('') }}/assets/viseradmin/css/vendor/select2.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/viseradmin/css/app.css">


    @stack('style')
</head>

<body>
    @yield('content')
    <script src="{{ url('') }}/assets/global/js/jquery-3.6.0.min.js"></script>
    <script src="{{ url('') }}/assets/global/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') }}/assets/viseradmin/js/vendor/bootstrap-toggle.min.js"></script>
    <script src="{{ url('s') }}/assets/viseradmin/js/vendor/jquery.slimscroll.min.j"></script>


    @include('partials.notify')
    @stack('script-lib')

    <script src="{{ url('') }}/assets/viseradmin/js/nicEdit.js">

    <script src="{{ url('') }}/assets/viseradmin/js/vendor/select2.min.js"></script>
    <script src="{{ url('') }}/assets/viseradmin/js/app.js"></script>

    {{-- LOAD NIC EDIT --}}
    <script>
        "use strict";
        bkLib.onDomLoaded(function() {
            $(".nicEdit").each(function(index) {
                $(this).attr("id", "nicEditor" + index);
                new nicEditor({
                    fullPanel: true
                }).panelInstance('nicEditor' + index, {
                    hasPanel: true
                });
            });
        });
        (function($) {
            $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain', function() {
                $('.nicEdit-main').focus();
            });
        })(jQuery);
    </script>

    @stack('script')


</body>

</html>
