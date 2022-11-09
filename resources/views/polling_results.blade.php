@extends('master')

@section('pagetitle')
Polling Unit Results By Party
    
@endsection
@section('content')

    <section class="container">
     <div class="row">

     <h3 class="text-center mt-3">Welcome to the page where you will find all results based on the polling units of LGA's in Delta State</h3>
      <div class="col-md-12">
        <table class="table table-bordered table-stripped fs-100">
         <thead class="bg-success text-white">
           <tr>
            <th>S/N</th>
            <th>Polling Unit Name</th>
            <th>Party</th>
            <th>Results</th>
           </tr>
         </thead>
         <tbody >
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
    </section>
    
    <!-- {{-- Botstrap js --}} -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            // alert('ready')
        })
    </script>
@endsection