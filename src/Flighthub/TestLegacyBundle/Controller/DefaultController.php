<?php

namespace Flighthub\TestLegacyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        /*get continents from solar*/

        $continentsRecords = \Mv_Ota_Location_Continent::getAll();

        return $this->render('FlighthubTestLegacyBundle:Default:index.html.twig', array(
            'continents' => $continentsRecords,
        ));
    }
}
