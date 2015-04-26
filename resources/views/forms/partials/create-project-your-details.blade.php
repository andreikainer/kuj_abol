<div class="row">
            <div class="col-md-12 col-sm-12 text-right">
                <div class="form-button form-button-secondary text-center" data-button="save">Speichern Fortschritt</div>
            </div>
        </div>

        <!-- Name of Child Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('child_name', 'Name of Child:', ['class' => 'form-label']) !!}
                {!! Form::text('child_name', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error" data-error="child_name"></div>
            </div>
        </div> <!-- end name of child -->

        <!-- Your First Name Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('first_name', 'Your First Name:', ['class' => 'form-label']) !!}
                {!! Form::text('first_name', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error" data-error="first_name"></div>
            </div>
        </div> <!-- end first name -->

        <!-- Your Last Name Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('last_name', 'Your Last Name:', ['class' => 'form-label']) !!}
                {!! Form::text('last_name', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error" data-error="last_name"></div>
            </div>
        </div> <!-- end last name -->

        <!-- Your Email Address Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('email', 'Your Email Address:', ['class' => 'form-label']) !!}
                {!! Form::email('email', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error" data-error="email"></div>
            </div>
        </div> <!-- end email address -->

        <!-- Residential Address Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('address', 'Residential Address:', ['class' => 'form-label']) !!}
                {!! Form::textarea('address', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error" data-error="address"></div>
            </div>
        </div> <!-- end residential address -->

        <!-- Telephone Number Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('tel_number', 'Telephone Number:', ['class' => 'form-label']) !!}
                {!! Form::text('tel_number', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error" data-error="tel_number"></div>
            </div>
        </div> <!-- end telephone number -->

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-button form-button-nav text-center" data-button="back">zurück</div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                <div class="form-button form-button-nav text-center" data-button="next">nächster</div>
            </div>
        </div>