@php
    $items = $projects->sortBy('order')->map(fn ($p) => [
        'title'    => $p->title,
        'category' => $p->category,
        'filter'   => $p->filter,
        'year'     => $p->year,
        'status'   => $p->status,
        'featured' => (bool) $p->featured,
        'cover'    => $p->cover,
        'url'      => $p->getUrl(),
    ])->values();

    $categories = [
        'todos'      => 'Todos',
        'estructura' => 'Estructura',
        'industrial' => 'Industrial',
        'adecuacion' => 'Adecuación',
    ];
@endphp

<section class="container-x py-12 lg:py-16" x-data="projectsList()">
    <script type="application/json" id="projects-data">{!! json_encode($items) !!}</script>

    {{-- Filter + search bar --}}
    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div class="flex flex-wrap gap-2">
            @foreach ($categories as $slug => $label)
                <button type="button" @click="cat = '{{ $slug }}'"
                        class="border px-4 py-2 font-mono text-[0.7rem] uppercase tracking-[0.14em] transition"
                        :class="cat === '{{ $slug }}' ? 'border-brand-600 bg-brand-600 text-white' : 'border-gray-300 text-gray-600 hover:border-gray-900'">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        <div class="flex items-center gap-3">
            <label class="flex flex-1 items-center gap-3 border border-gray-300 px-4 py-2 focus-within:border-brand-600 lg:w-72">
                <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.3-4.3m1.8-4.4a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0Z" />
                </svg>
                <input type="search" x-model="q" placeholder="Buscar proyecto..."
                       class="w-full bg-transparent font-mono text-xs uppercase tracking-[0.14em] text-gray-900 placeholder-gray-400 focus:outline-none">
            </label>
        </div>
    </div>

    {{-- Grid --}}
    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <template x-for="p in filtered" :key="p.url">
            <a :href="p.url" class="group block" :class="p.featured ? 'sm:col-span-2 lg:col-span-2' : ''">
                <div class="relative isolate overflow-hidden border border-gray-200 bg-gray-100"
                     :class="p.featured ? 'aspect-[16/9]' : 'aspect-[4/3]'">
                    <img :src="p.cover" :alt="p.title" loading="lazy"
                         class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    <div class="absolute left-3 top-3 flex items-center gap-2">
                        <span class="bg-brand-600 px-2 py-1 font-mono text-[0.6rem] uppercase tracking-[0.16em] text-white" x-text="p.status"></span>
                        <span class="bg-white/90 px-2 py-1 font-mono text-[0.6rem] uppercase tracking-[0.16em] text-gray-600" x-text="p.year"></span>
                    </div>
                </div>
                <div class="mt-4 flex items-start justify-between gap-4">
                    <h3 class="text-lg font-bold uppercase tracking-tight text-gray-900 transition group-hover:text-brand-600" x-text="p.title"></h3>
                    <span class="label-mono shrink-0 pt-1 text-gray-400" x-text="p.category"></span>
                </div>
            </a>
        </template>
    </div>

    <p x-show="filtered.length === 0" class="border border-dashed border-gray-300 py-20 text-center font-mono text-sm uppercase tracking-[0.14em] text-gray-400">
        No se encontraron proyectos
    </p>
</section>
