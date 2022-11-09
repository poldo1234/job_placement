<div class="form-group">
    <label>Branch ID</label>
    <input type="text" name="branch_id" id="branch_id" class="form-control" disabled />
</div>
<div class="form-group">
    <label>Course Name</label>
    <input type="text" name="course_name" id="course_name" class="form-control" />
</div>
<div class="form-group">
    <label>Course Description</label>
    <input type="text" name="course_desc" id="course_desc" class="form-control" />
</div>

<script>
    $(document).ready(function() {
        // need
        var branch_id = localStorage.getItem('branch_id');
        var course_name = localStorage.getItem('course_name');
        var course_desc = localStorage.getItem('course_desc');

        $('#branch_id').val(branch_id);
        $('#course_name').val(course_name);
        $('#course_desc').val(course_desc);

    });
</script>