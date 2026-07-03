@php
    $values = [
        ['title' => 'Precisión', 'desc' => 'Cada milímetro cuenta. Nuestra cultura de trabajo se basa en la exactitud técnica absoluta.', 'icon' => 'M12 3 4 7v6c0 5 3.5 7.5 8 9 4.5-1.5 8-4 8-9V7l-8-4Z'],
        ['title' => 'Seguridad', 'desc' => 'Protocolos de seguridad de nivel industrial para garantizar el bienestar de todo nuestro capital humano.', 'icon' => 'M12 2.5 4.5 6v5.5c0 4.7 3.2 8.3 7.5 9.5 4.3-1.2 7.5-4.8 7.5-9.5V6L12 2.5Zm-1 11.5-2.5-2.5 1.4-1.4L11 11.2l4.1-4.1 1.4 1.4L11 14Z'],
        ['title' => 'Integridad', 'desc' => 'Transparencia en cada etapa del proyecto, desde la licitación hasta la entrega final de obra.', 'icon' => 'M5 4h14v2H5V4Zm2 4h10l2 12H5L7 8Zm5 3a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z'],
    ];
@endphp

<section class="border-b border-gray-200 bg-gray-50">
    <div class="container-x py-16 lg:py-24">
        <div class="grid gap-6 md:grid-cols-3">
            @foreach ($values as $value)
                <article class="border border-gray-200 bg-white p-8">
                    <svg class="h-9 w-9 text-brand-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="{{ $value['icon'] }}" />
                    </svg>
                    <h3 class="mt-6 text-lg font-bold uppercase tracking-tight text-gray-900">{{ $value['title'] }}</h3>
                    <p class="mt-3 text-sm leading-relaxed text-gray-500">{{ $value['desc'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
