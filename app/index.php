<?php
/**
 * Created by PhpStorm.
 * User: rototo
 * Date: 14/02/2018
 * Time: 19:56
 */

// create_product.php <name>
require_once "../bootstrap.php";
$serie = new Tvtruc\Entities\Serie();
$serie->setName("yo". rand() ."tamerelapute");

//$episode = new Tvtruc\Entities\Episode($serie);
$episode = new Tvtruc\Entities\Episode($serie);

//$episode->setSerie($serie);
$episode->setName("lo". rand() ."cacaboudin");
$serie->episodes->add($episode);

$entityManager->persist($serie);
$entityManager->flush();


echo "<pre>";


// init du repo
$repository = $entityManager->getRepository('Tvtruc\Entities\Serie');


// recherche exacte
$oneSerie = $repository->findOneBy(array('serieName' => 'plipplop'));
echo "-----------------------\r\n";
echo "findOneBy result\r\n";
echo "-----------------------\r\n";
\Doctrine\Common\Util\Debug::dump($oneSerie);


// je cherche ceux avec "88" dedans
$keyword = "88";
$query = $repository->createQueryBuilder('s')
	->where('s.serieName LIKE :name')
	->setParameter('name', '%'. $keyword .'%')
	->getQuery();
$keywordResults = $query->getResult();
echo "-----------------------\r\n";
echo "DQL result\r\n";
echo "-----------------------\r\n";
\Doctrine\Common\Util\Debug::dump($keywordResults);


// retourne les tous
$series = $repository->findAll();

// alternativement
// $seriesList = $repository->findAll('Tvtruc\Entities\Series');



echo "-----------------------\r\n";
echo "findAll result\r\n";
echo "-----------------------\r\n";
\Doctrine\Common\Util\Debug::dump($series);
//foreach ($series as $serie) {

//	echo sprintf("-%s\n", $serie->getName());
//	foreach ($serie->episodes as $episode) {
//		echo sprintf("- - - %s\n", $episode->getName());
//	}
//}


echo "<pre>";
