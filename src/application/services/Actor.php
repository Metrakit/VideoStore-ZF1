<?php

/**
 * Service Actor
 * Utilisation du CRUD (Create Read Update Delete)
 * @author Jordane
 */
class Service_Actor
{
    private $actorMapper;
    
    public function create(Model_Actor $actor)
    {
        return $this->getActorMapper()->insert($actor);
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