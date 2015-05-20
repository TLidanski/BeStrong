<?php

require 'include\session.inc.php';
require 'include\db.php';

require_once ('\include\mysql_db.class.php');


if (!isset($_SESSION['username'])) {
	header('Location: \lal\main.php');
}


	if(isset($_POST['calculate'])) { 
		if($_POST['weight'] != '' && $_POST['dweight'] != '' && $_POST['height'] != '' && $_POST['sex'] != '' && $_POST['age'] != '') {

			$_SESSION['weight'] = $_POST['weight'];
			$_SESSION['dweight'] = $_POST['dweight'];
			$_SESSION['height'] = $_POST['height'];
			$_SESSION['age'] = $_POST['age'];
			$_SESSION['sex'] = $_POST['sex'];
			$_SESSION['activity'] = $_POST['activity'];

			
			$date = date('Y-m-d');

			$checker = mysql_query("SELECT id FROM progress WHERE date_added = '$date' AND user = '$_COOKIE[user_id]'");
			$row = mysql_num_rows($checker);

				if ($row == 0) {
						
						$query = "INSERT INTO progress (user, weight, date_added) VALUES ('$_COOKIE[user_id]', '$_POST[weight]', NOW())";
						$result = $db->query($query);
				}		

			header("Location: /lal/calc.php");
			
		} else {
			$error_msg =  'You left one of the fields blank';
		}
	}


?>

<html>
    <head>
        <title>Calorie Calculator</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">
    <link rel="stylesheet" href="css/styles.css"> 

    <link href="css/lol.css" rel="stylesheet" type="text/css">	
    <link href="css/1140.css" rel="stylesheet" type="text/css"> 
    </head>
    <body>


    <body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="main.php">BS</a>
                <a class="navbar-brand page-scroll" href="http://forum.bodybuilding.com/forumdisplay.php?f=301" target="_blank">Forums</a>


            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
    
                    <li>
                        <a class="page-scroll" href="myprogress.php" >My Progress</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
    	<form action="" method="post">
    	<div class="column">
    		<div class="alert">
    			<?php if(isset($error_msg)) {echo $error_msg;} ?>
    		</div>
		  
			<div class="row">
                <div class="radio">
				    <input type="radio" name="sex" value="M">Male
                </div>    
			</div>
			
			<div class="row">
                <div class="radio">
				    <input type="radio" name="sex" value="F">Female
                </div>
			</div>
			
			<div class="row">
				<input type="text" class="form-control" name="height" value="" placeholder="Enter your height" >
			</div>
			
			<div class="row">
				<input type="text" class="form-control" name="age" value="" placeholder="Enter your age" >
			</div>
		  
			<div class="row">
				<input type="text" class="form-control" name="weight" value="" placeholder="Enter your weight" >
			</div>
			<div class="row">
				<input type="text" class="form-control" name="dweight" value="" placeholder="Enter your desired weight" >
			</div>
			<div class="row">
    				<select name="activity" class="form-control">
    					<option value="1">Little or no exercise</option>
    					<option value="2">Light exercise 1-3 days/week</option>
    					<option value="3">Moderate exercise 3-5 days/week</option>
    					<option value="4">Hard exercise 6-7 days a week</option>
    					<option value="5">Very hard exercise</option>
    				</select>

			</div>
			<div class="row">
				<input type ="submit" class="btn" name="calculate" value="Calculate Calories">
			</div>
		  </div>		  
		  </form>
    </header>

 
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>
    <script src="js/loginjs.js"></script>
</body>

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</html>