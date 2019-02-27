<?php
namespace Ast\WebfastBundle\Services;
/**
 * Created by PhpStorm.
 * User: marcosamano
 * Date: 27/02/19
 * Time: 1:04 PM
 */
class FastQuery
{
    private $em;

    function __construct(EntityManager $em, $key, $tipo, $ciclos = null,  $charsetlist = null,$longitud = null)
    {
        $this->em = $em;
    }

}