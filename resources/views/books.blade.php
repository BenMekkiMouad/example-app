<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-19 lg:px-18">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   @foreach($categories as $category)
                    <div class="card text-white bg-info mb-3">
                        <a href="{{route('voirparcategorie',['id'=>$category->id])}}"><b>{{ $category->nom }}</b></a>
                    </div>                   
                    
                    @endforeach
                   
                   
                </div>
            </div>
        </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @forelse($books as $mybook)
                
                    <div class="card-group" >
                        <div class="card text-white bg-warning mb-3" style="width: 3rem;">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{route('bookdetails', ['id'=>$mybook->id])}}" ><div class="titre"><b>{{ $mybook->titre }}</b></div></a></h5>
                                <p class="card-text"><a href="{{route('bookdetails', ['id'=>$mybook->id])}}" ><div class="titre"><i>{{ $mybook->auteur }}</i></div></a></p>
                        
                            </div>
                        </div>
                    </div>
                
                @empty
                    <div>No Item Found!</div>
                @endforelse
                </div>
                
     
               <!-- @forelse($books as $mybook)
                <div class="book">
                    <a href="{{route('bookdetails', ['id'=>$mybook->id])}}" ><div class="titre"><b>{{ $mybook->titre }}</b></div></a>
                    <a href="{{route('bookdetails', ['id'=>$mybook->id])}}" ><div class="titre"><i>{{ $mybook->auteur }}</i></div></a>

                </div>
                </br>
                @empty
                    <div>No Item Found!</div>
                @endforelse
-->
            </div>
        </div>
    </div>

</x-app-layout>
