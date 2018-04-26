<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mylibs
{
    var $CI;
    function __construct()
    {
        $this->CI =& get_instance();
    }


    public function popUpMessage($type,$title,$text)
    {
        if(trim($type)!='' && trim($title)!='' && trim($text)!='')
            {
            $_SESSION[$this->CI->config->item('sessionPrefix')]['msgType'] = trim($type);
            $_SESSION[$this->CI->config->item('sessionPrefix')]['msgTitle'] = trim($title);
            $_SESSION[$this->CI->config->item('sessionPrefix')]['msgText'] = trim($text);	
            }
    }
}