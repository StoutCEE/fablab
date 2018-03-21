<?php
/* This script WILL NOT WORK unless generate.php is also required */

// Set MySQL username and password
$username = "duane";
$password = "Fablab-Room-101";

// Set database names and default database
$db_machine = "fablab";    // We can reuse code for inventory system $db_student = "student";

// Cardswipe table defaults
$dbt_timestamp = ["timestamp","id"];
$dbt_student = ["u_name","id_number","f_name","l_name","major"];
$dbt_machine = ["m_name","in_use"];

// URLS for registering new user and checking in
$url_swipeCard = $global_hURL[1];
$url_checkout = $global_hURL[2];
$url_addStudent = $global_hURL[3];
$url_machine = $global_hURL[4];

// Simple functions to connect and disconnect to databases
function connectDB(){
	//$s = $_SERVER['SERVER_NAME'];
	$u = $GLOBALS['username'];
	$p = $GLOBALS['password'];
	$d = $GLOBALS['db_machine'];
	
	$connection = mysqli_connect('localhost', $u, $p, $d) or die("Connection failed: " . mysqli_connect_error());
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	return $connection;
} function disconnectDB($connection) {
	mysqli_close($connection);
}

// Log student id and time into database
function cardswipe($id, $connection) {
	$msg  = "";
	$id = $_POST["id"];
    	$mn = $_POST["m_name"];
	$st = $GLOBALS['db_student'];
	$mc = $GLOBALS['db_machine'];
	$t  = $GLOBALS['dbt_timestamp'];
	$sql = "INSERT INTO timestamp (id) VALUES ($id);";

	$noUpdate = False;
	$noUpdateMachine = ["Capstone", "Sheet Metal", "Vice Area", "MISC"];
	for($i = 0; $i < sizeof($noUpdateMachine); $i++) {
		if($noUpdateMachine[i] == $mn) {
			$noUpdate = True;
		}
	}
	if(!$noUpdate) { $mcn = "UPDATE machines SET in_use=1, id_user=$id WHERE m_name='$mn';"; }
	
	if (!mysqli_query($connection, $sql) or !mysqli_query($connection, $mcn)) {
		$msg = "ERROR: " . mysqli_error($connection);
		header("refresh:10; url=" . $GLOBALS['url_swipeCard']);
	} else {
		// Get student's name
		$msg = findStudent($id, $connection);
	}
	
	return $msg;
}

// Log student id and time into database
function cardout($id, $connection) {
	$msg  = "";
	$id = $_POST["id"];
    $mcn = "UPDATE machines SET in_use=0, id_user=NULL WHERE id_user=$id;";
	
	if (!mysqli_query($connection, $mcn)) {
		$msg = "ERROR: " . mysqli_error($connection);
		header("refresh:10; url=" . $GLOBALS['url_swipecard']);
	} else {
		// Get student's name
		header("refresh:2; url=" . $GLOBALS['url_swipecard']);
		$msg = outStudent($id, $connection);
	}
	
	return $msg;
}

// Get student name if it is in the database
function findStudent($id, $connection) {
	$msg  = "";
	$id = $_POST["id"];
	$t  = $GLOBALS['dbt_student'];
	
	// Looking for name of student with the given ID
	$sql = "SELECT f_name FROM student WHERE id_num=$id";
	$find = mysqli_query($connection, $sql);
	
	if (!$find) {
		$msg = "ERROR" . mysqli_error($connection);
	} else if (mysqli_num_rows($find) == 1) {        // Student found
        //$dbt_student = ["u_name","id_number","f_name","l_name","major"];
		header("refresh:2; url=" . $GLOBALS['url_swipeCard']);
		$msg = msg_addimg('Welcome, ' . mysqli_fetch_assoc($find)[$t[2]] . '!');
	} else {                                         // Student not in database
		header("refresh:10; url=" . $GLOBALS['url_swipeCard']);
		$msg = '<form action="' . $GLOBALS['url_addStudent'] . '" method="post">
				<p>You aren\'t registered with the CEE Lab</p>
				<input type="number" name="id" style="display: none" value='. $id .'></input>
				<input type="submit" value="Register" class="btn" autofocus /> 
			</form>';
	}
	
	return $msg;
}

// Get student name if it is in the database
function outStudent($id, $connection) {
	$msg  = "";
	$id = $_POST["id"];
	$t  = $GLOBALS['dbt_student'];
	
	// Looking for name of student with the given ID
	$sql = "SELECT f_name FROM student WHERE id_num=$id";
	$find = mysqli_query($connection, $sql);
	
	if (!$find) {
		$msg = "ERROR" . mysqli_error($connection);
	} else {        // Student found
		header("refresh:5; url=" . $GLOBALS['url_swipecard']);
		$msg = msg_addimg('Goodbye, ' . mysqli_fetch_assoc($find)[$t[2]] . '!');
	}
	
	return $msg;
}

// Add student to database
function addStudent($connection){
	$msg = "";
	$t = $GLOBALS['dbt_student'];
	
	// Take posted information (from form) and insert
	$i = $_POST[$t[1]];
	$u = $_POST[$t[2]];
	$f = $_POST[$t[3]];
	$l = $_POST[$t[4]];
	$m = $_POST[$t[5]];
	
	$sql = "INSERT INTO student(id_num, u_name, f_name, l_name, major) VALUES ($i,'$u','$f','$l','$m');";
	
	if (!mysqli_query($connection, $sql)) {
		header("refresh:10; url=" . $GLOBALS['url_swipeCard']);
		$msg = "ERROR: " . $sql;
	} else {
		header("refresh:1; url=" . $GLOBALS['url_swipeCard']);
		$msg = msg_addimg('Thanks, ' . $f . '!');
	}
	
	return $msg;
}

// Generate form for adding a student. Don't ask for student ID if they've already swiped their card
function addStudentForm(){
	$t  = $GLOBALS['dbt_student'];
	
	if (isset($_POST[$t[2]])) {    //We have an id, so we can focus on the username
		$conf_id = 'value=' . $_POST["id"];
		$conf_un = 'autofocus';
	} else {                       //We know nothing about the user, so we need to ask the id first
		$conf_id = 'autofocus';
		$conf_un = '';
	}
	
	// Return HTML
	return '<form action="' . $GLOBALS['url_addStudent'] . '" method="post">
			<table>
				<tr><td>Student ID:</td><td><input type="text" name="'.$t[1].'" ' . $conf_id . '></input></td></tr>
				<tr><td>Stout Username:</td><td><input type="text" name="'.$t[2].'" ' . $conf_un . '></input></td></tr>
				<tr><td>First Name:</td><td><input type="text" name="'.$t[3].'" ></input></td></tr>
				<tr><td>Last Name:</td><td><input type="text" name="'.$t[4].'" ></input></td></tr>
				<tr><td>Major:</td><td><input type="text" name="'.$t[5].'" ></input></td></tr>
			</table>
			<input type="submit" class="btn" /> 
		</form>';
}

// Add machine to database
function addMachine($connection) {
    $msg = "";
    $t = $GLOBALS['dbt_machine'];

    // Take posted informatin (from form) and insert
    $m = $_POST[$t[1]];
    $sql = "INSERT INTO machines (m_name, in_use) VALUES ('$m', 0);";

    if(!mysqli_query($connection, $sql)) {
		header("refresh:10; url=" . $GLOBALS['url_swipecard']);
		$msg = "ERROR: " . $sql;
    } else {
		header("refresh:1; url=" . $GLOBALS['url_machine']);
		$msg = msg_addimg('Machine: ' . $m . ' entered!');
    }

    return $msg;
}

// Generate form for adding a student
function addMachineForm() {
	$t  = $GLOBALS['dbt_machine'];
	$conf_mn = 'autofocus';
	
	// Return HTML
	return '<form action="' . $GLOBALS['url_machine'] . '" method="post">
			<table>
				<tr><td>Machine Name:</td><td><input id="new_machine" type="text" name="'.$t[1].'" ' . $conf_mn . '></input></td></tr>
			</table>
			<input type="submit" class="btn" /> 
		</form>';
}

// Select the machine from the database
function selectMachine($connection) {
    // Looking for machine that are not in use
    $sql = "SELECT m_name FROM machines WHERE in_use=0";
    $find = mysqli_query($connection, $sql);
    $msg = "<select id='m_name' name='m_name' style='display: block; margin:0 auto;'>";
    while($row = mysqli_fetch_assoc($find)) {
        $msg .= "<option value='" . $row["m_name"] . "'>" . $row["m_name"] . "</option>";
    }
    $msg .= "</select>";

    return $msg;
}
?>
