@extends('layouts.admin')

@section('content')
<div class="content uper" id="categories-edit">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Formulario @if ($clients) Editar @elseif (!$clients) Nuevo @endif Cliente</h3>
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
                        @if ($clients)
                    <form method="post" action="{{ route('clients-update', $clients->id) }}">
                    @method('PUT')
                    @elseif (!$clients)
                    <form method="post" action="{{ route('clients-store') }}">
                    @endif
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="InputName">Nombre</label>
                                <input type="text" id="InputName" class="form-control @error('name') is-invalid @enderror" placeholder="Ingresa un nombre" name="name"  @if ($clients) value="{{ $clients->name }}" @endif />
                            </div>
                            <div class="form-group">
                                <label for="InputLastName">Apellidos</label>
                                <input type="text" id="InputLastName" class="form-control @error('lastname') is-invalid @enderror" placeholder="Ingrese apellidos" name="lastName"  @if ($clients) value="{{ $clients->lastName }}" @endif />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">E-mail</label>
                                <input type="text" id="inputEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese un Email" name="email"  @if ($clients) value="{{ $clients->email }}" @endif />
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