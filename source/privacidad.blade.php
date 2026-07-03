---
title: Política de Privacidad
updated: 29 de junio de 2026
---
@extends('_layouts.legal')

@section('content')
<p>En <strong>JEZGA Construction Group</strong> nos comprometemos a proteger la privacidad y la seguridad de los datos personales y técnicos que nos confían nuestros clientes, proveedores y visitantes. Esta política describe cómo recopilamos, utilizamos y resguardamos su información.</p>

<h2>1. Responsable del tratamiento</h2>
<p>El responsable del tratamiento de los datos es JEZGA Construction Group, con domicilio en {{ $page->contact['address'] }}, {{ $page->contact['city'] }}. Para cualquier consulta relativa a esta política puede escribirnos a <a href="mailto:{{ $page->contact['emails'][0] }}">{{ $page->contact['emails'][0] }}</a>.</p>

<h2>2. Datos que recopilamos</h2>
<p>Recopilamos los datos que usted nos proporciona de forma voluntaria a través del formulario de contacto o de la suscripción técnica, tales como nombre, correo electrónico, teléfono de obra y los detalles del proyecto. También podemos recabar datos técnicos de navegación con fines estadísticos.</p>

<h2>3. Finalidad del tratamiento</h2>
<p>Utilizamos su información para atender solicitudes de contacto y cotización, gestionar la relación contractual, enviar comunicaciones técnicas y mejorar nuestros servicios. No utilizamos sus datos para finalidades distintas sin su consentimiento.</p>

<h2>4. Conservación de los datos</h2>
<p>Los datos se conservarán durante el tiempo necesario para cumplir con la finalidad para la que fueron recabados y mientras existan obligaciones legales o contractuales que así lo exijan.</p>

<h2>5. Comunicación a terceros</h2>
<p>No cedemos sus datos a terceros, salvo obligación legal o cuando sea estrictamente necesario para la prestación del servicio contratado, en cuyo caso se garantiza el mismo nivel de protección.</p>

<h2>6. Derechos del usuario</h2>
<p>Usted puede ejercer en cualquier momento sus derechos de acceso, rectificación, supresión, oposición, limitación y portabilidad enviando una solicitud a <a href="mailto:{{ $page->contact['emails'][0] }}">{{ $page->contact['emails'][0] }}</a> o llamando al {{ $page->contact['phones'][0] }}.</p>

<h2>7. Seguridad</h2>
<p>Aplicamos medidas técnicas y organizativas de nivel industrial para proteger sus datos frente a accesos no autorizados, pérdida o alteración.</p>

<h2>8. Cambios en esta política</h2>
<p>Nos reservamos el derecho de actualizar esta política para adaptarla a novedades legislativas o técnicas. La fecha de última actualización se indica al inicio de este documento.</p>
@endsection
