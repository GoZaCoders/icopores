<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* DOCUMENTOPIA.COM
******************************************************************************************
* This software is provided "as is", without warranty of any kind, express or implied,
* including but not limited to the warranties of merchantability, fitness for a particular
* purpose and noninfringement. In no event shall Documentopia.com LLC be liable for any
* claim, damages or other liability, whether in an action of contract, tort or otherwise,
* arising from, out of or in connection with Documentopia.com LLC or the use or other
* dealings with Documentopia.com LLC.
*
* @link http://www.documentopia.com/licensing
*
* @author David Dula <coding@documentopia.com>
* @copyright - 2014 - Documentopia.com
******************************************************************************************
*/
/**
 * Code Igniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package     CodeIgniter
 * @author      Dariusz Debowczyk
 * @copyright   Copyright (c) 2006, D.Debowczyk
 * @license     http://www.codeignitor.com/user_guide/license.html
 * @link        http://www.codeigniter.com
 * @since       Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------
/**
 * Session class using native PHP session features and hardened against session fixation.
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Sessions
 * @author      Dariusz Debowczyk
 * @link        http://www.codeigniter.com/user_guide/libraries/sessions.html
 */
class MY_Session extends CI_Session {
    
    var $flash_key = 'flash'; // prefix for "flash" variables (eg. flash:new:message)
    
    var $sess_match_ip = FALSE;
    var $sess_match_useragent = TRUE;
    var $encryption_key = '';
    var $sess_encrypt_cookie = FALSE;
    var $sess_expiration = 7200;
    var $cookie_keys = array(); // WHICH KEYS ARE GOING INTO the CI Sessions
    var $always_use_cookie = FALSE;
    var $user_agent_trim = 120; // HOW MUCH OF THE USER_AGENT String is used
    var $cookie_session_started = FALSE; // ONLY START THE COOKIE SESSION ONCE
    var $always_start_cookie_session = TRUE; // IF YOUR SESSION CODE IS MIXED UP WITH STUFF THAT OUTPUTS YOU NEED TO START THE SESSION AT THE TOP
    var $params = null;
    
    
    function __construct($params = array()) {
        
        $this->CI = & get_instance();
        
        // Set all the session preferences, which can either be set
        // manually via the $params array above or via the config file
        
        // Load from either passed params, config file or our class defaults (and load them into params to pass on to the native ci sessions
        foreach(array('sess_match_ip', 'sess_match_useragent', 'encryption_key', 'sess_encrypt_cookie', 'cookie_keys', 'always_start_cookie_session', 'sess_expiration') as $key) {
            if (isset($params[$key])) {
                $this->$key = $params[$key];
            } elseif ($this->CI->config->item($key) != null) {
                $this->$key = $this->CI->config->item($key);
                $params[$key] = $this->$key;
                
            } else {
                $params[$key] = $this->$key;
            }
        }
        
        
        // Force a encryption key if none set, just use the hostname for now - FIX ME XXX
        if ($this->encryption_key == "") {
            $this->encryption_key = gethostname();
            $params['encryption_key'] = $this->encryption_key;
            //$this->sess_encrypt_cookie=true;
            $params['sess_encrypt_cookie'] = $this->sess_encrypt_cookie;
        }
        
        log_message('debug', "Hybrid_session Class Initialized");
        
        $this->_sess_run();
        
        
        
        $this->params = $params;
        
        if ($this->always_start_cookie_session == true) $this->_start_cookie_sessions(true); // Do this if your userdata statements are mixed with output
        
        
    }
    
    // See if we should start the COOKIE session handler, we don't want to start it if we don't need to because of the overhead
    function _start_cookie_sessions($item = null) {
        // If there are no keys and we are not in a always start mode, never start so this can be a drop in replacement to our current MY_SESSION
        
        if (empty($this->cookie_keys) && $this->always_use_cookie==false) {
            return; // SKIP STARTING
        }
        
        
        if (!isset($params['sess_expiration'])) {
            $this->params['sess_expiration'] = (60 * 60 * 24 * 365); // One Year from now - Year 2038 problem - Hopefully fixed by then ?
            
        }
        
        
        if ($item === true && $this->cookie_session_started == false) {
            $this->cookie_session_started = true; // Don't start it twice
            parent::__construct($this->params);
            return;
        }
        
        // Code below needs to be rethought
        
        // This is lazy session starting, which may cause problems depending on how your output code works
        
        
        $start_session = false;
        if ($item == null) $start_session = true; // If we don't know the key start the cookie session
        else if ($this->always_use_cookie == true) $start_session = true; // If we are always cookie start the session
        else if (in_array($item, $this->cookie_keys)) $start_session = true; // If this is a key we are cookieing
        
        
        
        if (headers_sent()) {
            log_message('debug', "Hybrid_session unable to start because headers already sent");
            $start_session = false; // We can't send headers
            
        }
        
        
        if ($this->cookie_session_started == false && $start_session == true) {
            $this->cookie_session_started = true; // Don't start it twice
            // Call the CI Library Construct to start
            
            // For our purposes make the cookie long lived
            parent::__construct($this->params);
        }
    }
    
    /**
     * Regenerates session id
     */
    function regenerate_id() {
        // copy old session data, including its id
        $old_session_id = session_id();
        $old_session_data = $_SESSION;
        
        // regenerate session id and store it
        session_regenerate_id();
        $new_session_id = session_id();
        
        // switch to the old session and destroy its storage
        session_id($old_session_id);
        session_destroy();
        
        // switch back to the new session id and send the cookie
        session_id($new_session_id);
        session_start();
        
        // restore the old session data into the new session
        $_SESSION = $old_session_data;
        
        // update the session creation time
        $_SESSION['regenerated'] = time();
        
        // session_write_close() patch based on this thread
        // http://www.codeigniter.com/forums/viewthread/1624/
        // there is a question mark ?? as to side affects
        
        // end the current session and store session data.
        session_write_close();
    }
    
    function sess_destroy() {
        $this->destroy();
    }
    /**
     * Destroys the session and erases session storage
     */
    function destroy() {
        
        if (isset($_SESSION['regenerated'])) $active = true;
        else $active = false;
        unset($_SESSION);
        if (isset($_COOKIE[session_name() ])) {
            setcookie(session_name(), '', time() - 42000, '/');
        }
        if ($active == true) @session_destroy();
        if ($this->cookie_session_started) parent::sess_destroy();
    }
    
    
    /**
     * Reads given session attribute value
     */
    function userdata($item) {
        
        // Cookies take priority
        if ($this->always_use_cookie == true) {
            $this->_start_cookie_sessions($item);
            $ret = (parent::userdata($item));
            if ($ret !== false) return ($ret);
        }
        
        // Does the User Agent Match?
        if ($this->sess_match_useragent == TRUE && trim($_SESSION['user_agent']) != trim(substr($this->CI->input->user_agent(), 0, $this->user_agent_trim))) {
            $this->destroy();
            return FALSE;
        }
        
        if ($this->sess_match_ip == TRUE && $_SESSION['ip_address'] != $this->CI->input->ip_address()) {
            $this->destroy();
            return FALSE;
        }
        
        
        if ($item == 'session_id') { //added for backward-compatibility
            return session_id();
        } else {
            $ret = (!isset($_SESSION[$item])) ? false : $_SESSION[$item];
            if ($ret == false) {
                $this->_start_cookie_sessions($item);
                // Try Cookie
                $ret = (parent::userdata($item));
            }
            
            return ($ret);
        }
    }
    function all_userdata() {
        return (!isset($_SESSION)) ? FALSE : $_SESSION;
    }
    
    // Mostly for debugging to see what is stored native and what is stored CI session wise.
    function all_cookie_userdata() {
        $this->_start_cookie_sessions();
        if ($this->cookie_session_started == true) {
            return (parent::all_userdata());
        } else return (array());
    }
    
    
    /**
     * Sets session attributes to the given values
     */
    function set_userdata($newdata = array(), $newval = '') {
        
        // If we are always cookie based, set this first
        if ($this->always_use_cookie == true && $this->cookie_session_started == true) {
            parent::set_userdata($newdata, $newval);
        }
        
        $o = $newdata;
        if (is_string($newdata)) {
            $newdata = array($newdata => $newval);
        }
        
        if (count($newdata) > 0) {
            foreach($newdata as $key => $val) {
                
                if (in_array($key, $this->cookie_keys) && $this->always_use_cookie == false) { // If we are always cookie, it will be set above, otherwise just set the configred ones
                    $this->_start_cookie_sessions($key);
                    parent::set_userdata($key, $val);
                }
                $_SESSION[$key] = $val;
                
            }
        }
    }
    
    /**
     * Erases given session attributes
     */
    function unset_userdata($newdata = array()) {
        if ($this->cookie_session_started && $this->cookie_session_started == true) parent::unset_userdata($newdata);
        
        if (is_string($newdata)) {
            $newdata = array($newdata => '');
        }
        
        if (count($newdata) > 0) {
            foreach($newdata as $key => $val) {
                unset($_SESSION[$key]);
            }
        }
    }
    
    /**
     * Starts up the session system for current request
     */
    function _sess_run() {
        session_start();
        
        $session_id_ttl = $this->CI->config->item('sess_expiration');
        
        if (is_numeric($session_id_ttl)) {
            if ($session_id_ttl > 0) {
                $this->session_id_ttl = $this->CI->config->item('sess_expiration');
            } else {
                $this->session_id_ttl = (60 * 60 * 24 * 365 * 2);
            }
        }
        
        // check if session id needs regeneration
        if ($this->_session_id_expired()) {
            // regenerate session id (session data stays the
            // same, but old session storage is destroyed)
            $this->regenerate_id();
        }
        
        // delete old flashdata (from last request)
        $this->_flashdata_sweep();
        
        // mark all new flashdata as old (data will be deleted before next request)
        $this->_flashdata_mark();
        
        foreach(array('ip_address', 'user_agent') as $key) {
            if (empty($_SESSION[$key])) {
                $value = $this->CI->input->$key();
                if (strlen($value) > $this->user_agent_trim) $value = substr($value, 0, $this->user_agent_trim);
                $_SESSION[$key] = $value;
            }
            
            
            
        }
        
    }
    
    /**
     * Checks if session has expired
     */
    function _session_id_expired() {
        if (!isset($_SESSION['regenerated'])) {
            $_SESSION['regenerated'] = time();
            return false;
        }
        
        $expiry_time = time() - $this->session_id_ttl;
        
        if ($_SESSION['regenerated'] <= $expiry_time) {
            return true;
        }
        
        return false;
    }
    
    // --------------------------
    // FLASH DATA IS STILL ALL HANDLED NATIVELY, no reason to clutter it for now
    // --------------------------
    
    /**
     * Sets "flash" data which will be available only in next request (then it will
     * be deleted from session). You can use it to implement "Save succeeded" messages
     * after redirect.
     */
    function set_flashdata($key, $value) {
        $flash_key = $this->flash_key . ':new:' . $key;
        $this->set_userdata($flash_key, $value);
    }
    
    /**
     * Keeps existing "flash" data available to next request.
     */
    function keep_flashdata($key) {
        $old_flash_key = $this->flash_key . ':old:' . $key;
        $value = $this->userdata($old_flash_key);
        
        $new_flash_key = $this->flash_key . ':new:' . $key;
        $this->set_userdata($new_flash_key, $value);
    }
    
    /**
     * Returns "flash" data for the given key.
     */
    function flashdata($key) {
        $flash_key = $this->flash_key . ':old:' . $key;
        return $this->userdata($flash_key);
    }
    
    /**
     * PRIVATE: Internal method - marks "flash" session attributes as 'old'
     */
    function _flashdata_mark() {
        foreach($_SESSION as $name => $value) {
            $parts = explode(':new:', $name);
            if (is_array($parts) && count($parts) == 2) {
                $new_name = $this->flash_key . ':old:' . $parts[1];
                $this->set_userdata($new_name, $value);
                $this->unset_userdata($name);
            }
        }
    }
    
    /**
     * PRIVATE: Internal method - removes "flash" session marked as 'old'
     */
    function _flashdata_sweep() {
        foreach($_SESSION as $name => $value) {
            $parts = explode(':old:', $name);
            if (is_array($parts) && count($parts) == 2 && $parts[0] == $this->flash_key) {
                $this->unset_userdata($name);
            }
        }
    }
}
?>