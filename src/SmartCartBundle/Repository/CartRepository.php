<?php

namespace SmartCartBundle\Repository;

/**
 * CartRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CartRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllOrderByRating($limit) {
        return $this->createQueryBuilder('c')
        ->select('c.name, c.description, c.image, AVG(r.rating)-1 as rating')
        ->leftJoin('c.reviews', 'r')
        ->groupBy('c.id')
        ->orderby('rating', 'DESC')
        ->setMaxResults($limit)
        ->getQuery()->getResult();
    }
}
