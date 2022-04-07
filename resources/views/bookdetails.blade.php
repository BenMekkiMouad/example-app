<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('details') }}
        </h2>
    </x-slot>
     
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card">
                    <img class="card-img-top" src="ens.jpg" alt="Card image cap">
                    <div class="card-body">
                    <a href="#" ><h5 class="card-title">Titre :{{ $book->titre }}</h5></a>
                    <a href=" #" ><p class="card-text">Auteur : {{ $book->auteur }}</p></a>
                    <a href=" #" ><p class="card-text">{{ $book->description }}</p></a>
                    </div>
                    
                </div>
            </div>  
        </div>
    </div>

</x-app-layout>