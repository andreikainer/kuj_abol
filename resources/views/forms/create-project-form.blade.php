{!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST', 'files' => true, 'id' => 'create-project', 'class' => 'form-element form-radius-btm-only bt-none']) !!}

    <fieldset class="create-project-fieldset fieldset-active" data-section="0">
        <div class="col-md-12 col-sm-12">
            @include('forms.partials.create-project-start')
        </div>
    </fieldset>

    <fieldset class="create-project-fieldset" data-section="1">
        <div class="col-md-12 col-sm-12">
            @include('forms.partials.create-project-proj-details')
        </div>
    </fieldset>

    <fieldset class="create-project-fieldset" data-section="2">
        <div class="col-md-12 col-sm-12">
            @include('forms.partials.create-project-your-details')
        </div>
    </fieldset>

    <fieldset class="create-project-fieldset" data-section="3">
        <div class="col-md-12 col-sm-12">
            @include('forms.partials.create-project-supporting-evidence')
        </div>
    </fieldset>

    <fieldset class="create-project-fieldset" data-section="4">
        <div class="col-md-12 col-sm-12">
            @include('forms.partials.create-project-summary')
        </div>
    </fieldset>

{!! Form::close() !!}