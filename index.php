<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Blog</title>
</head>
<body>

<?php

require './vendor/autoload.php';

$admin = new \App\Admin(1);
$user = new \App\User(2);
$manager = new \App\Manager(3);

$messageUser = new \App\Message($user, 'Post by User', 'Example 1 content post.');
$messageManager = new \App\Message($manager, 'Post by Manager', 'Example 2 content post.');
$messageAdmin = new \App\Message($admin, 'Post by Admin', 'Example 3 content post.');

$messages[] = $messageUser;
$messages[] = $messageManager;
$messages[] = $messageAdmin;

?>

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Author id</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>User edit</th>
                    <th>User delete</th>
                    <th>Manager edit</th>
                    <th>Manager delete</th>
                    <th>Admin edit</th>
                    <th>Admin delete</th>
                </tr>
                </thead>
                <tbody>
                <?php /** @var \App\Message $message */ ?>
                <?php foreach ($messages as $message): ?>
                    <tr>
                        <td><?php echo $message->getAuthor()->getId(); ?></td>
                        <td><?php echo $message->getTitle(); ?></td>
                        <td><?php echo $message->getContent(); ?></td>
                        <td>
                            <?php if($user->canEdit($message)): ?>
                                <span class="badge badge-success">Yes</span>
                            <?php else: ?>
                                <span class="badge badge-danger">No</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($user->canDelete($message)): ?>
                                <span class="badge badge-success">Yes</span>
                            <?php else: ?>
                                <span class="badge badge-danger">No</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($manager->canEdit($message)): ?>
                                <span class="badge badge-success">Yes</span>
                            <?php else: ?>
                                <span class="badge badge-danger">No</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($manager->canDelete($message)): ?>
                                <span class="badge badge-success">Yes</span>
                            <?php else: ?>
                                <span class="badge badge-danger">No</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($admin->canEdit($message)): ?>
                                <span class="badge badge-success">Yes</span>
                            <?php else: ?>
                                <span class="badge badge-danger">No</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($admin->canDelete($message)): ?>
                                <span class="badge badge-success">Yes</span>
                            <?php else: ?>
                                <span class="badge badge-danger">No</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>