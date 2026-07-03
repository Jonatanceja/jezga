<footer class="border-t border-gray-200 bg-gray-50">
    <div class="container-x grid gap-12 py-16 md:grid-cols-2 lg:grid-cols-4">
        <div class="max-w-xs">
            <img src="/assets/images/logotipo.svg" alt="JEZGA" class="h-8 w-auto">
            <p class="mt-5 text-sm leading-relaxed text-gray-500">{{ $page->tagline }}</p>
        </div>

        <div>
            <h3 class="label-mono text-gray-500">Explorar</h3>
            <ul class="mt-5 space-y-3 text-sm">
                @foreach ($page->footer['explorar'] as $link)
                    <li><a href="{{ $link['url'] }}" class="text-gray-600 transition hover:text-brand-600">{{ $link['label'] }}</a></li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="label-mono text-gray-500">Legal</h3>
            <ul class="mt-5 space-y-3 text-sm">
                @foreach ($page->footer['legal'] as $link)
                    <li><a href="{{ $link['url'] }}" class="text-gray-600 transition hover:text-brand-600">{{ $link['label'] }}</a></li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="label-mono text-gray-500">Contacto</h3>

            <dl class="mt-5 space-y-4 text-sm">
                <div>
                    <dt class="label-mono text-gray-400">Teléfono</dt>
                    <dd class="mt-2 space-y-1">
                        @foreach ($page->contact['phones'] as $phone)
                            <a href="tel:{{ $page->contact['country_code'] . preg_replace('/\D+/', '', $phone) }}" class="block text-gray-600 transition hover:text-brand-600">{{ $phone }}</a>
                        @endforeach
                    </dd>
                </div>
                <div>
                    <dt class="label-mono text-gray-400">Correo</dt>
                    <dd class="mt-2 space-y-1">
                        @foreach ($page->contact['emails'] as $email)
                            <a href="mailto:{{ $email }}" class="block text-gray-600 transition hover:text-brand-600">{{ $email }}</a>
                        @endforeach
                    </dd>
                </div>
            </dl>

            <div class="mt-5">
                @include('_partials.social')
            </div>
        </div>
    </div>

    <div class="border-t border-gray-200">
        <div class="container-x flex flex-col items-center justify-between gap-3 py-6 sm:flex-row">
            <p class="font-mono text-[0.7rem] uppercase tracking-[0.18em] text-gray-400">
                © 2026 JEZGA Proyecto y Constriucción S.A de C.V. Todos los derechos reservados.
            </p>
            <p class="font-mono text-[0.7rem] uppercase tracking-[0.18em] text-gray-400">
                Precisión estructural · Integridad constructiva
            </p>
        </div>
    </div>
</footer>
