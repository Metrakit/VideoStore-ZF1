<?php

/**
 * Service Film
 * Utilisation du CRUD (Create Read Update Delete)
 * @author Jordane
 */
class Service_Film
{
    private $filmMapper;
    
    public function create($data)
    {
       $film = new Model_Film;
       $film->setTitle($data['title']);
       $film->setDescription($data['description']);
       $film->setReleaseYear($data['releaseYear']);
       $film->setLanguageId($data['language']);
       $film->setOriginalLanguageId($data['originalLanguage']);
       $film->setRentalDuration($data['rentalDuration']);
       $film->setRentalRate($data['rentalRate']);
       $film->setLength($data['length']);
       $film->setReplacementCost($data['replacementCost']);
       $film->setRating($data['rating']);
       $film->addSpecialFeatures($data['specialFeatures']);     
       $id = $this->getFilmMapper()->insert($film);
       return $id;
    }
    
    /**
     * @param integer $filmId
     */
    public function read($filmId)
    {
        return $this->getFilmMapper()->find($filmId);
    }
    
    /**
     * @param Model_Film $film
     */
    public function update(Model_Film $film)
    {       
        return $this->getFilmMapper()->update($film);
    }   
    
    /**
     * @param integer $filmId
     */
    public function delete($filmId)
    {
        return $this->getFilmMapper()->delete($filmId);
    }
    
    public function getList($where = NULL, $order = NULL, $count = NULL, $offset = NULL)
    {
        return $this->getFilmMapper()->fetchAll($where, $order, $count, $offset);
    }
    
    /**
     * Récupérer les Catégories, etc.. via un service
     */
    /*public function getCategoryList($where = null, $order = null, $count = null, $offset = null)
    {
        return $this->getCategoryMapper()->fetchAll($where, $order, $count, $offset);
    }
    
    public function getCategoriesByFilm($filmId)
    {
        return $this->getCategoryList(array('film_id = ?' => $filmId));
    }
    
    public function getActorList($where = null, $order = null, $count = null, $offset = null)
    {
        return $this->getActorMapper()->fetchAll($where, $order, $count, $offset);
    }*/
    
    
    /**
     * Lazy loading du mapper Film
     * @return Model_Mapper_Film
     */
    private function getFilmMapper()
    {
        if (NULL === $this->filmMapper) {
            $this->filmMapper = new Model_Mapper_Film;
        }
        return $this->filmMapper;
    }

}