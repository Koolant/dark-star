<?php
/**
 * Created by PhpStorm.
 * User: koolan
 * Date: 12/2/17
 * Time: 9:26 PM
 */

namespace App\Types;

use App\Entity\Dog;
use App\Registry\TypeRegistry;
use Doctrine\ORM\EntityManager;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class QueryType extends ObjectType
{
    public function __construct(TypeRegistry $registry)
    {
        $config = [
            'name' => 'Query',
            'fields' => [
                'dog' => [
                    'type' => $registry->getDogType(),
                    'resolve' => function() {
                        return [
                            'Name' => 'fred',
                            'Id'   => '12'
                        ];
                    }
                ],
                'cat' => [
                    'type' => Type::string(),
                    'resolve' => function(){
            return 'test';
                    }
                ]
            ]
        ];
        parent::__construct($config);
    }
}