<?php

namespace Tvtruc\Entities;
//use Doctrine\ORM\Annotation as ORM;
use Doctrine\ORM\Mapping AS ORM;
/**
 * @ORM\Entity @ORM\Table(name="series")
 **/
class Series {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="string")
	 * @ORM\GeneratedValue(strategy="UUID")
	 */
    protected $id;
	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
    protected $seriesName;
	/**
	 * @ORM\Column(type="integer")
	 * @var int
	 */

    // getters et setters

	public function setName($yolo)
	{
		$this->seriesName = $yolo;
	}
	public function getName()
	{
		return($this->seriesName);
	}
}
