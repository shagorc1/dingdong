@extends('layouts.admin')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Exito</h5>
    {{ session('success') }}
</div><br/>
@endif
<div class="content" id="business-list">
    <table id="list" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Descripcion</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Eliminar Negocio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el plan <strong id="businessName">Nombre</strong>?
        <form id="delete-form" method="delete" action="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button id="btn-submit-delete" type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js-scripts')
<script src="{{ asset('libraries/plugins/datatables/datatables.min.js') }}"></script>
@endsection

@section('css-scripts')
<link rel="stylesheet" href="{{ asset('libraries/plugins/datatables/datatables.css') }}">
@endsection