
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Admin Dashboard</title>
</head>
<body>
    
</body>
</html>

@if(auth::user()->role==1)

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.all.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
<div class="container">
<div class="row">
<div class="col-md-12">

<a href="{{ url('/dashboard') }}"><button  class="btn btn-secondary" ><i class="fa fa-home" aria-hidden="true"></i>
Accueil</button></a>
<h1>Liste des ouvrages disponibles</h1>
<a href="{{ url('Oeuvre/create') }}"><button  class="btn btn-primary" >Ajouter Oeuvre</button></a>

<hr>
<div class="card-body">
    <div class="table table-responsive">
        <table class="table-bordred">
            <thead>
                <tr>
                    <th>titre</th>
                    <th>auteur</th>
                    <th>date de publication</th>
                </tr>
            </thead>
            <tbody>
                @foreach($oeuvre as $ouvrage)
                <tr>
                    <td>{{ $ouvrage->titre }}</td>
                    <td>{{ $ouvrage->auteur }}</td>
                    <td>{{ $ouvrage->annee }}</td>
                    <td>
                        <form action="{{ route('Oeuvre.destroy',$ouvrage) }}" method="POST">
                            @csrf
                            @method("DELETE")

                            <button type="submit"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                        </form>
                    </td>
                    <td>
                        @if(auth::user()->role==1)
                        
                        <a type="button"  href="{{ route('Oeuvre.edit', $ouvrage)}}"  class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                        
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form action="{{ route('Oeuvre.update', ['oeuvre' => $record->id]) }}"  method="POST">
            @csrf
            @method("PUT")
         <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                             
                        <label for="titre">Titre</label>
                        <input class="form-control" value="{{$oeuvre->titre }}" name="titre" type="text" placeholder="titre" />
                   
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <label for="auteur">Auteur</label>
                        <input class="form-control" value="{{$oeuvre->auteur}}" name="auteur" type="text" placeholder="auteur" />
                        
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                 <label for="annee">Date publication</label>
                <input class="form-control" value="{{$oeuvre->annee}}" name="annee"  type="text" placeholder="date" />
               
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                         <label for="description">Description</label>
                    <textarea
                        name="description" 
                        class="form-control" 
                         value="{{$oeuvre->description}}"
                        placeholder="Enter desc">
                       
                        
                    </textarea>                    
                   
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="categorie">
                        <label for="category_id">Categorie</label>
                        <select class="form-control" 
                            id="category_id" 
                            name="category_id" 
                            value="">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->nom}}</option>
                            @endforeach 
                        
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                         <label for="qt">Qt</label>
                        <input class="form-control" value="{{$oeuvre->qt}} name="qt" type="text" placeholder=" qt" />
                       
                    </div>
                </div>
            </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
@endif