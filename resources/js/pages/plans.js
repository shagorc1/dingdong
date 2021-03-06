const URLS = require('../urls');

// Plans List
if ($('#plans-list').length > 0) {
    // Plans data table
    $('#list').DataTable({
        'processing': true,
        'serverSide': true,
        'ajax': {
            'url': '/planes/paginado',
            'type': 'GET'
        },
        'columns': [
            { 'data': 'id' },
            { 'data': 'name' },
            { 'data': 'price' },
            { 'data': 'description' },
            { 'data': 'options',
              'render': function(data, type, row, meta) {
                return `<div class="btn-group">
                            <a href="${URLS.PLANS}/editar/${row.id}" class="btn btn-info"><i class="right fas fa-edit"></i></a>
                            <a class="btn-delete btn btn-danger" data-toggle="modal" data-target="#myModal" data-id="${row.id}" data-name="${row.name}"><i class="right fas fa-trash"></i></a>
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
        let urlForm = `/${URLS.PLANS}/eliminado/${id}`;

        $('#planName').html(name);
        $('#delete-form').attr('action', urlForm);
        $('#btn-submit-delete').click(function(e) {
            $('#delete-form').submit();
        });
    });
}