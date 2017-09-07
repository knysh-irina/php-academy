<div class="container">
    <div class="row">
        <div class="col-md-2">
            <h4>Filter</h4>
            <form action="<?= $baseUrl ?>item/filter?page=1" method="post">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="form-group">
                            <input class="form-control" name="user_name" id="focusedInput" type="text"
                                   placeholder=" User Name" required>

                        </div>


                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <input class="form-control" name="email" id="focusedInput" type="email"
                                   placeholder=" Email" required>

                        </div>

                    </li>
                    <li class="list-group-item">

                        <div class="form-group">

                            <select class="form-control" id="select" name="status" required>
                                <option value="">Status</option>
                                <option value="0">ToDo</option>
                                <option value="1">Done</option>

                            </select>


                        </div>
                        <button style="margin-top: 10px;" type="submit" class="btn btn-primary">Submit</button>
                    </li>

                </ul>
            </form>
        </div>
        <div class="col-md-10">
            <table class="table table-striped table-hover ">
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
                <?php foreach ($data as $item):

                    ?>
                    <tr>
                        <td><?= $item['user_name'] ?>
                            <?php if (isset($_SESSION['name'])): ?>
                                <a  href=" <?=$baseUrl."item/editTask?id=".$item['id'] ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true">Edit</i> </a>

                            <?php endif; ?>

                        </td>
                        <td><?= $item['email'] ?></td>
                        <td><?= $item['description'] ?></td>
                        <td><img class="image" src="<?= $item['image'] ?>" alt="Image"></td>
                        <td><?php
                            if ($item['done']) {
                                echo "<i class=\"fa fa-check\"></i>";
                            } else {
                                echo "";
                            }
                            ?>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </table>
        </div>
    </div>


    <ul class="pagination">
        <li><a href="<?= $baseUrl ?>item/showAll?page=1">1</a></li>
        <li><a href="<?= $baseUrl ?>item/showAll?page=2">2</a></li>
        <li><a href="<?= $baseUrl ?>item/showAll?page=3">3</a></li>
        <li><a href="<?= $baseUrl ?>item/showAll?page=4">4</a></li>

    </ul>
</div>


