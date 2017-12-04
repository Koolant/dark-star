<?php
/**
 * Created by PhpStorm.
 * User: koolan
 * Date: 12/2/17
 * Time: 9:03 PM
 */
namespace App\Types;

use App\Entity\Dog;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class DogType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Dog',
            'field' => [
                'id' => Type::string(),
                'name' => Type::string()
                ]
        ];
        parent::__construct($config);
    }
}