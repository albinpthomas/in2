<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Datepicker - Restrict date range</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

</head>

<body>

    <p>Date: <input type="text" id="km"></p>


</body>

</html>
<script>
    $(function() {
        $("#km").datepicker({
            minDate: 0,
            changeMonth: true,
            changeYear: true,
            yearRange: 'c-10:c+15'
        });
    });
</script>