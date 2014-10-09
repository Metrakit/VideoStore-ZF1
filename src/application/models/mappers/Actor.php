<?php

class Model_Mapper_Actor
{
    private $actorTable;
    
    public function fetchAll($where = NULL, $order = NULL, $count = NULL, $offset = NULL)
    {
        $result = $this->getActorTable()->fetchAll($where, $order, $count, $offset);
        if (0 === $result->count()) {
            return false;
        }
        $actors = array();
        foreach ($result as $row) {
            $actors[] = $this->rowToObject($row);
        }
        return $actors;
    }
    
    /**
     * Jointure entre acteurs et films
     * @param integer $id
     */
    public function fetchByFilm($id)
    {
        $table = new Model_DbTable_FilmActor;
        $result = $table->fetchAll(array('film_id = ?' => $id));
        foreach ($result as $row) {
            $actors[] = $this->find($row['actor_id']);
        }
        return $actors;
    }    
    
    /**
     * Fait le lien entre le model et ta table Actor
     * @param Integer $actorId
     * @return boolean|Model_Actor
     */
    public function find($actorId)
    {
        $result = $this->getActorTable()->find($actorId);
        if (0 === $result->count()) {
            return false;
        }
        
        return $this->rowToObject($result[0]);
    }
    
    /**
     * Ajoute un nouveau actor en DB
     * @param Model_Actor $actor
     */
    public function insert(Model_Actor $actor)
    {
        $data = $this->objectToRow($actor);
        return $this->getActorTable()->insert($data);
    }
    
    /**
     * Update un actor
     * @param Model_Actor $actor
     */
    public function update(Model_Actor $actor)
    {
        $data = $this->objectToRow($actor);
        $where = array('actor_id = ?' => $actor->getActorId());
        return $this->getActorTable()->update($data, $where);
    }   
    
    /**
     * Supprime un acteur en DB
     * @param integer $actorId
     */
    public function delete($actorId)
    {
        return $this->getActorTable()->delete($actorId);
    }        
    
    /**
     * Lazy loading du DbTable Actor
     * @return Model_DbTable_Actor
     */
    private function getActorTable()
    {
        if (NULL === $this->actorTable) {
            $this->actorTable = new Model_DbTable_Actor;
        }
        return $this->actorTable;
    }    
    
    /**
     * Converti l'objet Actor en un tableau
     * @param Model_Actor $actor
     * @return Array
     */
    private function objectToRow(Model_Actor $actor)
    {
        return array(
            'actor_id' => $actor->getFilmId(),
            'first_name' => $actor->getFirstName(),
            'last_name' => $actor->getLastName(),
            'last_update' => $actor->getLastUpdate()
        );
    }
    
    /**
     * Converti un tableau en un objet actor
     * @param Array $data
     * @return Model_Actor
     */
    private function rowToObject($data)
    {
        $actor = new Model_Actor;
        $actor->setActorId($data['actor_id'])
        ->setFirstName($data['first_name'])
        ->setLastName($data['last_name'])
        ->setLastUpdate($data['last_update']);
        return $actor;
    }
}