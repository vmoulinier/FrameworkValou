<h2 class="center"><?= $this->twig->translation('admin.users') ?></h2>
<div class="row mt-4">
    <div class="col-12">
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Email</th>
                <th scope="col">Name</th>
                <th scope="col">FirstName</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user->getId() ?></td>
                    <td><?= $user->getEmail() ?></td>
                    <td><?= $user->getName() ?></td>
                    <td><?= $user->getFirstName() ?></td>
                    <td>
                        <form method="POST">
                            <button type="submit" class="btn btn-success btn-sm" value="<?= $user->getId() ?>" name="login">Login</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php var_dump($users); ?>