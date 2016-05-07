<?php
	// First start a session. This should be right at the top of your login page.
	session_start();

	// Check to see if this run of the script was caused by our login submit button being clicked.
	if (isset($_POST['loginSubmit'])) {

    include_once 'db/dbcore.php';
		// Also check that our email address and password were passed along. If not, jump
		// down to our error message about providing both pieces of information.
		if (isset($_POST['userN']) && isset($_POST['loginPass'])) {
			$userN = $_POST['userN'];
			$pass = $_POST['loginPass'];


      // Connect to the database
      $connection = db_connect();

      $rows = db_select("SELECT fName,password,memberID,eboard,role,active FROM MEMBER WHERE username='".$userN."' ");
      if(($rows !== false)&&(count($rows) > 0)) {
				if ($rows[0]['active'] == 1){
        	if($rows[0]['password'] == $pass){
						if ($rows[0]['eboard'] == '1'){
							//Redirect to admin portal
							$_SESSION['adminAuth'] = 'true';
							$_SESSION['uId'] = $rows[0]['memberID'];
							$_SESSION['name'] = $rows[0]['fName'];
							$_SESSION['role'] = $rows[0]['role'];

							// Once the sessions variables have been set, redirect them to the landing page / home page.
							header('location: ahome.php');
		          exit;
					}
					else{
							//Redirect registered user to home
							// isAuth is important here because we will test this to make sure they can view other pages
							// that are needing credentials.
							$_SESSION['isAuth'] = 'true';
							$_SESSION['uId'] = $rows[0]['memberID'];
							$_SESSION['name'] = $rows[0]['fName'];

							// Once the sessions variables have been set, redirect them to the landing page / home page.
							header('location: signedin.php');
		          exit;
					}

					}else{
						alertMsg('Invalid Password!', 'alert-danger');
						//$error = "Password compare issue";
					}
				}
				else {
					alertMsg('Account Deactivated!', 'alert-danger');
					//$error = "Account Deactivated!";
				}
			}
			else {
				alertMsg('Username Does not Exist!', 'alert-danger');
				//$error = "Database query issue ";
			}
		}
		else {
			alertMsg('Please Enter Username and Password!', 'alert-danger');
			//$error = "Username and password not grabbed.";
		}
	}
?>
