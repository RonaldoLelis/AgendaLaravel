@extends('template.app')

@section('content')
    
    
    <div class="col-md-12 well">  
        <form class="col-md-12" action="{{ url('/pessoas/store') }}" method="POST">
            {{ csrf_field() }}
            <div class="class=col-md-12">
            <h3>Novo Contato:</h3> 
            </div>
            <div class="row">
            <div class="form-group col-md-12 ">
                <label class="control-label">Nome:</label>
                <input name="nome" class="form-control">
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-4 ">
                <label class="control-label">DDD:</label>
                <input name="ddd" class="form-control">
            </div> 
            <div class="form-group col-md-8 ">
                <label class="control-label">Telefone:</label>
                <input name="telefone" class="form-control">
            </div> 
            </div> 
            <div class="col-md-12">
                <button style="margin-top: 5px; float: right" class="btn btn-success">Salvar</button>  
            </div>
        </form>    
    </div> 

@endsection
