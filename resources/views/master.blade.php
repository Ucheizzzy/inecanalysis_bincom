<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Obiakor Uchechukwu Israel">
    <meta name="description" content="Bincom Dev INEC Technical Analysis">
    <meta name="keywords" content="Bincom Dev Center, INEC, polling unit, lgas, states, wards, party, anounced results">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bincom Dev | @yield('pagetitle')</title>
    {{-- Bootstrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
</head>
<body>
  @include('body.header');

  @yield('content');
    
    {{-- Botstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            // alert('ready')
        })
    </script>
</body>
</html>