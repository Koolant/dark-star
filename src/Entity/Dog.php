<?php
/**
 * Created by PhpStorm.
 * User: koolan
 * Date: 12/2/17
 * Time: 10:08 AM
 */
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Dog
 * @ORM\Entity()
 */
class Dog
{
    /**
     * @ORM\Id()
     * @ORM\Column()
     * @ORM\GeneratedValue()
     */
    private $id;
    /**
     * @ORM\Column(name="name",nullable=true)
     */
    private $name;

}