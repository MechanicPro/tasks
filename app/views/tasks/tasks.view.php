<?php require('app/views/partials/header.php'); ?>
<?php require('app/views/partials/taskCreateForm.php'); ?>
<?php require('app/views/partials/preview.php'); ?>
<?php require('app/views/partials/filterForm.php'); ?>
<?php require('app/views/partials/sortForm.php'); ?>

    <div class="container">
        <div class="panel panel-default">
            <?php if (isset($tasks) && !(empty($tasks))) : ?>
                <h1>All tasks</h1>
                <?php require('app/views/partials/pagination.php'); ?>
            <?php endif; ?>

            <?php if (isset($tasks)) : ?>
                <?php foreach ($tasks as $task) : ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="/<?= $task->image ?>" class="img-circle">

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Text</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td><?= $task->id ?></td>
                                    <td><?= $task->username ?></td>
                                    <td><?= $task->useremail ?></td>
                                    <td class="col"><?= $task->text ?></td>

                                    <?php echo $task->status ?
                                        "<td id='td_done' class='td-taskId-{$task->id} success'>" :
                                        "<td id='td_done' class='td-taskId-{$task->id} danger'>";
                                    ?>
                                    <?php echo $task->status ?
                                        "<strong>Accepted!</strong>" :
                                        "<strong>Not accepted!</strong>";
                                    ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <?php if (isset($_SESSION['userData']) && $_SESSION['userData']['success']) : ?>
                                <?php echo $task->status ?
                                    "<button disabled type='button' class='taskId-{$task->id} btn' onclick=markAsDone({$task->id})>Task accepted</button>" :
                                    "<button type='button' class='taskIdS-{$task->id} btn btn-success' onclick=markAsDone({$task->id})>Accept the task</button>";
                                ?>
                                <button type='button' class='btn btn-danger' onclick="DeleteTask(<?= $task->id ?>)">
                                    Delete
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

<?php require('app/views/partials/modal_edit.php'); ?>
<?php require('app/views/partials/footer.php'); ?>