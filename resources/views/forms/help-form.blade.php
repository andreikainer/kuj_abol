{!! Form::open(['method' => 'post']) !!}

    <div class="form-group">
    	{!! Form::label(null, 'Name', ['class' => 'form-label form-inline']) !!}
   	    {!! Form::text('name', null,
        		array('required',
              		'class'=>'form-input form-inline',
              		'placeholder'=>'Your name')) !!}
    </div>

    <div class="form-group">
    	{!! Form::label(null, 'Email', ['class' => 'form-label']) !!}
    	{!! Form::text('email', null,
        		array('required',
              		'class'=>'form-input',
              		'placeholder'=>'Your email')) !!}
    </div>

    <div class="form-group">
    	{!! Form::label(null, 'Message', ['class' => 'form-label']) !!}
    	{!! Form::textarea('message_body', null,
        		array('required',
              		'class'=>'form-input',
             		'placeholder'=>'Your message')) !!}
    </div>

<!-- if there are validation errors, show them here -->
    <div class="form-group">
        @if($errors->any())
	    	<ul>
	    		@foreach($errors->all() as $error)
	    		    <li class=”form-error”> {{ $error }} </li>
	    		@endforeach
	    	</ul>
        @endif
    </div>

<!-- to give the user a feedback in a success point, show the success message -->
    <div class="form-group">
        @if(Session::has('message'))
        	<div class="alert alert-info">
          		{{Session::get('message')}}
        	</div>
        @endif
    </div>


    <div class="form-group clearfix">
    	{!! Form::submit('Send',
      		array('class'=>'col-xs-12 col-sm-3 btn btn-primary button-main-big',
      		      'id' => 'send-question')) !!}
    </div>

{!! Form::close() !!}