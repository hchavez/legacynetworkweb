<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>
    <style>
        .page-break {
            page-break-after: always;
        }
        body {
            padding: 0;
            margin: 0;
            font-family: "Courier New", Courier, monospace;
        }
        html {
            padding: 0;
            margin: 0
        }
        .page_1 {
            background-image: url("{{ url('/') . 'files/Getting Started Form_Page_1-3.jpg' }}");
            height: 1000px;
            position: relative;
            font-size: 12px;
        }

        .page_1 p {
            position: absolute;
            left: 52px;
        }

        .page_1 p span {
            position: absolute;
        }

        .page_2 {
            background-image: url("{{ url('/') . 'files/Getting Started Form_Page_2-3.jpg' }}");
            height: 1000px;
        }
    </style>
</head>

<body class="sac">
{{--{{ dd(url( asset('files/Getting Started Form_Page_1.jpg'))) }}--}}
<?php echo $child; ?>

</body>
</html>
