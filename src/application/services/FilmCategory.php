<?php

/**
 * Service FilmCategory
 * Utilisation du CRUD (Create Read Update Delete)
 * @author Jordane
 */
class Service_FilmCategory
{
    private $filmCategoryMapper;
    
    public function create($filmId, $categories)
    {
        foreach ($categories as $category) {
            $filmCategory= new Model_FilmCategory;
            $filmCategory->setFilmId((int) $filmId);
            $filmCategory->setCategoryId((int) $category);
            $this->getFilmCategoryMapper()->insert($filmCategory);
        }
    }
    
    
    /**
     * Lazy loading du mapper FilmCategory
     * @return Model_Mapper_FilmCategory
     */
    private function getFilmCategoryMapper()
    {
        if (NULL === $this->filmCategoryMapper) {
            $this->filmCategoryMapper = new Model_Mapper_FilmCategory;
        }
        return $this->filmCategoryMapper;
    }

}