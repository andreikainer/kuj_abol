<div class="row">
            <div class="col-md-12 col-sm-12 text-right">
                <div class="image-upload-wrapper">
                    <div class="form-button form-button-secondary text-center" data-button="save">
                        <div class="image-loader"></div>
                        <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.create-project/save')) }}">
                            {{ trans('create-project-form.save-progress') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Name of Child Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('child_name', trans('create-project-form.child-name'), ['class' => 'form-label']) !!}
                {!! Form::text('child_name', null, ['class' => 'form-input']) !!}
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero" data-error="child_name"></div>
            </div>
        </div> <!-- end name of child -->

        <!-- Your First Name Form Input -->
        <!-- Your Last Name Form Input -->
        <div class="row form-group">
            <div class="col-md-6 col-sm-6">
                {!! Form::label('first_name', trans('create-project-form.first-name'), ['class' => 'form-label']) !!}
                @if($user == null)
                {!! Form::text('first_name', null, ['class' => 'form-input']) !!}
                @else
                {!! Form::text('first_name', $user->first_name, ['class' => 'form-input']) !!}
                @endif
                <div class="form-error cpp-error pad-zero" data-error="first_name"></div>
            </div>
            <div class="col-md-6 col-sm-6 form-pair">
                {!! Form::label('last_name', trans('create-project-form.last-name'), ['class' => 'form-label']) !!}
                @if($user == null)
                {!! Form::text('last_name', null, ['class' => 'form-input']) !!}
                @else
                {!! Form::text('last_name', $user->last_name, ['class' => 'form-input']) !!}
                @endif
                <div class="form-error cpp-error pad-zero" data-error="last_name"></div>
            </div>
        </div> <!-- end first name --> <!-- end last name -->


        <!-- Your Email Address Form Input -->
        <!-- Telephone Number Form Input -->
        <div class="row form-group">
            <div class="col-md-6 col-sm-6">
                {!! Form::label('email', trans('create-project-form.email'), ['class' => 'form-label']) !!}
                @if($user == null)
                {!! Form::email('email', null, ['class' => 'form-input']) !!}
                @else
                {!! Form::email('email', $user->email, ['class' => 'form-input']) !!}
                @endif
                <div class="form-error cpp-error pad-zero" data-error="email"></div>
            </div>
            <div class="col-md-6 col-sm-6 form-pair">
                {!! Form::label('tel_number', trans('create-project-form.tel-number'), ['class' => 'form-label']) !!}
                @if($user == null)
                {!! Form::text('tel_number', null, ['class' => 'form-input']) !!}
                @else
                {!! Form::text('tel_number', $user->tel_number, ['class' => 'form-input']) !!}
                @endif
                <div class="form-error cpp-error pad-zero" data-error="tel_number"></div>
            </div>
        </div> <!-- end email address --> <!-- end telephone number -->

        <!-- Residential Address Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('address', trans('create-project-form.address'), ['class' => 'form-label']) !!}
                @if($user == null)
                {!! Form::textarea('address', null, ['class' => 'form-input']) !!}
                @else
                {!! Form::textarea('address', $user->address, ['class' => 'form-input']) !!}
                @endif
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero" data-error="address"></div>
            </div>
        </div> <!-- end residential address -->

        <div class="row form-group">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-button form-button-nav text-center" data-button="back">{{ trans('create-project-form.back') }}</div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                <div class="form-button form-button-nav text-center" data-button="next">{{ trans('create-project-form.next') }}</div>
            </div>
        </div>