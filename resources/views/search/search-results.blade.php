@extends('app')

@section('content')

    @if($message->exist())

    	 echo $message;
    @else
    	show the results


        {{--search results for projects--}}
        @foreach($projects_results as $result)

        	$id = $result->id;
        	echo $id . "<br>";
        @endforeach

        {{--search results for blog’s posts--}}
        @foreach($posts_results as $result)

        	$id = $result->id;
        	echo 'Other results for you search: ' . $id . "<br>";
        @endforeach

     @endif


@endsection




@section('additional_js')

@endsection