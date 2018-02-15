<?php
/**
 * Created by PhpStorm.
 * User: rototo
 * Date: 14/02/2018
 * Time: 19:56
 */

// create_product.php <name>
require_once "../bootstrap.php";
$series = new Tvtruc\Entities\Series();
$series->setName("tamerelapute");
$entityManager->persist($series);
$entityManager->flush();


$productRepository = $entityManager->getRepository('Tvtruc\Entities\Series');
$products = $productRepository->findAll();

foreach ($products as $product) {
	echo sprintf("-%s\n", $product->getName());
}
