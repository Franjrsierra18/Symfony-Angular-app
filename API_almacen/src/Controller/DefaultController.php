<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{

  /**
   * @Route("/", name="homepage")
   */

  public function indexAction(Request $request)
  {
    return $this->render('almacen/productList.html.twig');
  }
}
