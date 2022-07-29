<?php


function userIsLoggedIn()
{
	if(isset($_POST['action']) and $_POST['action'] == 'login')
	{
		if (!isset($_POST['email']) or $_POST['email'] == '' or !isset($_POST['password']) or $_POST['password'] == '')
		{
			$GLOBALS['loginError'] = 'Oba pola formularza muszą być wypełnione';
			return FALSE;
		}
		
		if (databaseContainsUser($_POST['email'], $_POST['password']))
		{
			session_start();
			$_SESSION['loggedIn'] = TRUE;
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['password'] = $_POST['password'];
			return TRUE;
		}
		else
		{
			session_start();
			unset($_SESSION['loggedIn']);
			unset($_SESSION['email']);
			unset($_SESSION['password']);
			$GLOBALS['loginError'] = 'Adres e-mail lub hasło są niepoprawne.';
			return FALSE;
		}
	}


		
	if (isset($_POST['action']) and $_POST['action'] == 'logout')
	{
		session_start();
		unset($_SESSION['loggedIn']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		header('Location: ' . $_POST['goto']);
		exit();
	}

	session_start();
	if (isset($_SESSION['loggedIn']))
	{
		return databaseContainsUser($_SESSION['email'], $_SESSION['password']);
		
	}
	
	
}


function databaseContainsUser($email, $password)
{
	$conn = pg_connect("host='pgsql14.server169512.nazwa.pl' dbname='server169512_Testowa' user='server169512_Testowa' password='Testowa1991!' ");

	$sql = "SELECT * FROM users_app
			WHERE email = '{$email}'  AND password = '{$password}'; ";
	$user = pg_query($sql);
	
	$row = pg_fetch_array($user); 
	
	if($row > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}


