<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{site()->name}}</title>
    <base href="/">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

</head>
<body>
<app-root>Loading...</app-root>


@foreach(site()->scripts() as $script )
    <script type="text/javascript" src="/{{$script}}"></script>
@endforeach

</body>
</html>
