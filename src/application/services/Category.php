<?php

/**
 * Service Category
 * Utilisation du CRUD (Create Read Update Delete)
 * @author Jordane
 */
class Service_Category
{
    private $categoryMapper;
    
    public function create($name)
    {
       $category = new Model_Category;
       $category->setName($name);
       $this->getCategoryMapper()->insert($category);
    }
    
    /**
     * @param integer $categoryId
     */
    public function read($categoryId)
    {
        return $this->getCategoryMapper()->find($categoryId);
    }
    
    /**
     * @param Model_Category $category
     */
    public function update(Model_Category $category)
    {       
        return $this->getCategoryMapper()->update($category);
    }   
    
    /**
     * @param integer $categoryId
     */
    public function delete($categoryId)
    {
        return $this->getCategoryMapper()->delete($categoryId);
    }
    
    public function getList($where = NULL, $order = NULL, $count = NULL, $offset = NULL)
    {
        return $this->getCategoryMapper()->fetchAll($where, $order, $count, $offset);
    }
    
    /**
     * Récupère une lite de catégories et la converti en Array (utile pour un form)
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
     * Converti les catégories en un tableau
     * @param Array $categories
     * @return Array
     */
    private function objectToRow($categories)
    {
        $results = array();
        foreach ($categories as $category) {
            $results[$category->getCategoryId()] = $category->getName();
        }
        return $results;  
    }    
    
    
    /**
     * Lazy loading du mapper Category
     * @return Model_Mapper_Category
     */
    private function getCategoryMapper()
    {
        if (NULL === $this->categoryMapper) {
            $this->categoryMapper = new Model_Mapper_Category;
        }
        return $this->categoryMapper;
    }

}