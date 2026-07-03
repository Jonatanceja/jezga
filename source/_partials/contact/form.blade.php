@php
    $fieldClass = 'mt-2 w-full border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition focus:border-brand-600 focus:outline-none';
    $labelClass = 'label-mono text-gray-500';
@endphp

<section class="border-b border-gray-200">
    <div class="container-x grid gap-0 lg:grid-cols-2">
        {{-- Form --}}
        <div class="py-16 lg:pr-16">
            <form id="contacto-form" action="/assets/contacto.php" method="POST" class="space-y-6"
                  x-data="{ estado: new URLSearchParams(window.location.search).get('estado') }">

                <template x-if="estado === 'ok'">
                    <div class="border border-green-600 bg-green-50 px-4 py-3 text-sm text-green-800">
                        ✓ Su solicitud fue enviada. Le contactaremos a la brevedad.
                    </div>
                </template>
                <template x-if="estado === 'invalido'">
                    <div class="border border-brand-600 bg-brand-50 px-4 py-3 text-sm text-brand-700">
                        Revise los campos obligatorios (nombre, correo y mensaje) e intente de nuevo.
                    </div>
                </template>
                <template x-if="estado === 'error'">
                    <div class="border border-brand-600 bg-brand-50 px-4 py-3 text-sm text-brand-700">
                        Ocurrió un error al enviar. Intente más tarde o escríbanos a {{ $page->contact['emails'][0] }}.
                    </div>
                </template>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div>
                        <label class="{{ $labelClass }}">Nombre completo</label>
                        <input type="text" name="nombre" required placeholder="Ej. Juan Pérez" class="{{ $fieldClass }}">
                    </div>
                    <div>
                        <label class="{{ $labelClass }}">Correo electrónico</label>
                        <input type="email" name="email" required placeholder="juan@empresa.com" class="{{ $fieldClass }}">
                    </div>
                    <div>
                        <label class="{{ $labelClass }}">Teléfono de obra</label>
                        <input type="tel" name="telefono" placeholder="33 0000 0000" class="{{ $fieldClass }}">
                    </div>
                    <div>
                        <label class="{{ $labelClass }}">Tipo de proyecto</label>
                        <select name="tipo" class="{{ $fieldClass }} appearance-none">
                            <option>Residencial</option>
                            <option>Industrial</option>
                            <option>Infraestructura</option>
                            <option>Remodelación</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="{{ $labelClass }}">Detalles estructurales / Mensaje</label>
                    <textarea name="mensaje" rows="6" required placeholder="Describa brevemente los alcances del proyecto..." class="{{ $fieldClass }}"></textarea>
                </div>

                {{-- Honeypot anti-spam (oculto para humanos) --}}
                <input type="text" name="website" tabindex="-1" autocomplete="off" class="hidden" aria-hidden="true">

                <label class="flex items-start gap-3 text-sm text-gray-500">
                    <input type="checkbox" name="acepto" required class="mt-0.5 h-4 w-4 shrink-0 accent-brand-600">
                    <span>Acepto el tratamiento de mis datos técnicos según la política de privacidad de {{ $page->siteName }}.</span>
                </label>

                <button type="submit"
                        class="bg-brand-600 px-8 py-4 font-mono text-xs uppercase tracking-[0.18em] text-white transition hover:bg-brand-700">
                    Enviar solicitud de contacto
                </button>
            </form>
        </div>

        {{-- Office info --}}
        <div class="space-y-10 border-gray-200 py-16 lg:border-l lg:pl-16">
            <div>
                <span class="label-mono text-gray-400">[02] Oficina central</span>
                <p class="mt-3 text-gray-700">{{ $page->contact['address'] }}<br>{{ $page->contact['city'] }}</p>
            </div>
            <div>
                <span class="label-mono text-gray-400">[03] Líneas directas</span>
                <div class="mt-3 space-y-1 text-gray-700">
                    @foreach ($page->contact['phones'] as $phone)
                        <p>T: <a href="tel:{{ $page->contact['country_code'] . preg_replace('/\D+/', '', $phone) }}" class="transition hover:text-brand-600">{{ $phone }}</a></p>
                    @endforeach
                    @foreach ($page->contact['emails'] as $email)
                        <p>M: <a href="mailto:{{ $email }}" class="transition hover:text-brand-600">{{ $email }}</a></p>
                    @endforeach
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between">
                    <span class="label-mono text-gray-400">[04] Geo-localización</span>
                    <span class="label-mono text-gray-400">{{ $page->contact['geo']['ref'] }}</span>
                </div>
                <div class="relative isolate mt-3 aspect-[16/9] overflow-hidden border border-gray-200 bg-gray-100">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1298.526345582974!2d-103.29234089529419!3d20.506776654077747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842f4c4087691f73%3A0xda6518e8aab1e696!2sC.%20Ni%C3%B1os%20H%C3%A9roes%203%2C%20San%20Vicente%2C%2045672%20Zapote%20del%20Valle%2C%20Jal.!5e0!3m2!1ses-419!2smx!4v1783035044407!5m2!1ses-419!2smx"
                        class="absolute inset-0 h-full w-full"
                        style="border:0;" allowfullscreen loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"
                        title="Ubicación de JEZGA — {{ $page->contact['address'] }}"></iframe>
                    <span class="pointer-events-none absolute left-3 top-3 z-10 bg-gray-900 px-2 py-1 font-mono text-[0.6rem] uppercase tracking-[0.18em] text-white">{{ $page->contact['geo']['label'] }}</span>
                </div>
            </div>
        </div>
    </div>
</section>
