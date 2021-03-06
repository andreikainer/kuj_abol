<!-- if there are validation errors, show "Woops" message -->
    <div class="form-group">
        @if($errors->any())
            <div class="form-error top-error"><i class="fa fa-exclamation-circle"></i> {{ trans('contact-page.woops') }}</div>
        @endif
    </div>

{!! Form::open(['action' => 'ContactFormController@postContactForm', 'method' => 'post']) !!}
<!-- Name Form Input -->
    <div class="form-group">
    	{!! Form::label('name', trans('contact-page.name'), ['class' => 'form-label form-inline']) !!}
   	    {!! Form::text('name', null,
        		array('required',
              		'class'=>'form-input form-inline',
              		'placeholder'=>trans('contact-page.place-name'))) !!}
    </div>
    <div class="form-error none" data-error="name"></div>
    <div class="form-error">{{ $errors->first('name') }}</div>
<!-- end name input -->

<!-- Email Form Input -->
    <div class="form-group">
    	{!! Form::label('email', trans('contact-page.email'), ['class' => 'form-label']) !!}
    	{!! Form::text('email', null,
        		array('required',
              		'class'=>'form-input',
              		'placeholder'=>trans('contact-page.place-email'))) !!}
    </div>
    <div class="form-error none" data-error="email"></div>
    <div class="form-error">{{$errors->first('email')}}</div>
<!-- end email input -->

<!-- Message_body Form Input -->
    <div class="form-group">
    	{!! Form::label('message_body', trans('contact-page.message-body'), ['class' => 'form-label']) !!}
    	{!! Form::textarea('message_body', null,
        		array('required',
              		'class'=>'form-input',
             		'placeholder'=>trans('contact-page.place-message-body'))) !!}
    </div>
    <div class="form-error none" data-error="message_body"></div>
    <div class="form-error">{{$errors->first('message_body')}}</div>
<!-- end message_body input -->

<!-- Submit button -->
    <div class="form-group clearfix">
    	{!! Form::submit(trans('contact-page.send'),
      		array('class'=>'col-xs-12 col-sm-3 btn btn-primary button-main-big',
      		      'id' => 'send-question')) !!}
    </div>
<!-- end submit button -->

{!! Form::close() !!}