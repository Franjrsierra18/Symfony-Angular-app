<?php
// src/Controller/LuckyController.php
namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/api/")
 */

class ApiController
{
  /**
   * @Route("almacenes", name="listaAlmacenes", methods={"GET"})
   */

  public function show(Request $request)
  {
    return new JsonResponse(['data' => 123]);
  }
  
  /**
     * @Route("almacenes/{id}", methods={"PUT"})
     */
    public function edit(int $id)
    {
        // ... edit a post
    }
}
