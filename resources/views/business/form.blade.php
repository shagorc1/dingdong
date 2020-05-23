@extends('layouts.admin')

@section('content')
<div class="content uper" id="business-edit">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Formulario @if ($busines) Editar @elseif (!$busines) Nueva @endif Negocio</h3>
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
                     @if ($busines)
                    <form method="post" action="{{ route('business-update', $busines->id) }}">
                    @method('PUT')
                    @elseif (!$busines)
                    <form method="post" action="{{ route('business-store') }}">
                    @endif
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="InputName">Nombre</label>
                                <input type="text" id="InputName" class="form-control @error('name') is-invalid @enderror" placeholder="Ingresa un nombre" name="name"  @if ($busines) value="{{ $busines->name }}" @endif />
                            </div>
                            <div class="form-group">
                                <label for="InputPrice">Direccion</label>
                                <input type="text" id="InputPrice" class="form-control @error('price') is-invalid @enderror" placeholder="Ingresa una direccion" name="address"  @if ($busines) value="{{ $busines->address }}" @endif />
                            </div>
                            <div class="form-group">
                                <label for="InputDescription">Descripcion</label>
                                <input type="text" rows="5" id="InputDescription" class="form-control @error('descripcion') is-invalid @enderror" placeholder="Ingresa una descripcion" name="description"  @if ($busines) value="{{ $busines->description }}" @endif />
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