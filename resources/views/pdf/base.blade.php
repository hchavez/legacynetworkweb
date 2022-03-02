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
        /** Global CSS */
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        *::before,
        *::after {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        body {
            line-height: 1.3em;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            color: #333;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
        }

        h1 { font-size: 24px; }
        h2 { font-size: 22px; }
        h3 { font-size: 18px; }
        h4 { font-size: 16px; }
        h5 { font-size: 12px; }
        h6 { font-size: 10px; }

        p {
            margin-top: 0;
            margin-bottom: 5px;
        }

        img {
            margin-bottom: 15px;
        }

        a {
            color: inherit;
            text-decoration: underline;
        }

        strong { color: #000; }

        table {
            width: 100%;
        }

        .page-break {
            page-break-after: always;
        }

        .text-center { text-align: center; }
        .text-left   { text-align: left; }
        .text-right  { text-align: right; }

        .clearfix {
            clear: both;
        }

        .container {
            margin-left: auto;
            margin-right: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        .row {
            clear: both;
            margin-left: -15px;
            margin-right: -15px;
        }

        [class^="col-"] {
            float: left;
        }

        .col-1-4 { width: 25%; }
        .col-1-3 { width: 33.3333%; }
        .col-1-2 { width: 50%; }
        .col-2-3 { width: 66.6666%; }
        .col-3-4 { width: 75%; }


    </style>
</head>

<body>

<?php echo $child; ?>

<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_text(550, 15, "Page: {PAGE_NUM} of {PAGE_COUNT}", 'arial', 8, array(0,0,0));
    }
</script>
</body>
</html>
