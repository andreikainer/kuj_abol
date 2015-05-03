<!-- if there are validation errors, show them here -->
    <div class="form-group">
        {{--<ul>--}}
            {{--<li class="form-error cpp-error" data-error="name"></li>--}}
            {{--<li class="form-error cpp-error" data-error="email"></li>--}}
            {{--<li class="form-error cpp-error" data-error="message_body"></li>--}}
        {{--</ul>--}}
        @if($errors->any())
	    	<ul class="form-error">
	    		@foreach($errors->all() as $error)
	    		    <li> {{ $error }} </li>
	    		@endforeach
	    	</ul>
        @endif
    </div>

{!! Form::open(['action' => 'ContactFormController@postContactForm', 'method' => 'post']) !!}

    <div class="form-group">
    	{!! Form::label(null, 'Name', ['class' => 'form-label form-inline']) !!}
   	    {!! Form::text('name', null,
        		array('required',
              		'class'=>'form-input form-inline',
              		'placeholder'=>'Your name')) !!}
    </div>
    <div class="form-error cpp-error" data-error="name"></div>

    <div class="form-group">
    	{!! Form::label(null, 'Email', ['class' => 'form-label']) !!}
    	{!! Form::text('email', null,
        		array('required',
              		'class'=>'form-input',
              		'placeholder'=>'Your email')) !!}
    </div>
    <div class="form-error cpp-error" data-error="email"></div>

    <div class="form-group">
    	{!! Form::label(null, 'Message', ['class' => 'form-label']) !!}
    	{!! Form::textarea('message_body', null,
        		array('required',
              		'class'=>'form-input',
             		'placeholder'=>'Your message')) !!}
    </div>
    <div class="form-error cpp-error" data-error="message_body"></div>

    <div class="form-group clearfix">
    	{!! Form::submit('Send',
      		array('class'=>'col-xs-12 col-sm-3 btn btn-primary button-main-big',
      		      'id' => 'send-question')) !!}
    </div>

{!! Form::close() !!}