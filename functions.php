
<?php

/**
 * Sorts the array of tasks.
 * 
 * @param array $tasks The array of tasks that is to be sorted.
 * @param int $order 0 for ascending order, 1 for descending order. 
 * @return array The sorted array.
 */
function sortTasks(&$tasks, $order) {
    if ($order == 0) {
        uasort($tasks, function($a, $b) {        
            return strcmp($a['created'], $b['created']);        
        });
    } else {
        uasort($tasks, function($a, $b) {        
            return strcmp($b['created'], $a['created']);
        });
    }    
}

function toggle() {
    if (isset($_GET['order'])) {
        return $_GET['order'] == 0 ? 1 : 0;
    }
    
    return 1;
}

/**
 * Initializes the file with some data
 */
function init() {
    $tasks = array(
        array(        
            'id' => 1,
            'name' => 'Task 1',
            'description' => 'Description for task 1',
            'priority' => 'High',
            'created' => '2015-01-19 19:46',
            'dueDate' => '2015-01-20 19:56',
        ),
        array(
            'id' => 2,
            'name' => 'Task 2',
            'description' => 'Description for task 2',
            'priority' => 'Low',
            'created' => '2015-01-12 15:56',
            'dueDate' => '2015-01-21 09:00',
        ),
        array(
            'id' => 3,
            'name' => 'Task 3',
            'description' => 'Description for task 3',
            'priority' => 'Medium',
            'created' => '2015-01-17 12:45',
            'dueDate' => '2015-01-26 12:00',
        ),
    );
    
    $json = json_encode($tasks);
    
    file_put_contents('./data/tasks.json', $json);
}
//init();
    function redirectTaskListPage($page = 'tasks') {
     header("Location: /todo/index.php?page=$page");
    exit;
}

function loginUser(){
    $user = new User();
 
// 1. fetch the data from from the user form        
    
$user->setUsername($_POST['username']);
$user->setPassword($_POST['password']);
//2. connect to db
  $connection = dbConnect();
    // 3. select to get the user
   $query = sprintf("select username from user where username = '$username' and password = '$password'",
   $user->getUsername(), $user->getPassword());
   
   $result = mysql_query($query, $connection); 
  // var_dump($result);
   
   // 4/ check the user exist
   // 5. fetch user data. user_fetch_assoc();
   
    $fetchedUser = mysql_fetch_assoc($result);
 
 $_SESSION['userid'] = $fetchedUser->id;
  $_SESSION['username'] = $fetchedUser->username;
         
          mysql_close($connection);
  // if ($_SESSION['password'] == $user['password']){     
//redirect 1. new function
    // 2. hardcode
    // 3. function parametar.

  //  echo "welcome" . $user['username'];
  
    redirectTaskListPage();
}
/**
 * Encodes the given task and saves it to the file
 */
function writeTasks(&$tasks) {
    // converts the array of tasks to json array
    $json = json_encode($tasks);
    // saves the json to the tasks' file
    file_put_contents('./data/tasks.json', $json);
}

/**
 * Updates a single task by it's id
 */
function updateTasks() {
    // check whether we have the id of the task in the get request
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $connection = dbConnect();
        
        // check whether we have get or post request
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $query = "SELECT * FROM tasks WHERE id = $id";
            
            $result = mysql_query($query, $connection);            
            $task = mysql_fetch_assoc($result);            
            
            mysql_close($connection);
            
            return $task;
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = fetchTaskPostData();
            $sql = sprintf('UPDATE tasks '
                    . 'SET name = "%s", description = "%s", priority = %s, due_date = "%s" '
                    . 'WHERE  id = %s', $task['name'], $task['description'], $task['priority'], $task['due_date'], $id);
            
            mysql_query($sql, $connection);
            
            mysql_close($connection);
            
            redirectTaskListPage();
        }
    }
}

/**
 * Creates a new task
 */
function createTasks() {
    // we check that this is a post request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // we fetch the tasks data that comes from the user
        $task = fetchTaskPostData();

        $query = sprintf('INSERT INTO tasks(userid, name, description, priority, due_date)'
                . ' VALUES("%s", "%s", "%s", "%s", "%s")', $task['userid'], $task['name'], $task['description'], $task['priority'], $task['due_date']);

        $connection = dbConnect();

        mysql_query($query, $connection);    

        mysql_close($connection);

        // redirect to the list's page to see the changed table of tasks
        redirectTaskListPage();
    }
}

/**
 * Delete a task by it's id
 */
function deleteTasks() {    
    // check whether we have the id of the task in the get request
    if (isset($_GET['id'])) {        
        $query = 'DELETE FROM tasks WHERE id = ' . $_GET['id'];
    
        $connection = dbConnect();

        mysql_query($query, $connection);

        mysql_close($connection);

        // redirect to the list's page to see the changed table of tasks
        redirectTaskListPage();
    }
}

/**
 * Redirects the user to the index's list page.
 */
/*
function redirectTaskListPage() {
    header('Location: /todo/index.php?page=tasks');
    exit;
}
*/
/**
 * Gets all task data from a post request
 * 
 * @return A single task with data filled from the post request
 */
function fetchTaskPostData() {
    return array(
        'id' => $_POST['id'], // TODO Generate sequent ID
        'userid'=> $_POST['userid'],
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'priority' => $_POST['priority'],
        'created' => $_POST['created'],
        'due_date' => $_POST['dueDate'],
    );
}

/**
 * Gets all tasks from the database.
 * 
 * @return An array of tasks
 */
function listTasks() {
    $connection = dbConnect();
    
    $query = 'SELECT * FROM tasks';
    $result = mysql_query($query, $connection);
    
    $tasks = array();
    while($task = mysql_fetch_assoc($result)) {
        $tasks[] = $task;
    }
   // $task->name;
    
    //$task = Database::getTask(12);
    //$task->setName('adfvd fv sdbgtrbgtrbbrb thtgt');
    //$task->validate();
    
    //echo "The name of the current task is : $task->name";
  
    
    mysql_close($connection);
    
    return $tasks;
}

function dbConnect() {
    $connection = mysql_connect('localhost', 'root', 'Kr0k0dil123') or 
            die('Error while connecting to the database!');
    mysql_select_db('todo', $connection) or die('Fail to select DB!');
    
    return $connection;
}


/**
 * Processes all incoming requests
 */
function processRequest() {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $defaultAction = 'list';
        
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            
            $function = $action . ucfirst($page);
            
            $includeFile = "$page/$action";
        } else {
            $function = $defaultAction . ucfirst($page);
            
            $includeFile = "$page/$defaultAction";
        }        
        // open connection
        $data = $function();
        // close
        
        include "$includeFile.php";
    }
}

function mysqlTest() {    
    $connection = mysql_connect('localhost', 'root', 'Kr0k0dil123');
    if ($connection == false) {
        echo 'Error while connecting to the database!';
        exit;
    } else {
        echo 'Success!';
    }
    
    if (mysql_select_db('todo', $connection)) {
        echo 'Success!';
    } else {
        echo 'Fail to select DB!';
        exit;
    }
    
    // SQL
    $query = 'SELECT * FROM tasks';
    
    $result = mysql_query($query, $connection);
    
    echo 'Number of rows: ' . mysql_num_rows($result) . '<br />';
    echo 'Number of fields: ' . mysql_num_fields($result) . '<br />';
//    print_r(mysql_fetch_array($result));   
    $row = mysql_fetch_assoc($result); 
    
    $row = mysql_fetch_row($result);
    $row[1];
    
    $rows = mysql_fetch_array($result);
    
    mysql_result($result, 0, 1);
    
    mysql_close($connection);
}