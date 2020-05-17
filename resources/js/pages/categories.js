const URLS = require('../urls');

// Categories List
if ($('#categories-list').length > 0) {
    $('#list').DataTable({
        'processing': true,
        'serverSide': true,
        'ajax': {
            'url': '/categorias/paginado',
            'type': 'GET'
        },
        'columns': [
            { 'data': 'id' },
            { 'data': 'name' },
            { 'data': 'type' },
            { 'data': 'options',
              'render': function(data, type, row, meta) {
                return `<div class="btn-group">
                            <a href="${URLS.CATEGORY}/editar/${row.id}" class="btn btn-info"><i class="right fas fa-edit"></i></a>
                            <a class="btn btn-danger"><i class="right fas fa-trash"></i></a>
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
}
// Categories Edit
if ($('#categories-edit').length > 0) {

}