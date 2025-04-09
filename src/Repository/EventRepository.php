<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Event>
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    /*public function findBetweenDates(?\DateTimeImmutable $startAt, ?\DateTimeImmutable $endAt): ?iterable
    {
      $qb = $this->createQueryBuilder('e');
      if (null !== $startAt) {
        $qb->andWhere('e.startAt = :startAt');
        $qb->setParameter('startAt', $startAt);
      }
      if (null !== $endAt) {
        $qb->andWhere('e.endAt = :endAt')
        $qb->setParameter('endAt', $endAt)
      }

      return $qb->getQuery()->getResult();

    }*/

    //    /**
    //     * @return Event[] Returns an array of Event objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Event
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
