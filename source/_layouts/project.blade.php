@extends('_layouts.main')

@section('body')
<article class="container-x py-16 lg:py-24">
    <a href="/proyectos" class="label-mono inline-flex items-center gap-2 text-gray-400 transition hover:text-brand-600">
        <span aria-hidden="true">&larr;</span> Proyectos
    </a>

    <header class="mt-10 flex flex-wrap items-end justify-between gap-6 border-b border-gray-200 pb-10">
        <div class="max-w-3xl">
            <div class="flex items-center gap-3">
                @if ($page->status)
                    <span class="bg-brand-600 px-2 py-1 font-mono text-[0.6rem] uppercase tracking-[0.18em] text-white">{{ $page->status }}</span>
                @endif
                <span class="label-mono text-gray-400">{{ $page->year }}</span>
            </div>
            <h1 class="mt-5 text-4xl font-bold uppercase tracking-tight text-gray-900 sm:text-5xl">{{ $page->title }}</h1>
        </div>
        <span class="label-mono text-gray-400">{{ $page->category }}</span>
    </header>

    @if ($page->cover)
        <img src="{{ $page->cover }}" alt="{{ $page->title }}"
             class="mt-10 aspect-[16/7] w-full border border-gray-200 object-cover">
    @else
        @include('_partials.placeholder', ['class' => 'mt-10 aspect-[16/7]', 'label' => 'OBRA_REF_' . strtoupper($page->getFilename())])
    @endif

    <div class="prose prose-gray mt-12 max-w-3xl">
        @yield('content')
    </div>

    @php $gallery = collect($page->images ?? [])->reject(fn ($img) => $img === $page->cover)->values(); @endphp
    @if ($gallery->count())
        <div class="mt-14 border-t border-gray-200 pt-12">
            <h2 class="label-mono text-gray-500">Galería</h2>
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($gallery as $img)
                    <img src="{{ $img }}" alt="{{ $page->title }}" loading="lazy"
                         class="aspect-[4/3] w-full border border-gray-200 object-cover">
                @endforeach
            </div>
        </div>
    @endif
</article>
@endsection
