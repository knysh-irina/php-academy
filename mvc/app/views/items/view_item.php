<div class="container">
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Description</th>
            <th>Image</th>
            <th>Done</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?=$id?></td>
            <td><?=$user_name?></td>
            <td><?=$email?></td>
            <td><?=$description?></td>
            <td><img class="image" src="<?=$image?>"> </td>
            <td><?=$done?></td>
        </tr>
    </table>
</div>