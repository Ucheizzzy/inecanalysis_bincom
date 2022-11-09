<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Obiakor Uchechukwu Israel">
    <meta name="description" content="Bincom Dev INEC Technical Analysis">
    <meta name="keywords" content="Bincom Dev Center, INEC, polling unit, lgas, states, wards, party, anounced results">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bincom Dev | Results Page</title>
    <!-- {{-- Bootstrap link --}} -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style type="text/css">
        *,
        ::after,
        ::before {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }
        body {
        font-family: 'Segoe UI', Roboto, Oxygen,
            Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        
        /* color: #F8F9FA; */
        line-height: 1.5;
        font-size: 0.875rem;
        }
        #nav{
            display: flex;
            justify-content: center
        }
    </style>

</head>
<body>
    <!-- {{-- nav heaDER --}} -->
    <header class="container" id="nav">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="{{url('/')}}">INEC-BINCOM</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('polling.results')}}">Polling Unit Results</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('lga.results')}}">Results By LGAs</a>
                        </li>
                    
                        <li class="nav-item">
                        <a class="nav-link" href="#" >New Parties Results</a>
                        </li>
                    </ul>
                    </div>
                
                </nav>
            </div>
        </div>
    </header>

    <main class="container">
     <div class="row">

     <h3 class="text-center mt-3">Welcome to the page where you will find all results based on the polling units of LGA's in Delta State<h1>
      <div class="col-md-12">
        <table class="table">
         <thead>
           <tr>
            <th>S/N</th>
            <th>Polling Unit Name</th>
            <th>Party</th>
            <th>Results</th>
           </tr>
         </thead>
         <tbody>
              @php
                $counter = 1;
            @endphp
           @foreach ($polling_results as $results)
           <tr>
            <td> {{$counter++}}</td>
            <td> {{$results->polling_unit_name}}</td>
            <td> {{$results->party_abbreviation}}</td>
            <td> {{$results->party_score}}</td>
           </tr>
               
           @endforeach
           
         </tbody>
        </table>
      </div>
     </div>
        

     {{-- {{$polling_results->links()}} --}}
    </main>
    
    <!-- {{-- Botstrap js --}} -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            // alert('ready')
        })
    </script>
</body>
</html>