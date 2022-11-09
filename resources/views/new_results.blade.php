@extends('master')

@section('pagetitle')
Register New Results By Party
    
@endsection
@section('content')

  <section class="container">

   <h3>Add New Results</h3>
   <div class="row">
    <div class="col-md-12 justify-content-center w-50">
     
      <form method="post" action="{{route('store.result')}}">
       @csrf
       <div class="form-group">
         <h5>Select Polling Unit</h5>
       <select class="form-select" name="pol" id="pol">
        <option value="" > Select Polling Unit</option>
        @foreach ($pol_name as $pol)
         @if ($pol->polling_unit_id === 0)
             <option value="{{$pol->polling_unit_id }}">N/A</option>
         @else
              <option value="{{$pol->polling_unit_id }}">{{$pol->polling_unit_name}}</option>
         @endif
          
        @endforeach
       </select>

          @error('pol') 
      <span class="text-danger"><em>{{ $message }} </em></span>
      @enderror
      </div>

      <div class="form-group  mt-5">
        <h5>Select Party</h5>
       <select class="form-select" name="party" id="party">
        <option value="" > Select Party</option>
        @foreach ($parties as $party)
            <option value="{{$party->partyid }}">{{$party->partyname}}</option> 
        @endforeach
       </select>
       @error('party') 
      <span class="text-danger"><em>{{ $message }} </em></span>
      @enderror 
      </div>

     <div class="form-group mt-5">
      <h4>Enter Result</h4>
        <input  type="text" name="result" id ="result"class="form-control"/>
          @error('result') 
      <span class="text-danger"><em>{{ $message }} </em></span>
      @enderror
     </div>

     <button class="btn btn-primary rounded-pill px-5 w-50 mt-5">Submit</button>
    </form>
    </div>
   </div>
  </section>


@endsection