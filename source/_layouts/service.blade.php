@extends('_layouts.main')

@section('body')
<article class="container-x py-16 lg:py-24">
    <a href="/servicios" class="label-mono inline-flex items-center gap-2 text-gray-400 transition hover:text-brand-600">
        <span aria-hidden="true">&larr;</span> Servicios
    </a>

    <header class="mt-10 max-w-3xl border-b border-gray-200 pb-10">
        <span class="label-mono text-brand-600">[ {{ $page->number }} ]</span>
        <h1 class="mt-4 text-4xl font-bold uppercase tracking-tight text-gray-900 sm:text-5xl">{{ $page->title }}</h1>
        @if ($page->excerpt)
            <p class="mt-6 text-lg leading-relaxed text-gray-500">{{ $page->excerpt }}</p>
        @endif
    </header>

    @if ($page->image)
        <img src="{{ $page->image }}" alt="{{ $page->title }}"
             class="mt-10 aspect-[16/7] w-full border border-gray-200 object-cover">
    @endif

    <div class="mt-12 grid gap-12 lg:grid-cols-3">
        <div class="prose prose-gray max-w-none lg:col-span-2">
            @yield('content')
        </div>

        @if ($page->features)
            <aside class="lg:col-span-1">
                <h2 class="label-mono text-gray-500">Capacidades</h2>
                <ul class="mt-5 space-y-3">
                    @foreach ($page->features as $feature)
                        <li class="flex items-center gap-3 text-sm font-medium uppercase tracking-wide text-gray-700">
                            <svg class="h-4 w-4 shrink-0 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            {{ $feature }}
                        </li>
                    @endforeach
                </ul>
            </aside>
        @endif
    </div>

    <div class="mt-16 border-t border-gray-200 pt-10">
        <a href="/contacto" class="inline-flex bg-brand-600 px-7 py-4 font-mono text-xs uppercase tracking-[0.18em] text-white transition hover:bg-brand-700">
            Solicitar este servicio
        </a>
    </div>
</article>
@endsection
