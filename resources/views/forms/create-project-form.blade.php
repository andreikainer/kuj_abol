{!! Form::open(['class' => 'form-border form-element']) !!}
    <fieldset>
        <!-- Project Title Form Input -->
        <div class="row form-group">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('project_name', 'Project Title:', ['class' => 'form-label']) !!}
                {!! Form::text('project_name', null, ['class' => 'form-input']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error">Error</div>
            </div>
        </div>
    </fieldset>
{!! Form::close() !!}