
{!! Form::open(['action' => 'PaymentController@store']) !!}

  {!! Form::submit('dadadda') !!}

{!! Form::close() !!}

<!--
<form method="post" {{action('PaymentController@store')}}>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input name="submit" type="submit" value="Proceed to the mPAY24 payment page"/>
</form> -->
