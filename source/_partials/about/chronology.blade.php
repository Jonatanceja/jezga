@php
    $milestones = [
        ['year' => '2010', 'tag' => 'Origen', 'desc' => 'Fundación de JEZGA en la Ciudad de México con un enfoque en infraestructura civil y cimentaciones profundas.'],
        ['year' => '2016', 'tag' => 'Expansión Nacional', 'desc' => 'Apertura de oficinas regionales y diversificación hacia proyectos industriales de alta complejidad.'],
        ['year' => '2026', 'tag' => 'Innovación Sostenible', 'desc' => 'Integración de tecnologías BIM y estándares de construcción LEED en todos nuestros procesos operativos.'],
    ];
@endphp

<section class="border-b border-gray-200">
    <div class="container-x py-16 lg:py-24">
        <span class="label-mono text-gray-400">[02] Cronología</span>
        <h2 class="mt-4 text-3xl font-bold uppercase tracking-tight text-gray-900 sm:text-4xl">Nuestra trayectoria</h2>

        <div class="mt-14">
            {{-- Horizontal timeline on desktop, vertical on mobile --}}
            <div class="relative border-l border-gray-200 pl-8 md:border-l-0 md:pl-0">
                <div class="absolute left-0 right-0 top-[7px] hidden h-px bg-gray-200 md:block"></div>

                <div class="space-y-12 md:grid md:grid-cols-3 md:gap-12 md:space-y-0">
                    @foreach ($milestones as $m)
                        <div class="relative md:pt-10">
                            <span class="absolute -left-[2.375rem] top-1.5 h-3.5 w-3.5 bg-brand-600 ring-4 ring-white md:left-0 md:top-0"></span>
                            <p class="text-3xl font-bold text-gray-900">{{ $m['year'] }}</p>
                            <p class="label-mono mt-2 text-brand-600">{{ $m['tag'] }}</p>
                            <p class="mt-4 max-w-xs text-sm leading-relaxed text-gray-500">{{ $m['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
