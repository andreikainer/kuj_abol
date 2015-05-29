{!! Form::open(['action' => 'ProjectsController@shareProject', 'class' => 'form-element padding-lr-1em']) !!}

        <div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    {!! Form::label('sender_name', 'Your Name:', ['class' => 'form-label']) !!}
                    {!! Form::text('sender_name', null, ['class' => 'form-input']) !!}
                    <div class="form-error cpp-error pad-zero" data-error="sender_name"></div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    {!! Form::label('sender_email', 'Your Email:', ['class' => 'form-label']) !!}
                    {!! Form::text('sender_email', null, ['class' => 'form-input']) !!}
                    <div class="form-error cpp-error pad-zero" data-error="sender_email"></div>
                </div>
            </div>
        </div> <!-- /.form-group -->

        <div class="form-group">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    {!! Form::label('friend_name', 'Your Friend\'s Full Name:', ['class' => 'form-label']) !!}
                    {!! Form::text('friend_name', null, ['class' => 'form-input']) !!}
                    <div class="form-error cpp-error pad-zero" data-error="friend_name"></div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    {!! Form::label('friend_email', 'Your Friend\'s Email:', ['class' => 'form-label']) !!}
                    {!! Form::text('friend_email', null, ['class' => 'form-input']) !!}
                    <div class="form-error cpp-error pad-zero" data-error="friend_email"></div>
                </div>
            </div>
        </div> <!-- /.form-group -->

        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    {!! Form::label('message', 'Your Message:', ['class' => 'form-label']) !!}
                    {!! Form::textarea('message', null, ['class' => 'form-input']) !!}
                    <div class="form-error cpp-error pad-zero" data-error="message"></div>
                </div>
            </div>
        </div> <!-- /.form-group -->

        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    {!! Form::submit('Share via Email', ['class' => 'form-button form-button-full-width']) !!}
                </div>
            </div>
        </div> <!-- /.form-group -->
{!! Form::close() !!}
