{{--
    Image placeholder — neutral box with a technical cross, matching the wireframes.
    Usage: @include('_partials.placeholder', ['class' => 'aspect-video', 'label' => 'IMG_01'])
--}}
<div class="relative isolate overflow-hidden border border-gray-200 bg-gray-100 {{ $class ?? '' }}">
    <svg class="absolute inset-0 h-full w-full text-gray-300" preserveAspectRatio="none" aria-hidden="true">
        <line x1="0" y1="0" x2="100%" y2="100%" stroke="currentColor" stroke-width="1" vector-effect="non-scaling-stroke" />
        <line x1="100%" y1="0" x2="0" y2="100%" stroke="currentColor" stroke-width="1" vector-effect="non-scaling-stroke" />
    </svg>
    @if (! empty($label))
        <span class="absolute left-3 top-3 z-10 bg-gray-900 px-2 py-1 font-mono text-[0.6rem] uppercase tracking-[0.18em] text-white">
            {{ $label }}
        </span>
    @endif
</div>
