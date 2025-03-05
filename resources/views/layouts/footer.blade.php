<div>
    <footer class="text-gray-500 bg-crema px-4 py-5 mx-auto md:px-8 w-full border-t border-gray-300">
        <div class="max-w-lg sm:mx-auto sm:text-center">
            <img src="{{ asset('images/vienna-deco-fondo.jpg') }}" alt="Verona Logo" id="logo" />
            <p class="leading-relaxed mt-2 text-[15px]">
                Con nuestro compromiso con la excelencia y la precisión,
                transformamos cada producto en un testimonio de elegancia y
                calidad. Déjanos ser tu socio en la creación de ambientes únicos
                y duraderos.
            </p>
        </div>
        <ul class="items-center justify-center mt-8 space-y-5 sm:flex sm:space-x-4 sm:space-y-0">
            @foreach ($footerNavs as $item)
                <li class="hover:text-gray-800">
                    <a href="{{ $item['href'] }}">{{ $item['name'] }}</a>
                </li>
            @endforeach
        </ul>

        <div class="flex items-center justify-center mt-6 sm:mt-0">
            @include('components.redes-footer')
        </div>
        <div class="mt-8 items-center justify-center sm:flex">
            <div class="mt-6 sm:mt-0">
                2025 • &copy; Vienna Deco • Todos los derechos reservados
            </div>
        </div>
        <div class="items-center justify-center sm:flex">
            <div class="mt-6 sm:mt-0">
                Diseño y desarrollo por Octavio Serrago
            </div>
        </div>
    </footer>
</div>