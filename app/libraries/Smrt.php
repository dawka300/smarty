<?php


namespace App\Library;

use Smarty;

class Smrt
{
  static private $stmt =  false;
  static private $oInstance = NULL;

  private function __construct(){
      self::$stmt = new Smarty();
      self::$stmt->caching = false;
      self::$stmt->cache_lifetime = 120;
      self::$stmt->setTemplateDir($_SERVER['DOCUMENT_ROOT'] . '/templates');
      self::$stmt->setCompileDir($_SERVER['DOCUMENT_ROOT'] . '/templates_c');
      self::$stmt->cache_lifetime = 120;
  }

    /**
     * @return Smrt
     */
    public static function getOInstance()
    {
        if(self::$oInstance == NULL){
            $class = get_called_class();
            self::$oInstance = new $class();
        }

        return self::$oInstance;
    }

    public static function display($template, $cache_id = null, $compile_id = null, $parent = null) {
        return self::$stmt->display($template, $cache_id, $compile_id, $parent);
    }

    public static function fetch($template, $cache_id = null, $compile_id = null, $parent = null, $display = false) {
        return self::$stmt->fetch($template,$cache_id,$compile_id,$parent,$display);
    }

    public static function assign($tpl_var, $value = null, $nocache = false) {
        return self::$stmt->assign($tpl_var,$value,$nocache);
    }


    public static function getTemplateVars($varname = null, $_ptr = null, $search_parents = true) {
        return self::$stmt->getTemplateVars($varname,$_ptr,$search_parents);
    }

    public static function append($tpl_var, $value = null, $merge = false, $nocache = false) {
        return self::$stmt->append($tpl_var, $value, $merge, $nocache);
    }

    public static function registerPlugin($type, $name, $callback, $cacheable = true, $cache_attr = null) {
        return self::$stmt->registerPlugin($type, $name, $callback, $cacheable = true, $cache_attr = null);
    }

    public static function get_template_vars($name=null) {
        return isset(self :: $stmt->tpl_vars[$name]);
    }

    function __call($method, $args)//call adodb methods
    {
        return call_user_func_array(array(self :: $stmt, $method),$args);
    }

    function __get($property)
    {
        return self :: $stmt -> $property;
    }

    function __set($property, $value)
    {
        self :: $stmt[$property] = $value;
    }
}