<!-- Name of Child Form Input -->
        <div class="row form-group">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('child_name', 'Name of Child:', ['class' => 'form-label']) !!}
                {!! Form::text('child_name', null, ['class' => 'form-input']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error"></div>
            </div>
        </div> <!-- end name of child -->

        <!-- Your First Name Form Input -->
        <div class="row form-group">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('first_name', 'Your First Name:', ['class' => 'form-label']) !!}
                {!! Form::text('first_name', null, ['class' => 'form-input']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error"></div>
            </div>
        </div> <!-- end first name -->

        <!-- Your Last Name Form Input -->
        <div class="row form-group">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('last_name', 'Your Last Name:', ['class' => 'form-label']) !!}
                {!! Form::text('last_name', null, ['class' => 'form-input']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error"></div>
            </div>
        </div> <!-- end last name -->

        <!-- Your Email Address Form Input -->
        <div class="row form-group">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('email', 'Your Email Address:', ['class' => 'form-label']) !!}
                {!! Form::email('email', null, ['class' => 'form-input']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error"></div>
            </div>
        </div> <!-- end email address -->

        <!-- Residential Address Form Input -->
        <div class="row form-group">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('address', 'Residential Address:', ['class' => 'form-label']) !!}
                {!! Form::textarea('address', null, ['class' => 'form-input']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error"></div>
            </div>
        </div> <!-- end residential address -->

        <!-- Telephone Number Form Input -->
        <div class="row form-group">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('tel_number', 'Telephone Number:', ['class' => 'form-label']) !!}
                {!! Form::text('tel_number', null, ['class' => 'form-input']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error"></div>
            </div>
        </div> <!-- end telephone number -->