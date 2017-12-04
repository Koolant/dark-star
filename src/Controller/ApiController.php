<?php
/**
 * Created by PhpStorm.
 * User: koolan
 * Date: 12/2/17
 * Time: 4:38 PM
 */

namespace App\Controller;

use App\Entity\Dog;
use App\Registry\TypeRegistry;
use Doctrine\ORM\EntityManager;
use GraphQL\GraphQL;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiController
 * @package App\Controller
 */
class ApiController extends Controller
{
    /**
     * @param Request $request
     * @param TypeRegistry $registry
     * @param LoggerInterface $logger
     * @return Response
     */
    public function indexAction(Request $request, TypeRegistry $registry, LoggerInterface $logger)
    {
        $em = $this->getDoctrine()->getManager();

        $schema = new Schema([
            'query' => $registry->getQueryType()
        ]);

        $logger->debug('Schema: ', $schema->getTypeMap());

        $queryString = $request->getContent();

        $content = json_decode($queryString, true);

        $result = GraphQL::executeQuery(
            $schema,
            $content['query'],
            $rootValue = null,
            $context = null,
            $variableValues = $content['variables'],
            $operationName = null,
            $fieldResolver = null,
            $validationRules = null
        );

        $resultArr = $result->toArray();

        return new Response(json_encode($resultArr));
    }

    /**
     *
     */
    public function graphQl()
    {
    }
}