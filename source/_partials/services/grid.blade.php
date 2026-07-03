@php
    $ordered  = $services->sortBy('order')->values();
    $featured = $ordered->first();
    $column   = $ordered->slice(1, 2)->values();
    $row      = $ordered->slice(3)->values();
@endphp

<section class="border-b border-gray-200">
    <div class="container-x py-16 lg:py-24">
        <div class="grid gap-6 lg:grid-cols-3">
            {{-- Featured service --}}
            <a href="{{ $featured->getUrl() }}" class="group flex flex-col border border-gray-200 p-8 transition hover:border-gray-900 lg:col-span-2 lg:row-span-2">
                <span class="label-mono text-gray-400">[ {{ $featured->number }} ]</span>
                <h2 class="mt-5 text-2xl font-bold uppercase tracking-tight text-gray-900 sm:text-3xl">{{ $featured->title }}</h2>
                <p class="mt-4 max-w-xl leading-relaxed text-gray-500">{{ $featured->excerpt }}</p>

                @if ($featured->features)
                    <ul class="mt-6 space-y-2">
                        @foreach ($featured->features as $feature)
                            <li class="flex items-center gap-2 font-mono text-xs uppercase tracking-[0.14em] text-gray-700">
                                <svg class="h-4 w-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if ($featured->image)
                    <img src="{{ $featured->image }}" alt="{{ $featured->title }}" loading="lazy"
                         class="mt-8 aspect-[16/9] w-full grow border border-gray-200 object-cover">
                @else
                    @include('_partials.placeholder', ['class' => 'mt-8 aspect-[16/9] grow'])
                @endif
            </a>

            {{-- Secondary column --}}
            @foreach ($column as $i => $service)
                <a href="{{ $service->getUrl() }}"
                   class="group flex flex-col border border-gray-200 p-8 transition hover:border-gray-900 {{ $i === 0 ? 'bg-gray-50' : '' }}">
                    <span class="label-mono text-gray-400">[ {{ $service->number }} ]</span>
                    <h3 class="mt-5 text-xl font-bold uppercase tracking-tight text-gray-900">{{ $service->title }}</h3>
                    <p class="mt-3 text-sm leading-relaxed text-gray-500">{{ $service->excerpt }}</p>
                    @if ($service->image)
                        <img src="{{ $service->image }}" alt="{{ $service->title }}" loading="lazy"
                             class="mt-6 aspect-[3/4] w-full grow border border-gray-200 object-cover">
                    @elseif ($i === 0)
                        @include('_partials.placeholder', ['class' => 'mt-6 aspect-[16/9]'])
                    @endif
                </a>
            @endforeach
        </div>

        {{-- Supporting services --}}
        <div class="mt-6 grid gap-6 md:grid-cols-3">
            @foreach ($row as $service)
                <a href="{{ $service->getUrl() }}" class="group border border-gray-200 p-6 transition hover:border-gray-900">
                    <span class="label-mono text-gray-400">[ {{ $service->number }} ]</span>
                    <h3 class="mt-4 border-b border-gray-200 pb-3 text-base font-bold uppercase tracking-tight text-gray-900 transition group-hover:text-brand-600">
                        {{ $service->title }}
                    </h3>
                    <p class="mt-3 text-sm leading-relaxed text-gray-500">{{ $service->excerpt }}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>
