<?php
/**
 * Created by PhpStorm.
 * User: rototo
 * Date: 14/02/2018
 * Time: 19:56
 */

// create_product.php <name>
require_once "../bootstrap.php";

echo "<pre>";
// init du repo
$repository = $entityManager->getRepository('Tvtruc\Entities\Serie');



echo "-----------------------\r\n";
echo "findOneBy result + DUMP \r\n";
echo "-----------------------\r\n";
// recherche exacte
$foundSerie = $repository->findOneBy(array('serieName' => 'Hazell'));

// alternativement via "__class magic"
// $foundSerie = $repository->findOneBySerieName('plipplop');

// pour en recup plusieurs
// $foundSeries = $repository->findBy(array('serieName' => 'plipplop');
// $foundSeries = $repository->findBySerieName('plipplop');
//$result = json_encode($foundSerie);

//\Doctrine\Common\Util\Debug::dump($foundSerie);


echo "-----------------------\r\n";
echo "DQL result + DUMP \r\n";
echo "-----------------------\r\n";
// je cherche ceux avec "88" dedans
$dqlSeriesNameSearchPattern = "Hazell";
$query = $repository->createQueryBuilder('s')
	->where('s.serieName LIKE :name') // les contraintes
	->setParameter('name', '%'. $dqlSeriesNameSearchPattern .'%') // remplacer :name par l'expression '%88%'
    ->setMaxResults(3)
    ->getQuery();
$dqlSeries = $query->getResult();

\Doctrine\Common\Util\Debug::dump($dqlSeries, 5);


echo "-----------------------\r\n";
echo "findAll result DUMP \r\n";
echo "-----------------------\r\n";
// retourne les tous
$series = $repository->findby(array(),array('id' => 'DESC'),10);
// alternativement
// $seriesList = $repository->findAll('Tvtruc\Entities\Series');


// affiche la version "lisible"
// \Doctrine\Common\Util\Debug::dump($series,5);

//  traitement en direct
//foreach ($series as $serie) {
//	echo sprintf("-%s\n", $serie->getName());
//	foreach ($serie->episodes as $episode) {
//		echo sprintf("- - - %s\n", $episode->getName());
//	}
//}

$result = [];
$tmp = [];
$tmp['episodes'] = [];
foreach ($series as $serie) {
    $tmp['serie_title'] = $serie->getName();
    foreach ($serie->episodes as $episode) {
        $tmp['episodes'][] = $episode->getName();
    }

    $result[] = $tmp;
}
$json_result = json_encode($result);
echo($json_result);

echo "-----------------------\r\n";
echo "findAll result EXPORT + print_r \r\n";
echo "-----------------------\r\n";
 // retourne la version "lisible"
$exportedSeries = \Doctrine\Common\Util\Debug::export($series,4);
print_r($exportedSeries);

echo "-----------------------\r\n";
echo "findAll result EXPORT + JSON_ENCODE \r\n";
echo "-----------------------\r\n";
echo json_encode($exportedSeries, JSON_PRETTY_PRINT);





echo "<pre>";
