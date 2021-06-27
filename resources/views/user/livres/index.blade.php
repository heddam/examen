@extends('user.template')

@section('h1')
   Mes Livres lus
   @endsection

 @section('mycontent')
<div class="d-flex justify-content-end aligh-item-center my-3">
    <a href="{{route('user.livres.create') }}" class="btn btn-primary"> Ajouter nouveau livre</a>
</div>

 @if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session('warning')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif

    <div class="table-responsive">
        <table  id="table" class="table table-striped table-hover text-center">
            <thead class="bg-livre text-white">
                <tr>
                    
                    <th>Titre_livre</th>
                    <th>Nom_auteur</th>
                    <th>date de création</th>
                    <th>date de modification</th>
                    <th>Paramètres</th>
                </tr>
            </thead>
    
             <tbody>
               @foreach ($livres as $livre)
                    <tr>
                         <td>{{ $livre->title }}</td>
                         <td>{{ $livre->name }}</td>
                        <td>{{ $livre->created_at}}</td>
                        <td>{{ $livre->updated_at}}</td>

                        
                        <td>
                         
                       <a href="{{ route('user.livres.edit', $livre->id) }}" class="btn btn-sm btn-success">Modifier</a>
                         <form action="{{ route('user.livres.delete', $livre->id)}}"  method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Supprimer" class="btn btn-sm btn-danger" onclick=" return confirm('Confirmer la supprission ?? ')">
                        </form>
               
                    </td>   
                    </tr>
                @endforeach
            </tbody>  
        </table>
    </div>
        
  @endsection  