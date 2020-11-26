<?php

class Template {

    protected $variables = array();
    protected $_controller;
    protected $_action;

    function __construct($controller, $action) {
        $this->_controller = $controller;
        $this->_action = $action;
    }

    /** Set Variables * */
    function set($name, $value) {
        $this->variables[$name] = $value;
    }

    /** Display Template * */
    function render() {
        extract($this->variables);
        if (file_exists(ROOTDIR . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'adminHeader.php')) {
            include (ROOTDIR . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'adminHeader.php');
            include (ROOTDIR . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'sidebar.php');
        } else {
            include (ROOTDIR . DS . 'application' . DS . 'views' . DS . 'inc' . DS . 'header.php');
        }


        include (ROOTDIR . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php');

        if (file_exists(ROOTDIR . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'adminFooter.php')) {
            include (ROOTDIR . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'adminFooter.php');
        } else {
            include (ROOT . DS . 'application' . DS .  'views' . DS . 'inc' . DS . 'footer.php');
        }
    }

}
