{!! Form::open(['url' => 'search-results', 'class' => 'row form-inline', 'method' => 'post']) !!}	<!-- post request goes to search-results page -->
<!-- Search Form Input -->
    <div class="col-xs-12 col-sm-9 form-group">
        {!! Form::label(null, 'Search Term', ['class' => 'form-label sr-only']) !!}
        {!! Form::text('search_inputfield', null, ['placeholder' => 'Search for a project', 'class' => 'form-input']) !!}
    </div>
    <div class="form-error none" data-error="search_inputfield"></div>
    {{--<div class="form-error">{{ $errors->first('name') }}</div>--}}
<!-- end search input -->

<!-- Submit button -->
    {!! Form::submit('Search', ['class' => 'col-xs-12 col-sm-2 button-transparent module-submit', 'id' => 'search-for-this']) !!}
<!-- end submit button input -->

{!! Form::close() !!}