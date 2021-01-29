<?php

namespace App\Repository;

use App\Entity\CharacterClassCharacter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CharacterClassCharacter|null find($id, $lockMode = null, $lockVersion = null)
 * @method CharacterClassCharacter|null findOneBy(array $criteria, array $orderBy = null)
 * @method CharacterClassCharacter[]    findAll()
 * @method CharacterClassCharacter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterClassCharacterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterClassCharacter::class);
    }

    // /**
    //  * @return CharacterClassCharacter[] Returns an array of CharacterClassCharacter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CharacterClassCharacter
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
