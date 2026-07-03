@php $featured = $projects->sortBy('order')->take(4)->values(); @endphp

<section class="border-b border-gray-200">
    <div class="container-x py-16 lg:py-24">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <h2 class="text-3xl font-bold uppercase tracking-tight text-gray-900 sm:text-4xl">Portfolio de obras</h2>
            <a href="/proyectos" class="label-mono text-gray-400 transition hover:text-brand-600">Ver todo &rarr;</a>
        </div>

        <div class="mt-12 grid gap-4 lg:grid-cols-2">
            {{-- Large feature tile --}}
            @if ($featured->count())
                <a href="{{ $featured[0]->getUrl() }}" class="group relative isolate block overflow-hidden border border-gray-200 bg-gray-100 aspect-[4/3] lg:aspect-auto">
                    <img src="{{ $featured[0]->cover }}" alt="{{ $featured[0]->title }}" loading="lazy"
                         class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 flex items-end justify-between gap-4 p-6">
                        <h3 class="text-xl font-bold uppercase tracking-tight text-white">{{ $featured[0]->title }}</h3>
                        <span class="font-mono text-xs uppercase tracking-[0.16em] text-white/70">{{ $featured[0]->category }}</span>
                    </div>
                </a>
            @endif

            {{-- Cluster --}}
            <div class="grid gap-4">
                @if ($featured->count() > 1)
                    <a href="{{ $featured[1]->getUrl() }}" class="group relative isolate block overflow-hidden border border-gray-200 bg-gray-100 aspect-[16/9]">
                        <img src="{{ $featured[1]->cover }}" alt="{{ $featured[1]->title }}" loading="lazy"
                             class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-5">
                            <h3 class="text-lg font-bold uppercase tracking-tight text-white">{{ $featured[1]->title }}</h3>
                        </div>
                    </a>
                @endif

                <div class="grid gap-4 sm:grid-cols-2">
                    @foreach ($featured->slice(2) as $project)
                        <a href="{{ $project->getUrl() }}" class="group relative isolate block overflow-hidden border border-gray-200 bg-gray-100 aspect-[4/3]">
                            <img src="{{ $project->cover }}" alt="{{ $project->title }}" loading="lazy"
                                 class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
                            <div class="absolute inset-x-0 bottom-0 p-4">
                                <h3 class="text-sm font-bold uppercase tracking-tight text-white">{{ $project->title }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
