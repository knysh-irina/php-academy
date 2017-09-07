<div class="container">

    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= $baseUrl ?>item/addTaskToDB">
        <fieldset>
            <legend>Add Task</legend>
            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Name</label>
                <div class="col-lg-10">
                    <input name="user_name" type="text" class="form-control" id="inputPassword" placeholder="Name"
                           required>

                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label"></label>
                <div class="col-lg-10">
                    <textarea name="description" class="form-control" rows="3" id="textArea" required></textarea>
                    <span class="help-block">Task description</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Image</label>
                <div class="col-lg-10">
                    <input type="file" name="fileToUpload" class="form-control" placeholder="Image" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button id="view" type="reset" class="btn btn-default">View</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </fieldset>
    </form>

    <table class="table table-striped table-hover " id="view_table" style="display: none">
        <thead>
        <tr>

            <th>Name</th>
            <th>Email</th>
            <th>Description</th>
            <th>Image</th>
            <th>Done</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td id="user_name"></td>
            <td id="user_email"></td>
            <td id="description"></td>
            <td id="image"></td>
            <td id="done"></td>

        </tr>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        $("#view").click(function (e) {
            e.preventDefault();
            $('#view_table').css('display', 'inline-table');
            $('#user_name').html($('input[name=user_name]').val());
            $('#user_email').html($('input[name=email]').val());
            $('#description').html($('textarea[name=description]').val());
            $('#image').html($('input[name=fileToUpload]').val());
            $('#done').html('ToDo');


        });
    });

</script>