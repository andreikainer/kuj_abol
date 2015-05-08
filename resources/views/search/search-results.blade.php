@extends('app')

@section('content')
<!-- Main content -->
        <div class="container-fluid" role="main">

<!-- Current projects -->
            <div class="row">

                <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em">
                    <h2 class="heading" id="contribute">Search results</h2>
                </div>

            </div>

    @if($message !== '')

    	 {{ $message }}
    @else

        <!-- search results for projects -->
        @foreach($projects_results as $result)
            {{ $result->id }}
        @endforeach


    @endif


@endsection




@section('additional_js')

@endsection