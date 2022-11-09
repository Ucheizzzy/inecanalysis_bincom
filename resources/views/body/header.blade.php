  {{-- nav heaDER --}}
    <header class="container" id="nav">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{url('/')}}" style="margin-right: 200px">INEC-BINCOM</a>
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
                        <a class="nav-link" href="{{route('new_results')}}" >New Parties Results</a>
                        </li>
                    </ul>
                    </div>
                
                </nav>
            </div>
        </div>
    </header>