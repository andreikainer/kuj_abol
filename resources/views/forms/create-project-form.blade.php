{!! Form::open(['class' => 'form-element bt-none']) !!}

    <fieldset id="cpp-section-1" class="create-project-fieldset">
        <div class="col-md-12 col-sm-12">
            @include('forms.partials.create-project-start')
        </div>
    </fieldset>

    <fieldset id="cpp-section-2" class="create-project-fieldset">
        <div class="col-md-12 col-sm-12">
            @include('forms.partials.create-project-proj-details')
        </div>
    </fieldset>

    <fieldset id="cpp-section-3" class="create-project-fieldset">
        <div class="col-md-12 col-sm-12">
            @include('forms.partials.create-project-your-details')
        </div>
    </fieldset>

    <fieldset id="cpp-section-4" class="create-project-fieldset">
        <div class="col-md-12 col-sm-12">
            @include('forms.partials.create-project-supporting-evidence')
        </div>
    </fieldset>

    <fieldset id="cpp-section-5" class="create-project-fieldset">
        <div class="col-md-12 col-sm-12">
            @include('forms.partials.create-project-summary')
        </div>
    </fieldset>

{!! Form::close() !!}