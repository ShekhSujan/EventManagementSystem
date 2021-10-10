@extends('layouts.app')
@section('content')
<form action="{{$url}}" method="post" id="myform">
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="{{$account}}" />
<input type="hidden" name="cbt" value="Event" />
<input type="hidden" name="currency_code" value="USD" />
<input type="hidden" name="quantity" value="{{$quantity}}" />
<input type="hidden" name="item_name" value="Event Payment" />
<input type="hidden" name="custom" value="{{$track}}" />
<input type="hidden" name="amount"  value="{{$amount}}" />
<input type="hidden" name="return" value="{{url('/')}}" />
<input type="hidden" name="cancel_return" value="{{url('/')}}" />
<input type="hidden" name="notify_url" value="{{route('ipn.paypal')}}" />
</div>
</form>
<script>
	document.getElementById("myform").submit();
</script>
@endsection
