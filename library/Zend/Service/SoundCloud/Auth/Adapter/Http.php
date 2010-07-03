<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Service
 * @subpackage SoundCloud_Auth_Adapter
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id:$
 */

/**
 * Basic HTTP Auth
 * 
 * @see http://wiki.github.com/soundcloud/api/02-authentication
 * 
 * @category   Zend
 * @package    Zend_Service 
 * @subpackage SoundCloud_Auth_Adapter
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @author     Maghiel Dijksman <mail@mdijksman.nl>
 * @version    $Id:$
 */
class Zend_Service_SoundCloud_Auth_Adapter_Http
    extends Zend_Service_SoundCloud_Auth_Adapter_AdapterAbstract
{
    const AUTH_URI = 'http://api.sandbox-soundcloud.com/me';
    
    /**     
     * @var Zend_Rest_Client
     */
    protected $_client;
    
    /**
     * @var string
     */
    private $_username;
    
    /**     
     * @var string
     */
    private $_password;
    
    /**
     * Set client instance
     */    
    public function  __construct()
    {
        $this->_client = new Zend_Rest_Client(self::AUTH_URI);
    }
    
    /**
     * Return username
     * 
     * @return string
     */
    public function getUsername()
    {
        return $this->_username;
    }
    
    /**
     * Set username 
     * 
     * @param string $username 
     */
    public function setUsername($username)
    {
        $this->_username = $username;
    }

    /**
     * Return password
     * 
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }
    
    /**
     * Set password. 
     * 
     * @note Password is send in plain text!
     * 
     * @param string $password 
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }

    public function login()
    {
        
    }

    
}
