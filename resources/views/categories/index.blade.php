@extends('layouts.admin')

@section('content')
<div class="content" id="categories-list">
    <table id="list" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection

@section('js-scripts')
<script src="{{ asset('libraries/plugins/datatables/datatables.min.js') }}"></script>
@endsection

@section('css-scripts')
<link rel="stylesheet" href="{{ asset('libraries/plugins/datatables/datatables.css') }}">
@endsection