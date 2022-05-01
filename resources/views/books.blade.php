<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <i class="fas fa-columns"></i>
                                Categorys :
                                <i class="fas fa-angle-down"></i>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                        @foreach($categories as $category)
                                            <div class="card text-white bg-info mb-3 m-2 p-1">
                                                <a href="{{route('voirparcategorie',['id'=>$category->id])}}" ><b>{{ $category->nom }}</b></a>

                                            </div>  
                                                           
                                        @endforeach
                                                             
                                </nav>
                            </div>


                    
                           
                           
            
  <!--          
            <style>
               
                ul {
                    list-style:none;
                    margin:0;
                    padding:0
                }
                #menu > li {
                    display:inline-block;
                    position:relative;
                }
                #menu li ul {
                    position:absolute;
                   
                    width:250px;
                    max-height:0;
                    overflow:hidden;
                    z-index: 2;
                    -moz-transition: 1s;
                    -ms-transition: 1s;
                    -o-transition: 1s;
                    -webkit-transition: 1s;
                    transition: 1s;
                    background-color:white;
                    padding: 0.8rem;
 
                }
                #menu li:hover ul {
                    overflow:auto;
                    max-height:150px;
    
                }
            </style>
                            
            <ul id='menu'>
               
                <li style=" width:7rem;">Categorys :
                    <ul>
                        <li>@foreach($categories as $category)
                                <div class="card text-white bg-info mb-3">
                                    <a href="{{route('voirparcategorie',['id'=>$category->id])}}" ><b>{{ $category->nom }}</b></a>
                                </div>                   
                            @endforeach
                        </li>
                        
                    </ul>
                </li>
            </ul>
            
        
        
        </h2>
            -->
    </x-slot>
    
       

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="card-group">
                @forelse($books as $mybook)  
                <div class="card mr-3">
                    <img class="card-img-top" src="ens.jpg" alt="Card image cap">
                    <div class="card-body">
                    <a href="{{route('bookdetails', ['id'=>$mybook->id])}}" ><h5 class="card-title"><b>{{ $mybook->titre }}</b></h5></a>
                    <a href="{{route('bookdetails', ['id'=>$mybook->id])}}" ><p class="card-text"><i>{{ $mybook->auteur }}</i></p></a>
                    </div>
                    
                </div>
                @empty
                    <div>No Item Found!</div>
                @endforelse
     
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

    <div class="mt-6 p-4">
        {{$books->links()}}
    </div>


</x-app-layout>
