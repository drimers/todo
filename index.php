<?php session_start(); ?>
<?php include 'data.php'; ?>
<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>todo</title>
        <link rel="stylesheet" href="css/styles.css" />
     
    </head>
    <body>
        <div class="container">
            <div class="top">
                <div class="date">
                    <!--2015-01-15 20:08:01-->
                    <?php echo date($dateFormat); ?>
                </div>
                <div class="menu" >
                    <ul>

                        <?php // foreach ($menu as $item);?>
<!--  <p>Hello</p> -->
                        <?php // endforeach;?>

                        <?php
                        foreach ($menu as $item) {
                            echo '<li><a href="' . $item['link'] . '" onclick="test(this); return false;"  >' . $item['name'] . '</a></li>';
                        }
                        ?>
                    </ul>
                    <div class="greeting" id="loginForm">
                        Hello, dear Stefan      
                        <?php echo date($dateFormat); ?>
                        <?php if (isset($_SESSION['username'])): ?>
                            <?php echo $_SESSION['username']; ?> 
                        <?php else: ?>

                        <form action="index.php?page=user&action=login" method="post">
                                <table align="right" border="1">
                                    <tr><td> Username:<input name="username" type="text"/> </td></tr><br>
                                    <tr><td> Password: <input name="password" type="password"/></td></tr><br>
                                    <tr><td> <input Value="Login" type="submit"/></td></tr>
                                </table>
                            </form>

                        <?php endif; ?>  

                    </div>
                </div>
            </div>
            <div class="body">
                <a href="#" id="sample">Sample</a>
                <span id="changedText" style="display: none">Changed Text</span>
                <?php processRequest(); ?>
            </div>
        </div>
       
        <script type="text/javascript" src="js/jQuery.js"></script>
            <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>