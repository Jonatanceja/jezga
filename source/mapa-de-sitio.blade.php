---
title: Mapa de Sitio
active: ''
---
@extends('_layouts.main')

@php
    $mainPages = collect([['label' => 'Inicio', 'url' => '/']]);
    foreach ($page->nav as $item) {
        $mainPages->push(['label' => $item['label'], 'url' => $item['url']]);
    }
    $mainPages->push(['label' => 'Contacto', 'url' => '/contacto']);
@endphp

@section('body')
<section class="container-x py-16 lg:py-24">
    <span class="label-mono text-brand-600">[ Index_Global ]</span>
    <h1 class="mt-4 text-4xl font-bold uppercase tracking-tight text-gray-900 sm:text-5xl">Mapa de Sitio</h1>
    <p class="mt-6 max-w-xl leading-relaxed text-gray-500">
        Índice completo de las páginas y contenidos publicados en el sitio de JEZGA Construction Group.
    </p>

    <div class="mt-14 grid gap-12 border-t border-gray-200 pt-12 md:grid-cols-2 lg:grid-cols-4">
        <div>
            <h2 class="label-mono text-gray-500">Páginas</h2>
            <ul class="mt-5 space-y-3 text-sm">
                @foreach ($mainPages as $link)
                    <li><a href="{{ $link['url'] }}" class="text-gray-600 transition hover:text-brand-600">{{ $link['label'] }}</a></li>
                @endforeach
            </ul>
        </div>

        <div>
            <h2 class="label-mono text-gray-500">Servicios</h2>
            <ul class="mt-5 space-y-3 text-sm">
                @foreach ($services->sortBy('order') as $service)
                    <li><a href="{{ $service->getUrl() }}" class="text-gray-600 transition hover:text-brand-600">{{ $service->title }}</a></li>
                @endforeach
            </ul>
        </div>

        <div>
            <h2 class="label-mono text-gray-500">Proyectos</h2>
            <ul class="mt-5 space-y-3 text-sm">
                @foreach ($projects->sortBy('order') as $project)
                    <li><a href="{{ $project->getUrl() }}" class="text-gray-600 transition hover:text-brand-600">{{ $project->title }}</a></li>
                @endforeach
            </ul>
        </div>

        <div>
            <h2 class="label-mono text-gray-500">Legal</h2>
            <ul class="mt-5 space-y-3 text-sm">
                @foreach ($page->footer['legal'] as $link)
                    <li><a href="{{ $link['url'] }}" class="text-gray-600 transition hover:text-brand-600">{{ $link['label'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endsection
