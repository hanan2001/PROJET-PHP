<?php

/*
 * Library configuration settings.
 */

/*
 * If true, the autoloader won't generate a fatal error if the class cannot
 * be loaded.
 *
 * Other libraries can then install their own autoloaders and try to find
 * the class file to load.
 */
$config['autoload-chain'] = false;

// List of all the intercepting filters classes.
$config['intercepting-filters'] = [ ];<?php

class UsersController 
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
		$usersList = UserModel::getAllUsers();

		return [
			'usersList' => $usersList
		];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
		$updateUserRole = UserModel::updateUserRole($formFields);
        $http->redirectTo('/');
    }
}