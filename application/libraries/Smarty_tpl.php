<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH.'third_party/smarty/libs/Smarty.class.php');
 
class Smarty_tpl extends Smarty {
 
    function __construct(){
        parent::__construct();
        $this->setTemplateDir(APPPATH.'views');
        $this->setCompileDir(APPPATH.'views/smarty/compiled');
        $this->setConfigDir(APPPATH.'third_party/smarty/configs');
        $this->setCacheDir(APPPATH.'third_party/smarty/cache');
 
        $this->assign( 'APPPATH', APPPATH );
        $this->assign( 'BASEPATH', BASEPATH );
        if ( method_exists( $this, 'assignByRef') ){
            $ci =& get_instance();
            $this->assignByRef("ci", $ci);
        }
        $this->force_compile = 0; //1
        $this->caching = false; //true
        $this->cache_lifetime = 120;
 
    }
 
    function view($template, $data = array(), $return = FALSE){
        if (strpos($template, '.') === FALSE && strpos($template, ':') === FALSE){
            $template .= '.tpl';
        }
        foreach ($data as $key => $val){
            $this->assign($key, $val);
        }
        if ($return == FALSE){
            $this->display($template);
            return;
        }else{
            return $this->fetch($template);
        }
    }
}