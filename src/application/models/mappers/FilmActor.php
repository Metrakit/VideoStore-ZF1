<?php

class Model_Mapper_FilmActor
{
    private $filmActorTable;
    
    /**
     * Ajoute une nouvelle relation categorie-actor en DB
     * @param Model_FilmActor $filmActor
     */
    public function insert(Model_FilmActor $filmActor)
    {
        $data = $this->objectToRow($filmActor);
        return $this->getFilmActorTable()->insert($data);
    }
  
    /**
     * Converti l'objet FilmActor en un tableau
     * @param Model_FilmActor $filmActor
     * @return Array
     */
    private function objectToRow(Model_FilmActor $filmActor)
    {
        return array(
            'film_id' => $filmActor->getFilmId(),
            'actor_id' => $filmActor->getActorId(),
            'last_update' => $filmActor->getLastUpdate()
        );
    }
    
    /**
     * Converti un tableau en un objet FilmActor
     * @param Array $data
     * @return Model_FilmActor
     */
    private function rowToObject($data)
    {
        $filmActor = new Model_FilmActor;
        $filmActor->setActorId($data['actor_id'])
        ->setFilmId($data['film_id'])
        ->setLastUpdate($data['last_update']);
        return $filmActor;
    }
    
    /**
     * Lazy loading du DbTable FilmActor
     * @return Model_DbTable_FilmActor
     */
    private function getFilmActorTable()
    {
        if (NULL === $this->filmActorTable) {
            $this->filmActorTable = new Model_DbTable_FilmActor;
        }
        return $this->filmActorTable;
    }    
}