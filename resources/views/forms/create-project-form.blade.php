{!! Form::open(['class' => 'form-border form-element form-radius-btm-only clearfix']) !!}

    <fieldset class="col-md-12 col-sm-12 create-project-fieldset">
        @include('forms.partials.create-project-start')
    </fieldset>

    <fieldset class="col-md-12 col-sm-12 create-project-fieldset">
        @include('forms.partials.create-project-proj-details')
    </fieldset>

    <fieldset class="col-md-12 col-sm-12 create-project-fieldset">
        @include('forms.partials.create-project-your-details')
    </fieldset>

    <fieldset class="col-md-12 col-sm-12 create-project-fieldset">
        @include('forms.partials.create-project-supporting-evidence')
    </fieldset>

    <fieldset class="col-md-12 col-sm-12 create-project-fieldset">
        @include('forms.partials.create-project-summary')
    </fieldset>

{!! Form::close() !!}