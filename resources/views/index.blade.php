@extends('master')

@section('pagetitle')
INEC | Home
    
@endsection
@section('content')

<div class="container mt-3">
 <div class="row">
  <div class="col-md-6">
   <img  src="{{asset('image/inec.png')}} " class="img-fluid w-100"/>
  </div>
  <div class="col-md-6">
     <h3>Hello Bincom Dev Center, my name is Obiakor Uchechukwu</h3>

     <h2>Welcome to my INEC RESULTS AND ANALYSIS PAGE</h2>
      <p>Here, you can.</p>
     <ul>
      <li>Check al result by polling unit and by party</li>
      <li>Check total results by LGAs</li>
      <li>Add new results by polling units</li>
     </ul>
  </div>
 </div>
</div>



@endsection