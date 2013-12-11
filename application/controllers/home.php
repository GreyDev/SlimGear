<?php

namespace application\controllers;

class home extends \SlimController\SlimController
{

    public function indexAction()
    {
        $this->render('home/index', array(
            'unixtime' => time()
        ));
    }

    public function helloAction($name = 'nameless')
    {
        $this->render('home/hello', array(
            'name' => $name
        ));
    }
}
