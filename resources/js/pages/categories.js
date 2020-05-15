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
            { 'data': 'type' }
        ]
    });
}