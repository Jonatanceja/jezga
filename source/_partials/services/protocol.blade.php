@php
    $steps = [
        ['n' => '01', 'title' => 'Viabilidad', 'desc' => 'Evaluación de las restricciones del sitio y los requisitos estructurales.'],
        ['n' => '02', 'title' => 'Modelado', 'desc' => 'Integración BIM de alta fidelidad y detección de interferencias.'],
        ['n' => '03', 'title' => 'Ejecución', 'desc' => 'Construcción metódica con seguimiento de progreso en tiempo real.'],
        ['n' => '04', 'title' => 'Certificación', 'desc' => 'Inspección post-construcción rigurosa y firma estructural.'],
    ];
@endphp

<section class="border-b border-gray-200">
    <div class="container-x py-16 lg:py-24">
        <div class="border border-gray-200 p-8 lg:p-12">
            <div class="grid gap-10 lg:grid-cols-3">
                <div>
                    <h2 class="text-2xl font-bold uppercase tracking-tight text-gray-900 underline decoration-brand-600 decoration-2 underline-offset-8">
                        Nuestro protocolo técnico
                    </h2>
                    <p class="mt-6 leading-relaxed text-gray-500">
                        Cada servicio que ofrecemos se rige por un estricto protocolo técnico de 4 etapas que garantiza el cumplimiento absoluto y la seguridad.
                    </p>
                </div>

                <div class="grid gap-x-10 gap-y-8 sm:grid-cols-2 lg:col-span-2">
                    @foreach ($steps as $step)
                        <div class="flex gap-5">
                            <span class="font-display text-3xl font-bold text-gray-200">{{ $step['n'] }}</span>
                            <div>
                                <h3 class="text-sm font-bold uppercase tracking-[0.14em] text-gray-900">{{ $step['title'] }}</h3>
                                <p class="mt-2 text-sm leading-relaxed text-gray-500">{{ $step['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
