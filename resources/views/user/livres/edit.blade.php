@extends('user.template')

@section('h1')
  Modifier le livre
@endsection

@section('mycontent')
    <div class="container">
        <form action="{{ route('user.livres.update',$livre->id) }}" method="post" >
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Titre du livre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $livre->title }}">
             <div class="text-danger">{{ $errors->first('title', ":message")}} 
            </div>
            <div class="form-group">
                <label for="name">Nom de l'auteur</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $livre->name }}">
            
                <div class="text-danger">{{ $errors->first('name', ":message")}} 
            </div>
            
          
            </div>
            <div class="form-group">
                <label for="content">Avis</label>
                <textarea name="content" id="content" class="form-control" rows="10">{{ $livre->content }}</textarea>
                <div class="text-danger">{{$errors->first('content',":message") }}</div>
                

<div class="form-group">
    <label for="Note">Note/20</label>
    <input type="integer" name="note" id="note" class="form-control" value="{{ $livre->note }}">
    <div class="text-danger">{{ $errors->first('note', ":message")}} 
</div>       
              
              
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Modifier">
            </div>
        </form>
    </div>
@endsection