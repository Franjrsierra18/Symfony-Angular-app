<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

use App\Entity\Product;

class ApiController extends AbstractController
{
  /**
   * @Route("/api/almacenes", name="listaAlmacenes", methods={"GET"})
   */

  public function show(Request $request)
  {
    $productos =
      [
        'id' => 1, 'productos' => 'Jamon', 'descripcion' => '', 'cantidad' => 13
        // ['id' => 2, 'productos' => 'Queso', 'descripcion' => ''],
        // ['id' => 3, 'productos' => 'Carne', 'descripcion' => ''],
        // ['id' => 4, 'productos' => 'Pollo', 'descripcion' => ''],
        // ['id' => 5, 'productos' => 'Pavo', 'descripcion' => '']
      ];
    $response = new JsonResponse($productos);
    $response->headers->set('Access-Control-Allow-Origin', '*');
    return $response;
  }

  /**
   * @Route("/api/productos", name="listaProductos", methods={"GET"})
   */

  public function listarProductos(Request $request)
  {
    $repository = $this->getDoctrine()->getRepository(Product::class);
    $productos = $repository->findAll();
    foreach ($productos as $producto) {
      $productosArray[] = [
        "id" => $producto->getId(),
        "productos" => $producto->getProductos(),
        "descripcion" => $producto->getDescripcion(),
        "cantidad" => $producto->getCantidad()
      ];
    }
    $encoders = [new JsonEncoder()];
    $normalizers = [new ObjectNormalizer()];

    $serializer = new Serializer($normalizers, $encoders);

    $jsonContent = $serializer->serialize($productos, 'json');
    $response = new Response($jsonContent);
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }
  
  /**
   * @Route("/api/nuevoProducto", name="nuevoProductos", methods={"POST"})
   */

  public function nuevoProductos(): Response
  {
    $repository = $this->getDoctrine()->getRepository(Product::class);
    $productos = $repository->findAll();
    foreach ($productos as $producto) {
      $productosArray[] = [
        "id" => $producto->getId(),
        "productos" => $producto->getProductos(),
        "descripcion" => $producto->getDescripcion(),
        "cantidad" => $producto->getCantidad()
      ];
    }
    $encoders = [new JsonEncoder()];
    $normalizers = [new ObjectNormalizer()];

    $serializer = new Serializer($normalizers, $encoders);

    $jsonContent = $serializer->serialize($productos, 'json');
    $response = new Response($jsonContent);
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }
}
