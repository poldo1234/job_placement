
$(document).ready(function () {
    // Fetch
    var dataTable = $('#quarterly_data').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetch.php",
            type: "POST"
        },
        "columnDefs": [{
            "targets": [4, 5],
            "orderable": false,
        },],

    });

    // Add
    $('#add_data').click(function () {
        var options = {
            ajaxPrefix: ''
        };
        new Dialogify('add_data_form.php', options)
            .title('Add New Report')
            .buttons([{
                text: 'Cancel',
                click: function (e) {
                    this.close();
                }
            },
            {
                text: 'Add',
                type: Dialogify.BUTTON_PRIMARY,
                click: function (e) {
                    var form_data = new FormData();

                    // 
                    form_data.append('branch_name', $('#branch_name').val());
                    form_data.append('branch_desc', $('#branch_desc').val());

                    $.ajax({
                        method: "POST",
                        url: 'insert_data.php',
                        data: form_data,
                        dataType: 'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            if (data.error != '') {
                                $('#form_response').html('<div class="alert alert-danger">' + data.error + '</div>');
                            } else {
                                $('#form_response').html('<div class="alert alert-success">' + data.success + '</div>');
                                dataTable.ajax.reload();
                            }
                        }
                    });
                }
            }
            ]).showModal();
    });
    // Update
    $(document).on('click', '.update', function () {
        var id = $(this).attr('id');
        $.ajax({
            url: "fetch_single_data.php",
            method: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function (data) {
                // need
                localStorage.setItem('branch_name', data[0].branch_name);
                localStorage.setItem('branch_desc', data[0].branch_desc);

                var options = {
                    ajaxPrefix: ''
                };
                new Dialogify('edit_data_form.php', options)
                    .title('Edit Branch')
                    .buttons([{
                        text: 'Cancel',
                        click: function (e) {
                            this.close();
                        }
                    },
                    {
                        text: 'Update',
                        type: Dialogify.BUTTON_PRIMARY,
                        click: function (e) {
                            var form_data = new FormData();
                            // need
                            form_data.append('branch_name', $('#branch_name').val());
                            form_data.append('branch_desc', $('#branch_desc').val());

                            // 
                            form_data.append('id', data[0].id);

                            $.ajax({
                                method: "POST",
                                url: 'update_data.php',
                                data: form_data,
                                dataType: 'json',
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function (data) {
                                    if (data.error != '') {
                                        $('#form_response').html('<div class="alert alert-danger">' + data.error + '</div>');
                                    } else {
                                        $('#form_response').html('<div class="alert alert-success">' + data.success + '</div>');
                                        dataTable.ajax.reload();
                                    }
                                }
                            });
                        }
                    }
                    ]).showModal();
            }
        })
    });
    // Delete
    $(document).on('click', '.delete', function () {
        var id = $(this).attr('id');
        Dialogify.confirm("<h3 class='text-danger'><b>Are you sure you want to remove this data?</b></h3>", {
            ok: function () {
                $.ajax({
                    url: "delete_data.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        Dialogify.alert('<h3 class="text-success text-center"><b>Data has been deleted</b></h3>');
                        dataTable.ajax.reload();
                    }
                })
            },
            cancel: function () {
                this.close();
            }
        });
    });
});