{!! Form::open() !!}
    <!-- Project Title Form Input -->
    <div class="row form-group">
        <div class="col-md-8 col-sm-8">
            {!! Form::label('project_name', 'Project Title:') !!}
            {!! Form::text('project_name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4 col-sm-4 error-message">Error</div>
    </div>

    <!-- Password Form Input -->
    <div class="row form-group">
        <div class="col-md-8 col-sm-8">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4 col-sm-4 error-message">Error</div>
    </div>

    <!-- Short Description Form Input -->
    <div class="row form-group">
        <div class="col-md-8 col-sm-8">
            {!! Form::label('short_desc', 'Short Description:') !!}
            {!! Form::textarea('short_desc', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4 col-sm-4 error-message">Error</div>
    </div>

{!! Form::close() !!}