<?php
/**
 * @author JKetelaar
 */

namespace SaasFeeBundle\Repository;

use Doctrine\ORM\EntityRepository;
use SaasFeeBundle\Entity\Stop;

/**
 * Class StopRepository
 * @package SaasFeeBundle\Repository
 */
class StopRepository extends EntityRepository
{
    /**
     * @param array $stops
     * @return Stop[]
     */
    public function searchForStops(array $stops): array
    {
        $query = $this->createQueryBuilder('s');
        for ($i = 0; $i < count($stops); $i++) {
            if ($i === 0) {
                $query->where('s.name LIKE ?'.($i + 1))
                    ->setParameter($i + 1, $stops[$i]);
            } else {
                $query->orWhere('s.name LIKE ?'.($i + 1))
                    ->setParameter($i + 1, $stops[$i]);
            }
        }

        return $query->getQuery()->getResult();
    }
}
