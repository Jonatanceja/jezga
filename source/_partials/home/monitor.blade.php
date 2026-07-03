<section class="bg-gray-900 text-white" x-data="siteExplorer()">
    <div class="container-x flex flex-col gap-6 py-6 md:flex-row md:items-center md:gap-10">
        <span class="label-mono shrink-0 text-white">
            <span class="mr-2 inline-block h-2 w-2 animate-pulse rounded-full bg-brand-500 align-middle"></span>
            Monitor de exploración
        </span>

        <div class="flex flex-1 items-center gap-4">
            <span class="label-mono shrink-0 text-gray-400">Sitio explorado</span>
            <div class="h-1 flex-1 overflow-hidden bg-gray-700">
                <div class="relative h-full overflow-hidden bg-brand-500" :style="`width: ${shown}%`">
                    <span class="absolute inset-0 animate-scan bg-gradient-to-r from-transparent via-white/50 to-transparent"></span>
                </div>
            </div>
            <span class="font-mono text-sm font-medium tabular-nums text-white" x-text="label">0%</span>
        </div>

        <span class="label-mono shrink-0 text-gray-400">
            <span x-text="visited">0</span> / <span x-text="total">6</span> secciones
        </span>
    </div>
</section>
