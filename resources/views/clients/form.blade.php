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
                            @if ($clients)
                                <input type="hidden" value="{{ $clients->id }}" name="user_id" />
                            @endif
                            <div class="form-group">
                                <label for="InputName">Nombre</label>
                                <input type="text" id="InputName" class="form-control @error('name') is-invalid @enderror" placeholder="Ingresa un nombre" name="name"  @if ($clients) value="{{ $clients->name }}" @elseif ($request) value="{!! $request->old('name') !!}" @endif />
                            </div>
                            <div class="form-group">
                                <label for="InputLastName">Apellidos</label>
                                <input type="text" id="InputLastName" class="form-control @error('lastname') is-invalid @enderror" placeholder="Ingrese apellidos" name="lastname"  @if ($clients) value="{{ $clients->last_name }}" @elseif ($request) value="{!! $request->old('lastname') !!}" @endif />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">E-mail</label>
                                <input type="text" id="inputEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese un Email" name="email"  @if ($clients) value="{{ $clients->email }}" @elseif ($request) value="{!! $request->old('email') !!}" @endif />
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
                                <input type="text" id="inputPhone" class="form-control @error('phone') is-invalid @enderror" placeholder="Ingrese un telefono" name="phone" @if ($clients) value="{{ $clients->telephone }}" @elseif ($request) value="{!! $request->old('phone') !!}" @endif />
                            </div>
                            <div class="form-group">
                                <label>Planes</label>
                                <select name="plan_id" class="form-control">
                                    @foreach ($plans->sortBy('name') as $plan)
                                    <option value="{{ $plan->id }}" @if ($clients && $clients->plan->id == $plan->id) selected @elseif ($request && $request->old('plan_id') == $plan->id) selected @endif>{{ $plan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Calle</label>
                                <input type="text" class="form-control @error('street') is-invalid @enderror" placeholder="Ingrese una calle" name="street" @if ($clients) value="{{ $clients->address->street }}" @elseif ($request) value="{!! $request->old('street') !!}" @endif />
                                <label>Numero</label>
                                <input type="text" class="form-control @error('number') is-invalid @enderror" placeholder="Ingrese un numero de calle" name="number" @if ($clients) value="{{ $clients->address->number }}" @elseif ($request) value="{!! $request->old('number') !!}" @endif />
                            </div>
                            <div class="form-group">
                                <label>Colonia</label>
                                <input type="text" class="form-control @error('colony') is-invalid @enderror" placeholder="Ingrese una colonia" name="colony" @if ($clients) value="{{ $clients->address->colony }}" @elseif ($request) value="{!! $request->old('colony') !!}" @endif />
                                <label>CP</label>
                                <input type="text" class="form-control @error('cp') is-invalid @enderror" placeholder="Ingrese un codigo postal" name="cp" @if ($clients) value="{{ $clients->address->cp }}" @elseif ($request) value="{!! $request->old('cp') !!}" @endif />
                            </div>
                            <div class="form-group">
                                <label for="InputGeolocation">Geolocalización</label>
                                <input type="text" rows="5" id="InputGeolocation" class="form-control @error('geolocation') is-invalid @enderror" placeholder="Ingresa una geolocalización" name="geolocation"  @if ($clients) value="{{ $clients->address->geolocation }}" @elseif ($request) value="{!! $request->old('geolocation') !!}" @endif />
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="state_id" class="form-control">
                                    @foreach ($states->sortBy('name') as $sta)
                                    <option value="{{ $sta->id }}" @if ($clients && $clients->address->state_id == $sta->id) selected @elseif ($request && $request->old('state_id') == $sta->id) selected @endif>{{ $sta->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Municipios</label>
                                <select name="municipality_id" class="form-control">
                                    @foreach ($municipalities->sortBy('name') as $mun)
                                    <option value="{{ $mun->id }}" @if ($clients && $clients->address->municipality_id == $mun->id) selected @elseif ($request && $request->old('municipality_id') == $mun->id) selected @endif>{{ $mun->name }}</option>
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