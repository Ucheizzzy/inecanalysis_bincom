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
      <h3 class="text-center mt-3 mb-3">Select a Local Government to see the total results for a specific polling unit<h1>
     <div class="row">

      <div class="col-md-4">
       <select class="form-select">
        <option value="" name="lga" id="lga"> Select LGA</option>
        @foreach ($lgas as $lga)
           <option value="{{$lga->lga_id}}">{{$lga->lga_name}}</option>
        @endforeach
       
       </select>
      </div>
      <div class="col-md-4">
        <select class="form-select">
        <option value="" name="polling_unit" id="polling-unit" disabled="" > Select Polling Unit</option>
       </select>
      </div>
      <div class="col-md-4">
       <h3>Total Results:</h3>
      </div>
     
     </div>
        

     {{-- {{$polling_results->links()}} --}}
    </main>
    
    <!-- {{-- Botstrap js --}} -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="subsubcategory_id"]').html('');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });

    });
    </script>
</body>
</html>