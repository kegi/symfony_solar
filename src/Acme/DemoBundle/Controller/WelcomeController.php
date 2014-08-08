<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    public function indexAction()
    {

        $cities = \Mv_Ota_Location_City::getAll();
        foreach($cities as $city){

            echo $city->formatedName().'<br />';
        }

        /*
         * The action's view can be rendered using render() method
         * or @Template annotation as demonstrated in DemoController.
         *
         */

        return $this->render('AcmeDemoBundle:Welcome:index.html.twig');
    }
}
