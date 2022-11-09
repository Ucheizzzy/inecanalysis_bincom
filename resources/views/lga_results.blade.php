@extends('master')

@section('pagetitle')
LGA Polling Unit Results
    
@endsection
@section('content')


 <section class="container">
      <h3 class="text-center mt-3 mb-3">Select a Local Government to see the total results for a specific polling unit<h1>
     <div class="row">

      <div class="col-md-4">
       <select class="form-select" name="lga" id="lga">
        <option value="" > Select LGA</option>
        @foreach ($lgas as $lga)
           <option value="{{$lga->lga_id}}">{{$lga->lga_name}}</option>
        @endforeach
       
       </select>
      </div>
      <div class="col-md-4">
        <select class="form-select" name="polling_unit" id="polling-unit">
        <option value=""  disabled="" selected="" > Select Polling Unit</option>
       </select>
      </div>
      <div class="col-md-4">
       <h3>Total Results: <span id="results"></span></h3>
      </div>
     
     </div>
        

     {{-- {{$polling_results->links()}} --}}
    </section>
    
    <!-- {{-- Botstrap js --}} -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function() {
       // alert('born ready');
        $('select[name="lga"]').on('change', function(){ 
           // alert('changed')
             var lga = $(this).val();
             // console.log(lga);
            if(lga) {
                $.ajax({
                    url: "{{  url('/lgas/polling_unit/ajax') }}/"+lga,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="polling_unit"]').html('');
                       $('select[name="polling_unit"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="polling_unit"]').append('<option value="'+ value.polling_unit_id +'">' + value.polling_unit_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });

          $('select[name="polling_unit"]').on('change', function(){
            var polling = $(this).val();
            // alert(polling)
            if(polling) {
                $.ajax({
                    url: "{{url('/results/polling_unit/ajax') }}/"+polling,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('#results').empty();
                          $.each(data, function(key, value){
                            // console.log(value);
                            if(value.count == null){
                                $('#results').html('<p style="color:red">N/A</p>');
                            }else{
                                 $('#results').html('<p value="'+ value.result_id +'">' + value.count + '</p>');
                            }
                               
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 

    });
    </script>
    
@endsection


   
