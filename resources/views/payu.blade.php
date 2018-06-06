<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yellow Club Shop - Payu</title>
</head>
<body>
@php
    $apiKey = "Zu3NaM89OY4egnYF4xwIY2pdxN";

	$merchantId = "704663";

	$amount = $order->total;

	$currency = "COP";

	$referenceCode =  $order->reference;

	$firma = $apiKey . "~" . $merchantId . "~" . $referenceCode . "~" . $amount . "~" . $currency;

	$asignature = md5($firma);
@endphp

<form method="post" id="frmPayu" action="https://gateway.payulatam.com/ppp-web-gateway">

    <input name="merchantId"    type="hidden"  value="{{ $merchantId }}"   >

    <input name="accountId"     type="hidden"  value="707753" >

    <input name="description"   type="hidden"  value="Yellow Club Online"  >

    <input name="referenceCode" type="hidden"  value="{{ $referenceCode }}" >

    <input name="amount"        type="hidden"  value="{{ $amount }}"   >

    <input name="tax"           type="hidden"  value="0"  >

    <input name="taxReturnBase" type="hidden"  value="0" >

    <input type="hidden" name="buyerFullName" value="{{ $user->name ." ". $user->last_name }}" />

    <input type="hidden" name="buyerEmail" value="{{ $user->email }}" />

    <input type="hidden" name="contactPhone" value="{{ $address->phone }}" />

    <input type="hidden" name="shippingAddress" value="{{ $address->address }}" />

    <input name="currency"      type="hidden"  value="{{ $currency }}" >

    <input name="signature"     type="hidden"  value="{{ $asignature }}"  >

    <input name="test"          type="hidden"  value="0" >

    <input name="responseUrl"    type="hidden"  value="https://yellowclub.shop" >

</form>
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript">
    window.onload = cargar();
    function cargar() {
        $("#frmPayu").submit();
    }
</script>
</body>
</html>