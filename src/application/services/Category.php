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