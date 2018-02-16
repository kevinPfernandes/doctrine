<?php

namespace Tvtruc\Entities;
//use Doctrine\ORM\Annotation as ORM;
use Doctrine\ORM\Mapping AS ORM;
use Tvtruc\Entities\Serie;
/**
 * @ORM\Entity @ORM\Table(name="episode")
 **/
class Episode {
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
    protected $episodeName;


    // getters et setters

	public function setName($yolo)
	{
		$this->episodeName = $yolo;
	}
	public function getName()
	{
		return($this->episodeName);
	}

	/**
	 * Les episodes sont liés a une serie
	 * @ORM\ManyToOne(targetEntity="Serie", inversedBy="episodes", cascade={"all"}, fetch="LAZY")
	 * @ORM\JoinColumn(nullable=false, name="serieId", referencedColumnName="id")
	 */
	private $serie;

	public function __construct($serie) {
		if ($serie){
			$this->serie = $serie;
		}
	}

}
