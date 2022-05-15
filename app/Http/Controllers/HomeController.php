<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

  public static $pokeneas = [
    ["id" => "1", "nombre" => "El Kevin", "altura" => "1.75", "habilidad" => "Saltar muros", "imagen" => "https://storage.googleapis.com/fotos_pokeneas/fotos/1.jpg", "frase" => "Ya no espero tu mensaje, que te vaya bien"],
    ["id" => "2", "nombre" => "El Brayan", "altura" => "1.60", "habilidad" => "Volarse de los tombos", "imagen" => "https://storage.googleapis.com/fotos_pokeneas/fotos/2.jpg", "frase" => "La epoca donde unos rien y otros lloran"],
    ["id" => "3", "nombre" => "La Jessi", "altura" => "1.59", "habilidad" => "Meter tussi", "imagen" => "https://storage.googleapis.com/fotos_pokeneas/fotos/3.jpg", "frase" => "Rodeado de falsos que pintan cara de ser amigos"],
    ["id" => "4", "nombre" => "El Estiven", "altura" => "1.85", "habilidad" => "Enrollar baretos triples", "imagen" => "https://storage.googleapis.com/fotos_pokeneas/fotos/4.jpg", "frase" => "Estoy en la etapa de mi vida donde solo quiero facturar"],
    ["id" => "5", "nombre" => "El Esneider", "altura" => "1.67", "habilidad" => "Vivir en bello", "imagen" => "https://storage.googleapis.com/fotos_pokeneas/fotos/5.jpg", "frase" => "Vivo loco, contento y sin miedo a nada"],
    ["id" => "6", "nombre" => "El Ferney", "altura" => "1.90", "habilidad" => "Araganearse a las bandidas", "imagen" => "https://storage.googleapis.com/fotos_pokeneas/fotos/6.jpg", "frase" => "Nos quieren ver mal, pero no lo van a lograr"],
    ["id" => "7", "nombre" => "La Juniqua", "altura" => "1.55", "habilidad" => "Colgarse detras del bus", "imagen" => "https://storage.googleapis.com/fotos_pokeneas/fotos/7.jpg", "frase" => "Estoy en una montaña rusa, que solo va pa'arriba"]
  ];

  public function index()
  {
    $totalPokeneas = (count(HomeController::$pokeneas));
    $randomNumber = (rand(0, ($totalPokeneas - 1)));
    $randomPokenea = HomeController::$pokeneas[$randomNumber];
    unset($randomPokenea["imagen"]);
    unset($randomPokenea["frase"]);

    return response()->json(['Pokenea' => $randomPokenea, 'id_contenedor' => gethostbyname(gethostname())]);
  }

  public function fotos()
  {
    $totalPokeneas = (count(HomeController::$pokeneas));
    $randomNumber = (rand(0, ($totalPokeneas - 1)));
    $randomFrase = HomeController::$pokeneas[$randomNumber]["frase"];
    $randomImagen = HomeController::$pokeneas[$randomNumber]["imagen"];
    $image = base64_encode(file_get_contents($randomImagen));
    echo '<img src="data:image/jpeg;base64,' . $image . '">';
    echo '<br>';

    return response()->json(['Pokenea' => $randomFrase, 'id_contenedor' => gethostbyname(gethostname())]);
  }
}
