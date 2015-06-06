{!! Form::open(['action' => 'ProjectsController@shareProject', 'class' => 'form-element padding-lr-1em']) !!}

        <div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    {!! Form::label('sender_name', trans('view-project-page.sender_name'), ['class' => 'form-label']) !!}
                    {!! Form::text('sender_name', null, ['class' => 'form-input']) !!}
                    <div class="form-error cpp-error pad-zero" data-error="sender_name"></div>
                    <div class="form-error cpp-error pad-zero">{{ $errors->first('sender_name') }}</div>
                </div>
                <div class="col-xs-12 col-sm-6 form-pair">
                    {!! Form::label('sender_email', trans('view-project-page.sender_email'), ['class' => 'form-label']) !!}
                    {!! Form::text('sender_email', null, ['class' => 'form-input']) !!}
                    <div class="form-error cpp-error pad-zero" data-error="sender_email"></div>
                    <div class="form-error cpp-error pad-zero">{{ $errors->first('sender_email') }}</div>
                </div>
            </div>
        </div> <!-- /.form-group -->

        <div class="form-group">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    {!! Form::label('friend_name', trans('view-project-page.friend_name'), ['class' => 'form-label']) !!}
                    {!! Form::text('friend_name', null, ['class' => 'form-input']) !!}
                    <div class="form-error cpp-error pad-zero" data-error="friend_name"></div>
                    <div class="form-error cpp-error pad-zero">{{ $errors->first('friend_name') }}</div>
                </div>
                <div class="col-xs-12 col-sm-6 form-pair">
                    {!! Form::label('friend_email', trans('view-project-page.friend_email'), ['class' => 'form-label']) !!}
                    {!! Form::text('friend_email', null, ['class' => 'form-input']) !!}
                    <div class="form-error cpp-error pad-zero" data-error="friend_email"></div>
                    <div class="form-error cpp-error pad-zero">{{ $errors->first('friend_email') }}</div>
                </div>
            </div>
        </div> <!-- /.form-group -->

        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    {!! Form::label('message', trans('view-project-page.message'), ['class' => 'form-label']) !!}
                    {!! Form::textarea('message', null, ['class' => 'form-input']) !!}
                    <div class="form-error cpp-error pad-zero" data-error="message"></div>
                    <div class="form-error cpp-error pad-zero">{{ $errors->first('message') }}</div>
                </div>
            </div>
        </div> <!-- /.form-group -->

        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    {!! Form::submit(trans('view-project-page.share-via-email'), ['class' => 'form-button form-button-full-width']) !!}
                </div>
            </div>
        </div> <!-- /.form-group -->
{!! Form::close() !!}
