{!! Form::open(['url' => 'search-results', 'class' => 'row form-inline']) !!}	<!-- post request goes to search-results page -->

    <div class="col-xs-12 col-sm-10 form-group">
        {!! Form::label('search_term', 'Search Term', ['class' => 'form-label sr-only']) !!}
        {!! Form::text('search_inputfield', null, ['placeholder' => 'Search for a project', 'class' => 'form-input']) !!}
    </div>

    {!! Form::submit('Search', ['class' => 'col-xs-12 col-sm-2 button-transparent', 'id' => 'search-for-this']) !!}

{!! Form::close() !!}
