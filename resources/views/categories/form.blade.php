@extends('layouts.admin')

@section('content')
<div class="content uper" id="categories-edit">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Formulario @if ($category) Editar @elseif (!$category) Nueva @endif Categoria</h3>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Exito</h5>
                        {{ session('success') }}
                    </div><br/>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Errores</h5>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                     @if ($category)
                    <form method="post" action="{{ route('categories-update', $category->id) }}">
                    @method('PUT')
                    @elseif (!$category)
                    <form method="post" action="{{ route('categories-store') }}">
                    @endif
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="InputName">Nombre</label>
                                <input type="text" id="InputName" class="form-control @error('name') is-invalid @enderror" placeholder="Ingresa un nombre" name="name"  @if ($category) value="{{ $category->name }}" @endif />
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tipo</label>
                                        <select name="type" class="form-control">
                                            <option value="compania" @if ($category && $category->type == 'compania') selected @endif >Compañia</option>
                                            <option value="producto" @if ($category && $category->type == 'producto') selected @endif>Producto</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection