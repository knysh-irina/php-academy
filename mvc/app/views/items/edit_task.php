<div class="container">

    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?=$baseUrl?>item/editTaskInDB?id=<?=$data['id']?>">
        <fieldset>
            <legend>Edit Task</legend>
            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Name</label>
                <div class="col-lg-10">
                    <h5><?=$data['user_name']?></h5>

                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <h5><?=$data['email']?></h5>
                </div>
            </div>

            <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label"></label>
                <div class="col-lg-10">
                    <textarea name="description" class="form-control" rows="3" id="textArea" required placeholder="<?=$data['description']?>"></textarea>
                    <span class="help-block">Task description</span>
                </div>
            </div>
            <div class="form-group">
                <label for="status" class="col-lg-2 control-label">Status</label>
                <div class="col-lg-10">
                <select class="form-control" id="select" name="status" required>
                    <option value="">Status</option>
                    <option value="0">ToDo</option>
                    <option value="1">Done</option>
                </div>
                </select>


            </div>

            <div class="form-group" >
                <div class="col-lg-10 col-lg-offset-2">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>