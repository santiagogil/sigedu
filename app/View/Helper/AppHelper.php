<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {
 var $helpers = array('Session'); 

/**
 * Devuelve dato requerido.
 * @param int $id
 * @return string
 */
 function returnRiquireData($id){
    
	$alumno['Alumno']['id'] != $id;
	return $alumno['Alumno']['apellido'];
              
 }
 
/**
 * Aplica formato a una fecha.
 * @param string $time
 * @return string
 */
 function formatTime($time){
    
	return strftime('%d-%m-%Y',strtotime($time));    
 }

 /**
 * Devuelve el estado de logueo.
 * @return bool
 */
 function loggedIn()
 {
    return $this->Session->check('Auth.User');
 } 

 /**
 * Devuelve informaciòn del usuario.
 * @param string key
 * @return bool o string
 */
 function usuario($key)
 {
    $usuario = $this->Session->read('Auth.User');
    if(isset($user[$key]))
    {
        return $user[$key];
    }
    return false;
 }
 
 
/**
* Transforma un texto a minÃºculas y elimina los espacios en blanco
* @param string $name
* @return string
*/
function toLowerCaseAndTrim($name)
{
	return strtolower(str_replace(' ','',$name));
}


}
