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
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#user" aria-expanded="false" aria-controls="collapseExample">
                                Formulario Usuario
                            </button>
                            <div class="collapse" id="user">
                                @if ($busines)
                                    <input type="hidden" value="{{ $busines->id }}" name="id" />
                                    <input type="hidden" value="{{ $busines->user_id }}" name="user_id" />
                                @endif
                                <div class="form-group">
                                    <label for="InputName">Nombre</label>
                                    <input type="text" id="InputUsername" class="form-control @error('username') is-invalid @enderror" placeholder="Ingresa un nombre" name="username"  @if ($user) value="{{ $user['username'] }}" @elseif ($request) value="{!! $request->old('username') !!}" @endif />
                                </div>
                                <div class="form-group">
                                    <label for="InputLastName">Apellidos</label>
                                    <input type="text" id="InputLastName" class="form-control @error('lastname') is-invalid @enderror" placeholder="Ingrese apellidos" name="lastname"  @if ($user) value="{{ $user['lastname'] }}" @elseif ($request) value="{!! $request->old('lastname') !!}" @endif />
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">E-mail</label>
                                    <input type="text" id="inputEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese un Email" name="email"  @if ($user) value="{{ $user['email'] }}" @elseif ($request) value="{!! $request->old('email') !!}" @endif />
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Contraseña</label>
                                    <input type="text" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Ingrese una Contraseña" name="password" />
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Repite-Contraseña</label>
                                    <input type="text" id="inputPassword2" class="form-control @error('password2') is-invalid @enderror" placeholder="Ingrese otra vez Contraseña" name="password_confirmation" />
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone">Telefono</label>
                                    <input type="text" id="inputPhone" class="form-control @error('phone') is-invalid @enderror" placeholder="Ingrese un telefono" name="phone" @if ($user) value="{{ $user['phone'] }}" @elseif ($request) value="{!! $request->old('phone') !!}" @endif />
                                </div>
                            </div>
                            <br/>
                            <h5 class="card-title">Formulario Negocio</h5>
                            <br/>
                            <div class="form-group">
                                <label for="InputName">Nombre</label>
                                <input type="text" id="InputName" class="form-control @error('name') is-invalid @enderror" placeholder="Ingresa un nombre" name="name"  @if ($busines) value="{{ $busines->name }}" @elseif ($request) value="{!! $request->old('name') !!}" @endif />
                            </div>
                            <div class="form-group">
                                <label for="InputDescription">Descripcion</label>
                                <input type="text" rows="5" id="InputDescription" class="form-control @error('description') is-invalid @enderror" placeholder="Ingresa una descripcion" name="description"  @if ($busines) value="{{ $busines->description }}" @elseif ($request) value="{!! $request->old('description') !!}" @endif />
                            </div>
                            <div class="form-group">
                                <label for="InputAddress">Direccion</label>
                                <input type="text" id="InputAddress" class="form-control @error('address') is-invalid @enderror" placeholder="Ingresa una direccion" name="address"  @if ($busines) value="{{ $busines->address }}" @elseif ($request) value="{!! $request->old('address') !!}" @endif />
                            </div>
                            <div class="form-group">
                                <label for="InputGeolocation">Geolocalización</label>
                                <input type="text" rows="5" id="InputGeolocation" class="form-control @error('geolocation') is-invalid @enderror" placeholder="Ingresa una geolocalización" name="geolocation"  @if ($busines) value="{{ $busines->geolocation }}" @elseif ($request) value="{!! $request->old('geolocation') !!}" @endif />
                            </div>
                            <div class="form-group">
                                <label>Municipios</label>
                                <select name="municipality_id" class="form-control">
                                    @foreach ($municipalities->sortBy('name') as $mun)
                                    <option value="{{ $mun->id }}" @if ($busines && $busines->municipality->id == $mun->id) selected @elseif ($request && $request->old('municipality') == $mun->id) selected @endif>{{ $mun->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Categorias</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories->sortBy('name') as $cat)
                                    <option value="{{ $cat->id }}" @if ($busines && $busines->category->id == $cat->id) selected @elseif ($request && $request->old('category') == $cat->id) selected @endif>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
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