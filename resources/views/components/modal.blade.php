<div id="{{ $id }}" class="hidden opacity-0 fixed top-0 left-0 w-screen h-screen bg-black/20 items-center justify-center backdrop-blur-sm z-20 transition duration-500">
    <div class="bg-white drop-shadow-lg p-6 rounded-lg flex flex-col gap-4">
        <div class="flex justify-between items-start gap-8">
            <h2 class="text-lg font-semibold text-emerald-500">{{ $title }}</h2>
            <button id="btn-close-{{ $name }}-modal-{{ $index }}" class="btn-close-{{ $name }}-modal" >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 stroke stroke-black/80 pointer-events-none" viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        {{ $slot }}
    </div>
</div>