<div class="form-group">
    <label>Branch Name</label>
    <input type="text" name="branch_name" id="branch_name" class="form-control" />
</div>
<div class="form-group">
    <label>Branch Description</label>
    <input type="text" name="branch_desc" id="branch_desc" class="form-control" />
</div>

<script>
    $(document).ready(function() {
        // need
        var branch_name = localStorage.getItem('branch_name');
        var branch_desc = localStorage.getItem('branch_desc');

        $('#branch_name').val(branch_name);
        $('#branch_desc').val(branch_desc);

    });
</script>