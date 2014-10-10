<?php

/**
 * Service FilmActor
 * Utilisation du CRUD (Create Read Update Delete)
 * @author Jordane
 */
class Service_FilmActor
{
    private $filmActorMapper;
    
    public function create($filmId, $actors)
    {
        foreach ($actors as $actor) {
            $filmActor = new Model_FilmActor;
            $filmActor->setFilmId((int) $filmId);
            $filmActor->setActorId((int) $actor);
            $this->getFilmActorMapper()->insert($filmActor);
        }
    }
    
    
    /**
     * Lazy loading du mapper FilmActor
     * @return Model_Mapper_FilmActor
     */
    private function getFilmActorMapper()
    {
        if (NULL === $this->filmActorMapper) {
            $this->filmActorMapper = new Model_Mapper_FilmActor;
        }
        return $this->filmActorMapper;
    }

}