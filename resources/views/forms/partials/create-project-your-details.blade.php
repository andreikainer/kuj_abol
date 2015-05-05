<div class="row">
            <div class="col-md-12 col-sm-12 text-right">
                <div class="form-button form-button-secondary text-center" data-button="save">{{ trans('create-project-form.save-progress') }}</div>
            </div>
        </div>

        <!-- Name of Child Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('child_name', trans('create-project-form.child-name'), ['class' => 'form-label']) !!}
                {!! Form::text('child_name', null, ['class' => 'form-input']) !!}
                {{--{!! Form::text('child_name', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly']) !!}--}}
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero" data-error="child_name"></div>
            </div>
        </div> <!-- end name of child -->

        <!-- Your First Name Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('first_name', trans('create-project-form.first-name'), ['class' => 'form-label']) !!}
                {!! Form::text('first_name', null, ['class' => 'form-input']) !!}
                {{--{!! Form::text('first_name', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly']) !!}--}}
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero" data-error="first_name"></div>
            </div>
        </div> <!-- end first name -->

        <!-- Your Last Name Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('last_name', trans('create-project-form.last-name'), ['class' => 'form-label']) !!}
                {!! Form::text('last_name', null, ['class' => 'form-input']) !!}
                {{--{!! Form::text('last_name', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly']) !!}--}}
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero" data-error="last_name"></div>
            </div>
        </div> <!-- end last name -->

        <!-- Your Email Address Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('email', trans('create-project-form.email'), ['class' => 'form-label']) !!}
                {!! Form::email('email', null, ['class' => 'form-input']) !!}
                {{--{!! Form::email('email', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly']) !!}--}}
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero" data-error="email"></div>
            </div>
        </div> <!-- end email address -->

        <!-- Residential Address Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('address', trans('create-project-form.address'), ['class' => 'form-label']) !!}
                {!! Form::textarea('address', null, ['class' => 'form-input']) !!}
                {{--{!! Form::textarea('address', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly']) !!}--}}
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero" data-error="address"></div>
            </div>
        </div> <!-- end residential address -->

        <!-- Telephone Number Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('tel_number', trans('create-project-form.tel-number'), ['class' => 'form-label']) !!}
                {!! Form::text('tel_number', null, ['class' => 'form-input']) !!}
                {{--{!! Form::text('tel_number', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly']) !!}--}}
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero" data-error="tel_number"></div>
            </div>
        </div> <!-- end telephone number -->

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-button form-button-nav text-center" data-button="back">{{ trans('create-project-form.back') }}</div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                <div class="form-button form-button-nav text-center" data-button="next">{{ trans('create-project-form.next') }}</div>
            </div>
        </div>