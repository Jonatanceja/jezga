<section class="border-b border-gray-200">
    <div class="container-x py-16 lg:py-24">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <span class="label-mono text-gray-400">[03] Estructura</span>
                <h2 class="mt-4 text-3xl font-bold uppercase tracking-tight text-gray-900 sm:text-4xl">Liderazgo</h2>
            </div>
            <span class="label-mono text-gray-400">[ Estructura Organizacional v2.4 ]</span>
        </div>

        <div class="mt-12 grid gap-px border border-gray-200 bg-gray-200 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($page->team as $i => $member)
                <article class="flex flex-col bg-white p-8">
                    <span class="label-mono text-gray-400">[ {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} ]</span>
                    <h3 class="mt-5 text-lg font-bold uppercase tracking-tight text-gray-900">{{ $member['name'] }}</h3>
                    <p class="mt-2 text-sm text-gray-500">{{ $member['role'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
