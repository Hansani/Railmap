<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title>RAIL MAP</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="description" content="RAIL MAP">

    <script>
        document.documentElement.className =
                document.documentElement.className.replace("no-js", "js");
    </script>

    @yield('head')

    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <style>
        body {
            padding-top: 70px;
        }
    </style>

</head>

<body>

@yield('body')


<script src="{{ asset("js/app.js") }}" type="text/javascript"></script>
@yield('scripts')

</body>

</html>