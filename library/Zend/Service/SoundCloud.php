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
 * SoundCloud
 * API wrapper of the SoundCloud API (http://wiki.github.com/soundcloud/api/)
 * Implements Configuration and Fluent Interface
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
class Zend_Service_SoundCloud     
{
    const ENC_MODE_HMAC_SHA1 = 0;
    const ENC_MODE_SSL       = 1;
                
    const REQUEST_TOKEN_ADDRESS = 'http://api.soundcloud.com/oauth/request_token';
    const ACCESS_TOKEN_ADDRESS  = 'http://api.soundcloud.com/oauth/access_token';
    const AUTHORIZE_ADDRESS     = 'http://soundcloud.com/oauth/authorize';
    
    /**
     * Consumer key of your application
     * 
     * @see http://soundcloud.com/you/apps/new
     * @var string
     */
    protected $_consumerKey     = 'BzEXJdCeV462HKcYyhg0jw'; 
    
    /**
     * Consumer secret of your application
     * 
     * @see http://soundcloud.com/you/apps/new
     * @var string
     */
    protected $_consumerSecret  = 'qz95VoFPBLVXzTL50yVljZpcuzpIYvWruIxj749io';
    
    /**
     * Adapter used for authentication 
     * 
     * @var Zend_Service_SoundCloud_Auth_Adapter_AdapterAbstract
     */
    protected $_authAdapter;
    
    protected $_restClient = 'Zend_Rest_Client';
    protected $_encMode    = self::ENC_MODE_HMAC_SHA1;
    
    /**
     * Sets options. 
     * 
     * @param array|Zend_Config $options [Optional]
     */
    public function __construct($options = null)
    {
        if ($options instanceof Zend_Config) {
            $options->toArray();
        }
        
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
    
    /**
     * Calls set methods of given properties
     * 
     * @param array $options
     * @throws Zend_Service_SoundCloud_Exception
     * @return self
     */
    public function setOptions(array $options)
    {
        foreach ($options as $property => $value) {
            $method = 'set' . lcfirst($property);
            
            if (method_exists($this, $method)) {
                $this->$method($value);
            } else {
                throw new Zend_Service_SoundCloud_Exception(
                    'Invalid option given.'
                );
            }
        }
        
        return $this;
    }
    
    /**
     * Set properties from Zend_Config instance
     * 
     * @param Zend_Config $ocnfig
     * @return self
     */
    public function setConfig(Zend_Config $ocnfig) {
        return $this->setOptions($config->toArray());
    }
    
    /**
     * Return consumer key
     * 
     * @return string
     */
    public function getConsumerKey()
    {
        return $this->_consumerKey;
    }

    /**
     * Set consumer key
     * 
     * @todo Validation
     * @param string $consumerKey 
     */
    public function setConsumerKey($consumerKey)
    {
        $this->_consumerKey = $consumerKey;
    }

         
    /**
     * Return consumer secret of your application
     * 
     * @return string
     */
    public function getConsumerSecret()
    {
        return $this->_consumerSecret;
    }

    /**
     * Set consumer secret of your application
     * 
     * @param string $consumerSecret 
     */
    public function setConsumerSecret($consumerSecret)
    {
        $this->_consumerSecret = $consumerSecret;
    }

    /**
     * Return adapter used for authenticatin with SoundCloud
     * 
     * @return Zend_Service_SoundCloud_Auth_Adapter_AdapterAbstract
     */
    public function getAuthAdapter()
    {
        return $this->_authAdapter;
    }

    /**
     * Set adapter used for authentication with SoundCloud.
     * This can be either an object instance or a shortname.
     * 
     * @param string|Zend_Service_SoundCloud_Auth_Adapter_AdapterAbstract $authAdapter 
     */
    public function setAuthAdapter($authAdapter)
    {
        $this->_authAdapter = $authAdapter;
    }

        public function get_restClient()
    {
        return $this->_restClient;
    }

    public function set_restClient($_restClient)
    {
        $this->_restClient = $_restClient;
    }

    public function get_encMode()
    {
        return $this->_encMode;
    }

    public function set_encMode($_encMode)
    {
        $this->_encMode = $_encMode;
    }


    
}
