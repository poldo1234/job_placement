
// Branch datatable
$(document).ready(function () {
    $('#example').DataTable({
        "processing": true,
        "ajax": "script/fetch_branches.php",
        "columns": [
            { data: 'id' },
            { data: 'branch_name' },
            { data: 'branch_desc' },
        ]
    });
});