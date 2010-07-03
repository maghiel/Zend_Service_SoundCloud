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
 * @subpackage SoundCloud
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id:$
 */

/**
 * Handle authentication with SoundCloud
 * 
 * @see http://soundcloud.com/developers
 * @see http://wiki.github.com/soundcloud/api/
 *  
 * @category   Zend
 * @package    Zend_Service 
 * @subpackage SoundCloud
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @author     Maghiel Dijksman <mail@mdijksman.nl>
 * @version    $Id:$
 */
class Zend_Service_SoundCloud_Auth
{
    const NS = 'Zend_Service_SoundCloud_Auth_Adapter';
    
    protected $_adapter;
    
    /**
     * Return adapter used for authentication
     * 
     * @return Zend_Service_SoundCloud_Auth_Adapter_AdapterAbstract
     */
    public function getAdapter()
    {
        return $this->_adapter;
    }

    /**
     * Set adapter for authentication with SoundCloud.
     * Can be passed as either a string shortname or class instance
     * 
     * @param string|Zend_Service_SoundCloud_Auth_Adapter_AdapterAbstract $adapter 
     */
    public function setAdapter($adapter)
    {
        if (is_string($adapter)) {
            $className = self::NS . '_' . ucfirst($adapter);
            $adapter   = new $className();
        }
        
        if (!$adapter instanceof Zend_Service_SoundCloud_Auth_Adapter_AdapterAbstract ) {
            throw new Zend_Service_SoundCloud_Auth_Exception(
                'Adapter must be an instance of Zend_Service_SoundCloud_Auth_Adapter_AdapterAbstract');
        }
        
        $this->_adapter = $adapter;
    }

}
