<a href="index.php?page=tasks&action=create">Create</a>

<table border="1px">
    <tr>
        <td>ID</td>
        <td>userid</td>
        <td>Name</td>
        <td>Description</td>
        <td>Priority</td>
        <td><a href="http://localhost/todo/index.php?order=<?php echo toggle(); ?>">Created</a></td>
        <td>Due date</td>
        <td colspan="2">Actions</td>
    </tr>
    <?php                    
//        sortTasks($data, isset($_GET['order']) ? $_GET['order'] : 0);
    
//    print_r($data);
        foreach ($data as $task) {
            echo '<tr>
                    <td>' . $task['id'] . '</td>
                    <td>' . $task['userid'] . '</td>
                    <td>' . $task['name'] . '</td>
                    <td>' . $task['description'] . '</td>
                    <td>' . $task['priority'] . '</td>
                    <td>' . $task['created'] . '</td>
                    <td>' . $task['due_date'] . '</td>
                    <td><a href="index.php?page=tasks&action=update&id=' . $task['id'] . '">Update</a></td>
                    <td><a href="index.php?page=tasks&action=delete&id=' . $task['id'] . '">Delete</a></td>
                  </tr>';
        }
    ?>
</table>