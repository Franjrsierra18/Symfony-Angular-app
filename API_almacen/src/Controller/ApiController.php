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
    $productos =
      [
        'id' => 1, 'productos' => 'Jamon', 'descripcion' => ''
        // ['id' => 2, 'productos' => 'Queso', 'descripcion' => ''],
        // ['id' => 3, 'productos' => 'Carne', 'descripcion' => ''],
        // ['id' => 4, 'productos' => 'Pollo', 'descripcion' => ''],
        // ['id' => 5, 'productos' => 'Pavo', 'descripcion' => '']
      ];
      $response = new JsonResponse($productos);
      $response->headers->set('Access-Control-Allow-Origin','*');
      return $response;
  }
  
  /**
     * @Route("almacenes/{id}", methods={"PUT"})
     */
    public function edit(int $id)
    {
        // ... edit a post
    }
}
