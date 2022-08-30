<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Formulario de contacto') }}
        </h2>
    </x-slot>  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route("contact.send") }}">
                        {{-- `Directiva csrf añade un token al formulario --}}
                        @csrf
                        <div class="block mt-4">
                            <x-form-input name="subject" label="Escribe el motivo de tu mensaje" />
                        </div>
                        <div class="block mt-4">
                            <x-form-textarea name="message" label="Escribe tu mensaje aqui" />
                        </div>
                        <div class="flex items-center justify-end mt-4"> 
                            <x-button> Enviar mensaje</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>