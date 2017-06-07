<?php
class front{
    function __construct(){
        $this->db=new db("shows");
        $this->smarty=new Smarty();
        $this->smarty->setTemplateDir("tpl/index");
        $this->smarty->setCompileDir("com");
        $this->smarty->assign("FCSS_PATH","FCSS_PATH");
        $this->smarty->assign("FJS_PATH","FJS_PATH");
        $this->smarty->assign("FIMG_PATH","FIMG_PATH");
    }
}