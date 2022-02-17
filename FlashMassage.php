<?php


class FlashMassage
{
    public $flashName;
    public $content;

    function set($flashName, $content)
    {
        $this->flashName = $flashName;
        $this->content = $content;

        $_SESSION[$flashName] = $content;

        return $_SESSION[$flashName];
    }

    function display($flashName)
    {
        if(isset($_SESSION[$flashName])) {
            echo $_SESSION[$flashName];
            unset($_SESSION[$flashName]);
        }

    }

}
