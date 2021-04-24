<h2 class="center"><?= $this->translation('admin.users') ?></h2>
<div class="row mt-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST">
                <div class="row">
                    <div class="col-3">
                        <label><?= $this->translation('admin.users.find.id') ?></label><br />
                        <input type="number" class="form-control" name="id">
                    </div>
                    <div class="col-3">
                        <label><?= $this->translation('admin.users.find.email') ?></label><br />
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="col-3">
                        <label><?= $this->translation('admin.users.find.name') ?></label><br />
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-3">
                        <label>&nbsp;</label><br />
                        <button type="submit" class="btn btn-success" name="search" value="1"><?= $this->translation('admin.users.find.validate') ?></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php if($users): ?>
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
                        <form method="POST" class="mb-1">
                            <button type="submit" class="btn btn-success btn-sm w-50" value="<?= $user->getId() ?>" name="login">Login</button>
                        </form>
                        <a class="btn btn-info btn-sm text-white w-50">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>
