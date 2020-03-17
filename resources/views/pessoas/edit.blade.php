@extends('template.app')

@section('content')
    <div class="col-md-8 well">  
        <form class="col-md-12" action="{{ url('/pessoas/update') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $pessoa->id }}">
            <div class="class=col-md-8">
                <h3>Editar nome do Contato:</h3> 
            </div>
            <div class="row">
            <div class="form-group col-md-8 ">
                <label class="control-label">Nome:</label>
                <input name="nome" value="{{ $pessoa->nome }}" class="form-control">
            </div>
            </div>            
            <div class="col-md-8">
                <button style="margin-top: 5px; float: right" class="btn btn-success">Editar</button>  
            </div>
        </form> 
    </div>   
@endsection