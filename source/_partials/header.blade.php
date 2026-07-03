@php $active = $page->active ?? ''; @endphp

<div x-data="{ open: false }" x-effect="document.body.classList.toggle('overflow-hidden', open)">
    <header class="sticky top-0 z-50 border-b border-gray-200 bg-white/90 backdrop-blur">
        <div class="container-x flex h-20 items-center justify-between gap-6">
            <a href="/" class="shrink-0" aria-label="JEZGA — Inicio">
                <img src="/assets/images/logotipo.svg" alt="JEZGA Construction Group" class="h-11 w-auto">
            </a>

            <nav class="hidden items-center gap-9 lg:flex">
                @foreach ($page->nav as $key => $item)
                    <a href="{{ $item['url'] }}"
                       class="border-b-2 py-1 font-mono text-[0.7rem] font-medium uppercase tracking-[0.18em] transition
                              {{ $active === $key
                                    ? 'border-brand-600 text-gray-900'
                                    : 'border-transparent text-gray-500 hover:text-gray-900' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="flex items-center gap-3">
                <a href="/contacto"
                   class="hidden bg-brand-600 px-5 py-2.5 font-mono text-[0.7rem] font-medium uppercase tracking-[0.18em] text-white transition hover:bg-brand-700 sm:inline-flex">
                    Contacto
                </a>

                <button @click="open = !open" :aria-expanded="open" class="-mr-2 p-2 text-gray-900 lg:hidden" aria-label="Abrir menú">
                    <svg x-show="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
                    </svg>
                    <svg x-show="open" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    {{-- Menú móvil: panel fijo con animación (fuera del <header> para evitar el
         bloque contenedor que crea backdrop-blur sobre elementos fixed) --}}
    <div x-show="open" x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="-translate-y-4 opacity-0"
         x-transition:enter-end="translate-y-0 opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="translate-y-0 opacity-100"
         x-transition:leave-end="-translate-y-4 opacity-0"
         class="fixed inset-x-0 bottom-0 top-20 z-40 overflow-y-auto border-t border-gray-200 bg-white lg:hidden">
        <nav class="container-x flex flex-col py-6">
            @foreach ($page->nav as $key => $item)
                <a href="{{ $item['url'] }}" @click="open = false"
                   class="border-b border-gray-100 py-4 font-mono text-sm uppercase tracking-[0.18em]
                          {{ $active === $key ? 'text-brand-600' : 'text-gray-700' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
            <a href="/contacto" @click="open = false"
               class="mt-6 bg-brand-600 px-5 py-4 text-center font-mono text-sm uppercase tracking-[0.18em] text-white">
                Contacto
            </a>
        </nav>
    </div>
</div>
