const URLS = require('../urls');

// Clients List
if ($('#clients-list').length > 0) {
    // Clients data table
    $('#list').DataTable({
        'processing': true,
        'serverSide': true,
        'ajax': {
            'url': '/clientes/paginado',
            'type': 'GET'
        },
        'columns': [
            { 'data': 'id' },
            { 'data': 'name' },
            { 'data': 'last_name' },
            { 'data': 'email' },
            { 'data': 'telephone' },
            { 'data': 'options',
              'render': function(data, type, row, meta) {
                return `<div class="btn-group">
                            <a href="${URLS.CLIENTS}/editar/${row.id}" class="btn btn-info"><i class="right fas fa-edit"></i></a>
                            <a class="btn-delete btn btn-danger" data-toggle="modal" data-target="#myModal" data-id="${row.id}" data-name="${row.name} ${row.last_name}"><i class="right fas fa-trash"></i></a>
                        </div>`;
              }
            }
        ],
        'language': {
            'lengthMenu': 'Display _MENU_ records per page',
            'zeroRecords': 'Nothing found - sorry',
            'info': 'Showing page _PAGE_ of _PAGES_',
            'infoEmpty': 'No records available',
            'infoFiltered': '(filtered from _MAX_ total records)'
        }
    });
    // Button delete
    $('#list').on('click', '.btn-delete', function(evt) {
        let id = evt.currentTarget.getAttribute('data-id');
        let name = evt.currentTarget.getAttribute('data-name');
        let urlForm = `/${URLS.CLIENTS}/eliminado/${id}`;

        $('#clientName').html(name);
        $('#delete-form').attr('action', urlForm);
        $('#btn-submit-delete').click(function(e) {
            $('#delete-form').submit();
        });
    });
}
// Bussiness Edit
if ($('#clients-edit').length > 0) {
   
}