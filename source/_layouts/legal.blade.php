@extends('_layouts.main')

@section('body')
<article class="container-x py-16 lg:py-24">
    <div class="max-w-3xl">
        <span class="label-mono text-brand-600">[ Legal ]</span>
        <h1 class="mt-4 text-4xl font-bold uppercase tracking-tight text-gray-900 sm:text-5xl">{{ $page->title }}</h1>
        @if ($page->updated)
            <p class="label-mono mt-5 text-gray-400">Última actualización: {{ $page->updated }}</p>
        @endif

        <div class="prose prose-gray mt-10 max-w-none prose-headings:font-display prose-headings:uppercase prose-headings:tracking-tight prose-a:text-brand-600 prose-a:no-underline hover:prose-a:underline">
            @yield('content')
        </div>
    </div>
</article>
@endsection
