<?php 
if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';

switch ($_GET['P']) {
	case 'home': require_once PROTECTED_DIR.'normal/home.php'; break;
	case 'test': require_once PROTECTED_DIR.'normal/permission_test.php'; break;


//Itt a hivatkozás link az animals-re
	case 'animals': require_once PROTECTED_DIR.'animals/profile.php'; break;
	case 'add_animals': IsUserLoggedIn() ? require_once PROTECTED_DIR.'animals/add.php' : header('Location: index.php'); break;
	case 'edit_animals': IsUserLoggedIn() ? require_once PROTECTED_DIR.'animals/edit.php' : header('Location: index.php'); break;
	case 'list_animals': IsUserLoggedIn() ? require_once PROTECTED_DIR.'animals/list.php' : header('Location: index.php'); break;

//Itt a hivatkozás link a volunteersre
	case 'apply_volunteers': IsUserLoggedIn() ? require_once PROTECTED_DIR.'volunteer/add.php' : header('Location: index.php'); break;
	case 'list_volunteers': IsUserLoggedIn() ? require_once PROTECTED_DIR.'volunteer/list.php' : header('Location: index.php'); break;
	case 'edit_volunteers': IsUserLoggedIn() ? require_once PROTECTED_DIR.'volunteer/edit.php' : header('Location: index.php'); break;



	case 'login': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/login.php' : header('Location: index.php'); break;

	case 'register': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/register.php' : header('Location: index.php'); break;

	case 'logout': IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;

	case 'users': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/user_list.php' : header('Location: index.php'); break;

	default: require_once PROTECTED_DIR.'normal/404.php'; break;
}

?>