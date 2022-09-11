<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Physics With Alaadin</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- custom css file link  -->
    {{--    <link rel="stylesheet" href="css/style.css">--}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
@yield('content')

<!-- custom js file link  -->
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>