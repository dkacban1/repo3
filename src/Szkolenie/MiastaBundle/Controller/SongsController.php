<?php

namespace Szkolenie\MiastaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SongsController extends Controller
{
    /**
     * @Route("/songs")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
