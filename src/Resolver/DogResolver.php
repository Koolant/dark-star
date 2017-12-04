<?php
/**
 * Created by PhpStorm.
 * User: koolan
 * Date: 12/3/17
 * Time: 3:31 PM
 */

namespace App\Resolver;

use App\Repository\DogRepository;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
use Overblog\GraphQLBundle\Definition\Argument;

class DogResolver implements ResolverInterface
{
    /**
     * @var DogRepository
     */
    private $dogRepository;

    /**
     * DogResolver constructor.
     * @param DogRepository $dogRepository
     */
    public function __construct(DogRepository $dogRepository)
    {
        $this->dogRepository = $dogRepository;
    }

    /**
     * @param Argument $args
     * @return array
     */
    public function resolveAllDogs(Argument $args): array
    {
        return $this->dogRepository->findAll();
    }

    /**
     * @param string $dogId
     * @return null|object
     */
    public function resolveDog(string $dogId)
    {
        return $this->dogRepository->find($dogId);
    }
}