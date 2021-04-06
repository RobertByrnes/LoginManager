<?php
Namespace RBDev\LoginManager;

session_start();
require __DIR__ . '\..\vendor\autoload.php';

/**
* Class LoginManager, validates and routes user requests to Class User. 
* 
* @author Robert Byrnes
* @created 01/01/2021
**/
Class LoginManager extends User
{
	/**
	 * Object of the Class User.
	 * 
	 * @var object
	 */
	public User $user;

	/**
	 * Class constructor.
	 */
	public function __construct()
	{
		$this->user = new User('admin@envirosample.online');
		$this->loginHandler($_REQUEST);
	}

	/**
	 * Checks request for required inputs, then routes to member functions.
	 *
	 * @param array $request
	 * @return void
	 */
	private function loginHandler(array $request) : void
	{
		(isset($request['email'])) ? $email = $request['email']: $email = null;
		(isset($request['first_name'])) ? $fName = $request['first_name'] : $firstName = null;
		(isset($request['last_name'])) ? $lName = $request['last_name'] : $lastName = null;
		(isset($request['password'])) ? $password = $request['password'] : $password = null;
		(isset($request['authCode'])) ? $templateData['authCode'] = $request['authCode'] : $authCode = null;
		(isset($request['activity'])) ? $activity = $request['activity'] : $activity = null;
		$templateData = [];
		
		switch ($activity)
		{
			case 'register': 			$this->registerNewUser($email, $fName, $lName, $password); 	break;
			case 'activation.script': 	$page='activation'; 										break;
			case 'activate': 			$this->activateNewUser($email, $templateData['authCode']); 	break;
			case 'login': 				$this->login($email, $password); 							break;
			case 'logout':				$this->user->logout();										break;
			case 'password.script': 	$page='passwordChange'; 									break;
			case 'change.password': 	$this->passwordChange($email, $password); 					break;
			case 'success': 			header('Location: index.php'); 								break;
			default:
				$templateData=[];
				$page='loginRegister';
		}
		$this->displayPage($templateData, $page);
	}

	/**
	 * Pass $templateData array and $page name to templateEngine.
	 *
	 * @param array $templateData
	 * @param string $page
	 * @return void
	 */
	private function displayPage(array $templateData, string $page) : void
    {
		if (preg_match('/wamp64|repositories/i', $_SERVER['DOCUMENT_ROOT']))
		{
			(!isset($templateData['debug'])) ? $templateData['debug'] = 1 : $templateData['debug'] = 0;
		}
        TemplateEngine::$smarty->assign('templateData', $templateData);
        TemplateEngine::$smarty->display('header.tpl');
        TemplateEngine::$smarty->display($page.'.tpl');
        TemplateEngine::$smarty->display('footer.tpl');    
	}
	
	/**
	 * Sanitizes inputs, then passes them to Class User to register a new user.
	 *
	 * @param string $email
	 * @param string $fName
	 * @param string $lName
	 * @param string $password
	 * @return string
	 */
	private function registerNewUser($email, $fName, $lName, $password) : string
	{
		$this->user->registration($email, $fName, $lName, $password);
		echo $this->user->userMessage;
	}

	/**
	 * Sanitizes email and authorisation code and then passes them to Class User
	 * to activate this user account.
	 *
	 * @param string $email
	 * @param string $authCode
	 * @return boolean
	 */
	public function activateNewUser($email, $authCode) : bool
	{
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$code = filter_var($authCode, FILTER_DEFAULT);
		
		if ($this->user->emailActivation($email, $code))
		{
			print 'Account activitation successful, login to continue.';
			return true;
		}

		else
		{
			$this->user->getMessage();
			return false;
		}
	}


	/**
	 * Sanitizes inputs, then passes them to Class User to log this user in.
	 * The user is then redirected to the home page.
	 *
	 * @param string $email
	 * @param string $password
	 * @return boolean
	 */
	public function login($email, $password) : bool
	{
		if ($this->user->login($email, $password))
		{
			echo 'success';
			exit;
		}

		else
		{
			$this->user->getMessage();
			return FALSE;
		}
	}

	/**
	 * Sanitizes inputs, passing them to Class User to change this users
	 * password.
	 *
	 * @param string $email
	 * @param string $oldPassword
	 * @param string $newPassword
	 * @return bool
	 */
	public function passwordChange($email, $oldPassword, $newPassword) : bool
	{	
		if ($this->user->passwordChange($email, $oldPassword, $newPassword))
		{
			$this->displayPage($templateData, 'loginRegister');
			return TRUE;
		}		
		$this->user->getMessage();
		return FALSE;
	}
}
new LoginManager;