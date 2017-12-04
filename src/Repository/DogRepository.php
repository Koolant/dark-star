<?php
/**
 * Created by PhpStorm.
 * User: koolan
 * Date: 12/3/17
 * Time: 6:18 PM
 */

namespace App\Repository;


use App\Entity\Dog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class DogRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Dog::class);
    }
}