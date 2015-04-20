@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Create Project</h1>
        </div>
        <div class="col-md-8 col-sm-8">
            @include('forms.create-project-form')
        </div>
        <div class="col-md-4 col-sm-4">
            <aside class="box2">
                Aside content.
            </aside>
        </div>
    </div>
@endsection