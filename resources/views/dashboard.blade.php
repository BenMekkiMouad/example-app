<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="books.png">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <h6 class="card-title">Bienvenue {{ Auth::user()->name }}</h6>
                @if(Auth::user()->role == 1)
                    <button type="button" class="btn btn-warning" m-7><a href="Oeuvre">Admin Dashboard</a></button>
                    
                @endif 
            </div>
            
        </div>
    </div>

    
    
</x-app-layout>
 