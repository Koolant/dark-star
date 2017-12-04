<?php
/**
 * Created by PhpStorm.
 * User: koolan
 * Date: 12/2/17
 * Time: 9:49 PM
 */
namespace App\Registry;

use App\Types\DogType;
use App\Types\QueryType;

/**
 * Class TypeRegistry
 *
 * When defining Schemas for GraphQL, circular type references are very likely to occur. For example,
 * a PersonType may have a 'brother' field which is also a PersonType. For this reason, when defining types as classes
 * we must ensure that we only return a single instance of a given type when building the Schema. To that end we
 * will use a registry to ensure we reuse the same instance of any given type.
 */
class TypeRegistry
{
    /**
     * @var DogType
     */
    private $dogType;

    /**
     * @var QueryType
     */
    private $queryType;

    /**
     * @return DogType
     */
    public function getDogType()
    {
        return $this->dogType ?: ($this->dogType = new DogType());
    }

    public function getQueryType()
    {
        return $this->queryType ?: ($this->queryType = new QueryType($this));
    }
}