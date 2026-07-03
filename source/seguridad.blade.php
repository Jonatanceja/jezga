---
title: Seguridad
active: seguridad
---
@extends('_layouts.main')

@php
    $protocols = [
        ['n' => '01', 'title' => 'Cero Accidentes', 'desc' => 'Política de tolerancia cero con auditorías diarias de obra y control de acceso por zonas.'],
        ['n' => '02', 'title' => 'Capacitación Continua', 'desc' => 'Certificación obligatoria en alturas, espacios confinados y manejo de cargas para todo el personal.'],
        ['n' => '03', 'title' => 'Monitoreo en Tiempo Real', 'desc' => 'Sensores estructurales y de ambiente conectados a un panel central de incidencias.'],
        ['n' => '04', 'title' => 'Equipo Certificado', 'desc' => 'EPP de nivel industrial y maquinaria con mantenimiento preventivo documentado.'],
    ];
@endphp

@section('body')
    <section class="border-b border-gray-200 bg-gray-50">
        <div class="container-x py-16 lg:py-24">
            <span class="label-mono text-brand-600">[ HSE / Protocolos ]</span>
            <h1 class="mt-5 max-w-3xl text-4xl font-bold uppercase leading-[1.05] tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">
                Seguridad como cimiento de cada obra
            </h1>
            <p class="mt-6 max-w-2xl leading-relaxed text-gray-500">
                Nuestros protocolos de seguridad de nivel industrial protegen a las personas, los activos y la integridad estructural en cada fase del proyecto.
            </p>
        </div>
    </section>

    <section class="border-b border-gray-200">
        <div class="container-x py-16 lg:py-24">
            <div class="grid gap-px border border-gray-200 bg-gray-200 sm:grid-cols-2">
                @foreach ($protocols as $item)
                    <article class="bg-white p-8 lg:p-10">
                        <span class="font-display text-3xl font-bold text-gray-200">{{ $item['n'] }}</span>
                        <h3 class="mt-4 text-xl font-bold uppercase tracking-tight text-gray-900">{{ $item['title'] }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-gray-500">{{ $item['desc'] }}</p>
                    </article>
                @endforeach
            </div>

            <div class="mt-12 grid gap-8 border-t border-gray-200 pt-12 sm:grid-cols-3">
                <div>
                    <p class="text-4xl font-bold text-gray-900" x-data="counter(0.4, { decimals: 1 })" x-text="display">0.4</p>
                    <p class="label-mono mt-2 text-gray-400">Índice de incidencia</p>
                </div>
                <div>
                    <p class="text-4xl font-bold text-gray-900" x-data="counter(1.2, { decimals: 1, suffix: 'M+' })" x-text="display">1.2M+</p>
                    <p class="label-mono mt-2 text-gray-400">Horas sin accidentes</p>
                </div>
                <div>
                    <p class="text-4xl font-bold text-gray-900" x-data="counter(100, { suffix: '%' })" x-text="display">100%</p>
                    <p class="label-mono mt-2 text-gray-400">Personal certificado</p>
                </div>
            </div>
        </div>
    </section>

    @include('_partials.home.cta')
@endsection
