@php
    $specialties = [
        ['ref' => 'DSGN-001', 'title' => 'Diseño Estructural', 'desc' => 'Planificación integrada utilizando modelos BIM avanzados para asegurar la máxima eficiencia antes de comenzar la obra.', 'icon' => 'compass'],
        ['ref' => 'IND-002', 'title' => 'Construcción Industrial', 'desc' => 'Construcción de instalaciones pesadas que requieren logística compleja y gestión especializada de cargas estructurales.', 'icon' => 'industrial'],
        ['ref' => 'URB-003', 'title' => 'Infraestructura Urbana', 'desc' => 'Proyectos de ingeniería civil a gran escala enfocados en la conectividad y el crecimiento metropolitano sostenible.', 'icon' => 'building'],
    ];
    $icons = [
        'compass' => 'M12 2.25 4.5 12l7.5 9.75L19.5 12 12 2.25Z',
        'industrial' => 'M3 21V9l6 3V9l6 3V5l6 3v13H3Z',
        'building' => 'M4 21V4a1 1 0 0 1 1-1h9a1 1 0 0 1 1 1v17m0-10h4a1 1 0 0 1 1 1v9M8 7h2M8 11h2M8 15h2',
    ];
@endphp

<section class="border-b border-gray-200 bg-gray-50">
    <div class="container-x py-16 lg:py-24">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <h2 class="text-3xl font-bold uppercase tracking-tight text-gray-900 sm:text-4xl">Nuestras especialidades</h2>
                <p class="mt-3 max-w-md text-gray-500">Excelencia modular, industrial y comercial a través del prisma de la precisión estructural.</p>
            </div>
            <span class="label-mono text-gray-400">[ Servicios_Lista_V2 ]</span>
        </div>

        <div class="mt-12 grid gap-px border border-gray-200 bg-gray-200 md:grid-cols-3">
            @foreach ($specialties as $item)
                <article class="group flex flex-col bg-white p-8 transition hover:bg-gray-50">
                    <svg class="h-8 w-8 text-gray-900 transition group-hover:text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icons[$item['icon']] }}" />
                    </svg>
                    <h3 class="mt-6 text-xl font-bold uppercase tracking-tight text-gray-900">{{ $item['title'] }}</h3>
                    <p class="mt-3 flex-1 text-sm leading-relaxed text-gray-500">{{ $item['desc'] }}</p>
                    <span class="label-mono mt-8 border-t border-gray-200 pt-4 text-gray-400">Ref: {{ $item['ref'] }}</span>
                </article>
            @endforeach
        </div>
    </div>
</section>
