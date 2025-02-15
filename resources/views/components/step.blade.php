<div class="grid justify-center grid-cols-4 p-8 mx-auto space-y-8 lg:space-y-0">
    <!-- Icono -->
    <div class="flex items-center justify-center lg:col-span-1 col-span-full">
        {!! $icon !!}
    </div>

    <!-- Contenido -->
    <div class="flex flex-col justify-center max-w-3xl text-center col-span-full lg:col-span-3 lg:text-left">
        <span class="text-xs tracking-wider uppercase text-beige">{{ $stepTitle }}</span>
        <span class="text-xl font-bold md:text-2xl">{{ $mainTitle }}</span>
        <span class="mt-4 text-gray-300">{{ $description }}</span>
    </div>
</div>

<!-- Línea divisoria -->
<div class="border-t-2 border-{{ $dividerColor }} mt-8"></div>
