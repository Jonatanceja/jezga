---
title: Términos de Servicio
updated: 29 de junio de 2026
---
@extends('_layouts.legal')

@section('content')
<p>Los presentes Términos de Servicio regulan el acceso y uso del sitio web de <strong>JEZGA Construction Group</strong>, así como las condiciones generales de nuestros servicios de ingeniería y construcción. Al utilizar este sitio usted acepta estos términos.</p>

<h2>1. Objeto</h2>
<p>Este documento establece las condiciones bajo las cuales JEZGA Construction Group ofrece información, presupuestos y servicios técnicos a través de su sitio web y canales de contacto.</p>

<h2>2. Uso del sitio</h2>
<p>El usuario se compromete a hacer un uso adecuado de los contenidos y a no emplearlos para actividades ilícitas o que puedan dañar la imagen, los intereses o los derechos de la empresa o de terceros.</p>

<h2>3. Propuestas y cotizaciones</h2>
<p>La información publicada y las cotizaciones preliminares tienen carácter orientativo y no constituyen una oferta vinculante hasta la firma del contrato correspondiente. Cada proyecto se rige por un alcance técnico específico.</p>

<h2>4. Propiedad intelectual</h2>
<p>Todos los contenidos del sitio (textos, marcas, logotipos, diseños y planos) son propiedad de JEZGA Construction Group o de sus licenciantes y están protegidos por la legislación vigente. Queda prohibida su reproducción sin autorización expresa.</p>

<h2>5. Responsabilidad</h2>
<p>JEZGA Construction Group no se hace responsable de los daños derivados del uso indebido del sitio ni de interrupciones técnicas ajenas a su control. Los servicios de obra se rigen por las garantías establecidas en cada contrato.</p>

<h2>6. Enlaces externos</h2>
<p>El sitio puede contener enlaces a páginas de terceros. No asumimos responsabilidad sobre los contenidos ni las políticas de privacidad de dichos sitios.</p>

<h2>7. Legislación aplicable</h2>
<p>Estos términos se rigen por la legislación española. Para la resolución de cualquier controversia, las partes se someten a los juzgados y tribunales que correspondan conforme a derecho.</p>

<h2>8. Contacto</h2>
<p>Para cualquier duda relativa a estos términos puede escribirnos a <a href="mailto:{{ $page->contact['emails'][0] }}">{{ $page->contact['emails'][0] }}</a>.</p>
@endsection
