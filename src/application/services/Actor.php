<?php

/**
 * Service Actor
 * Utilisation du CRUD (Create Read Update Delete)
 * @author Jordane
 */
class Service_Actor
{
    private $actorMapper;
    
    public function create($data)
    {
       $actor = new Model_Actor;
       $actor->setFirstName($data['firstName']);
       $actor->setLastName($data['lastName']);
       $this->getActorMapper()->insert($actor);
    }
    
    /**
     * @param integer $actorId
     */
    public function read($actorId)
    {
        return $this->getActorMapper()->find($actorId);
    }
    
    /**
     * @param Model_Actor $actor
     */
    public function update(Model_Actor $actor)
    {       
        return $this->getActorMapper()->update($actor);
    }   
    
    /**
     * @param integer $actorId
     */
    public function delete($actorId)
    {
        return $this->getActorMapper()->delete($actorId);
    }
    
    public function getList($where = NULL, $order = NULL, $count = NULL, $offset = NULL)
    {
        return $this->getActorMapper()->fetchAll($where, $order, $count, $offset);
    }
    
    /**
     * Récupère une lite d'acteurs et la converti en Array (utile pour un form)
     * @param string $where
     * @param string $order
     * @param string $count
     * @param string $offset
     * @return array
     */
    public function getListToArray($where = NULL, $order = NULL, $count = NULL, $offset = NULL)
    {
        $results = $this->getList($where = NULL, $order = NULL, $count = NULL, $offset = NULL);
        return $this->objectToRow($results);
    }
    
    /**
     * Converti les Acteurs en un tableau
     * @param Array $actors
     * @return Array
     */
    private function objectToRow($actors)
    {
        $results = array();
        foreach ($actors as $actor) {
            $results[$actor->getActorId()] = $actor->getFirstName() . ' ' . $actor->getLastName();
        }
        return $results;
    }        
    
    /**
     * Lazy loading du mapper Actor
     * @return Model_Mapper_Actor
     */
    private function getActorMapper()
    {
        if (NULL === $this->actorMapper) {
            $this->actorMapper = new Model_Mapper_Actor;
        }
        return $this->actorMapper;
    }

}