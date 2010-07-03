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
 * Abstraction that all SoundCloud auth adapters should implement
 * 
 * @category   Zend
 * @package    Zend_Service 
 * @subpackage SoundCloud_Auth_Adapter
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @author     Maghiel Dijksman <mail@mdijksman.nl>
 * @version    $Id:$
 */
abstract class Zend_Service_SoundCloud_Auth_Adapter_AdapterAbstract
    implements Zend_Service_SoundCloud_Auth_Adapter_AdapterInterface
{
 
    /**
     * Set credentials needed for actual authentication
     * 
     * @param array $credentials
     * @return Zend_Service_SoundCloud_Auth_Adapter_AdapterAbstract 
     */
    public function setCredentials(array $credentials)
    {
        foreach ($credentials as $option => $value) {
            $method = 'set' . ucfirst($option);
            if (!method_exists($this, $method)) {
                throw new Zend_Service_SoundCloud_Auth_Adapter_Exception(
                    'Invalid credentials passed'
                    );
            }
            
            $this->$method($value);
        }
        
        return $this;
    }
    
    abstract public function login();
}
