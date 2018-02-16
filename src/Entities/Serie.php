<?php

namespace Tvtruc\Entities;
//use Doctrine\ORM\Annotation as ORM;
use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Tvtruc\Entities\Episode;

/**
 * @ORM\Entity @ORM\Table(name="serie")
 **/
class Serie {
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
    protected $serieName;


    // getters et setters

	public function setName($yolo) {
		$this->serieName = $yolo;
	}

	public function getName() {
		return($this->serieName);
	}

	/**
	 * Une serie a plusieurs episodes
	 * @ORM\OneToMany(targetEntity="Episode", mappedBy="serie", cascade={"all"}, fetch="LAZY")
	 */
	public $episodes;


	public function __construct() {
		$this->episodes = new ArrayCollection();
	}
}
