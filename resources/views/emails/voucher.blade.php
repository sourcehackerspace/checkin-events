<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Document</title>
	</head>
	@php
		$style = [
			'all' => 'margin: 0; padding: 0;',
			'body' => 'font-size: 14px;',
			'allh3' => 'margin-bottom: 10px; font-size: 15px; font-weight: 600; text-transform: uppercase;',
			'opps' => 'width: 496px; border-radius: 4px; box-sizing: border-box; padding: 0 45px; margin: 40px auto; overflow: hidden; border: 1px solid #b0afb5; font-family: \'Open Sans\', sans-serif; color: #4f5365;',
			'opps-reminder' => 'position: relative; top: -1px; padding: 9px 0 10px; font-size: 11px; text-transform: uppercase; text-align: center; color: #ffffff; background: #000000;',
			'opps-info' => 'margin-top: 26px; position: relative;',
			'opps-brand' => 'width: 45%; float: left;',
			'opps-brand-img' => 'max-width: 88px; margin-top: 2px;',
			'opps-ammount' => 'width: 55%; float: right;',
			'opps-ammount-h2' => 'font-size: 36px; color: #000000; line-height: 24px; margin-bottom: 15px;',
			'opps-ammount-h2-sup' => 'font-size: 16px; position: relative; top: -2px;',
			'opps-ammount-p' => 'font-size: 10px; line-height: 14px;',
			'opps-reference' => 'margin-top: 165px;',
			'allh1' => 'font-size: 27px; color: #000000; text-align: center; margin-top: -1px; padding: 6px 0 7px; border: 1px solid #b0afb5; border-radius: 4px; background: #f8f9fa;',
			'opps-instructions' => 'margin: 32px -45px 0; padding: 32px 45px 45px; border-top: 1px solid #b0afb5; background: #f8f9fa;',
			'allol' => 'margin: 17px 0 0 16px; padding: 0px;',
			'li-li' => 'margin-top: 10px; color: #000000;',
			'alla' => 'color: #1155cc;',
			'opps-footnote' => 'margin-top: 22px; padding: 22px 20px 24px; color: #108f30; text-align: center; border: 1px solid #108f30; border-radius: 4px; background: #ffffff;',
			];
	@endphp
	<body style="{{ $style['body'] }}">
		<div style="{{ $style['opps'] }}">
			<div style="{{ $style['all'] }}">
				<div style="{{ $style['opps-reminder'] }}">Ficha digital. No es necesario imprimir.</div>
				<div style="{{ $style['opps-info'] }}">
					<div style="{{ $style['opps-brand'] }}">
						<img style="{{ $style['opps-brand-img'] }}" src="{{ asset('img/oxxopay_brand.png') }}" alt="OXXOPay">
					</div>
					<div style="{{ $style['opps-ammount'] }}">
						<h3 style="{{ $style['allh3'] }}">Monto a pagar</h3>
						<h2 style="{{ $style['opps-ammount-h2'] }}">$ {{ $order->amount/100 }} <sup style="{{ $style['opps-ammount-h2-sup'] }}">MXN</sup></h2>
						<p style="{{ $style['opps-ammount-p'] }}">OXXO cobrará una comisión adicional al momento de realizar el pago.</p>
					</div>
				</div>
				<div style="{{ $style['opps-reference'] }}">
					<h3 style="{{ $style['allh3'] }}">Referencia</h3>
					<h1 style="{{ $style['allh1'] }}">{{ $order->charges[0]->payment_method->reference }}</h1>
				</div>
			</div>
			<div style="{{ $style['opps-instructions'] }}">
				<h3 style="{{ $style['allh3'] }}">Instrucciones</h3>
				<ol style="{{ $style['allol'] }}">
					<li style="{{ $style['li-li'] }}">Acude a la tienda OXXO más cercana. <a style="{{ $style['alla'] }}" href="https://www.google.com.mx/maps/search/oxxo/" target="_blank">Encuéntrala aquí</a>.</li>
					<li style="{{ $style['li-li'] }}">Indica en caja que quieres ralizar un pago de <strong>OXXOPay</strong>.</li>
					<li style="{{ $style['li-li'] }}">Dicta al cajero el número de referencia en esta ficha para que tecleé directamete en la pantalla de venta.</li>
					<li style="{{ $style['li-li'] }}">Realiza el pago correspondiente con dinero en efectivo.</li>
					<li style="{{ $style['li-li'] }}">Al confirmar tu pago, el cajero te entregará un comprobante impreso. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
				</ol>
				<div style="{{ $style['opps-footnote'] }}">Al completar estos pasos recibirás un correo de <strong>Nombre del negocio</strong> confirmando tu pago.</div>
			</div>
		</div>	
	</body>
</html>