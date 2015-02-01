

<?php
if(!isset($_SESSION['uprawnienia'])) 

{	

		if(!isset($_POST['zaloguj']))
		
	
		
				{
					echo"
						<form action='index.php' method='post'>
						<input type='text'class='wpisywanie' placeholder='Login' name='login' /> 
						<input type='password' class='wpisywanie' placeholder='Password' name='haslo'/> 
						<input type='submit' class='submit' id='przycisk_login' name='zaloguj' value='Zaloguj'>
						</form>";
				}
					else 
 
		{
				// form submitted
				// check for username
			/*   if (!isset($_POST['login']) || trim($_POST['login']) == "") 
				{
					die ("Musisz podać login");
				}

				// check for password
				if (!isset($_POST['haslo']) || trim($_POST['haslo']) == "") 
				{
				 die ("Musisz podać hasło");
				}
			*/
	
	
    // connect and execute SQL query
include ("config.php");

	    // assign to variables and escape
    $login = ($_POST['login']);
    $haslo = ($_POST['haslo']);
	
    $query = "SELECT * from konto WHERE login = '$login' && haslo = '$haslo'";
    $result = mysql_query($query) or die ("Error in query: $query. " . mysql_error());
	
    if (mysql_num_rows($result) == 1) 
			{
	
				$row = mysql_fetch_row($result);

					
					$_SESSION["sid"] = $row[0];
					$_SESSION["slogin"] = $row[1];
					$_SESSION["shaslo"] = $row[2];
					$_SESSION["uprawnienia"] = $row[3];
	                                  
					header("Location: index.php");
			} 		
	
		else    
			{
				// if row does not exist
				// user/pass combination is wrong
				// redirect browser to error page
				header("Location: logowanie_nieudane.php");
			}
		mysql_close($connection);
		}



}

else
{
echo "	<form action='wyloguj.php' method='post'> Witaj ".$_SESSION["slogin"]." Jesteś zalogowany jako ".$_SESSION["uprawnienia"]."<span class='tab'></span><input type='submit' class='submit' id='przycisk_login' name='potwierdz' value='Wyloguj'></form>";

 

}



?>












