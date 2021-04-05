<?php
require __DIR__ . '\..\vendor\autoload.php';

Class TemplateEngine
{
    static public $smarty;

    public function __construct()
    {
        if (preg_match('/wamp|repositories/', $_SERVER['DOCUMENT_ROOT']))
        {
            SELF::$smarty = new Smarty();
            SELF::$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/templates/');
            SELF::$smarty->setCompileDir(SMARTY_DIR.'templates_c/');
            SELF::$smarty->setCacheDir(SMARTY_DIR.'configs/');
            SELF::$smarty->setConfigDir(SMARTY_DIR.'cache/');
            SELF::$smarty->assign('app_name', 'LoginManager');
        }
        
        else
        {
            require('/home/u610815376/public_html/smarty/libs/Smarty.class.php');
            $smarty = new Smarty();
            $smarty->setTemplateDir('/home/u610815376/public_html/templates');
            $smarty->setCompileDir('/home/u610815376/public_html/templates_c');
            $smarty->setCacheDir('/home/u610815376/public_html/cache');
            $smarty->setConfigDir('/home/u610815376/public_html/configs');
        }
    }
}
new TemplateEngine;
