<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   @foreach($categories as $category)
                    <div class="category">
                        <a href="{{route('voirparcategorie',['id'=>$category->id])}}"><b>{{ $category->nom }}</b></a>
                    </div>
                    </br>
                    @endforeach
                   
                   
                </div>
            </div>
        </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                @forelse($books as $mybook)
                <div class="book">
                    <a><div class="titre"><b>{{ $mybook->titre }}</b></div></a>
                    <a><div class="titre"><i>{{ $mybook->auteur }}</i></div></a>

                </div>
                </br>
                @empty
                    <div>No Item Found!</div>
                @endforelse
               
            </div>
        </div>
    </div>

</x-app-layout>
