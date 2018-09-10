<?php

include_once '../data/FiltersData.php';

class FiltersBusiness {

    private $filtersData;

    public function FiltersBusiness() {
        return $this->filtersData = new FiltersData();
    }
    
    /**
     * Capture array of years related to the courses related to a given professor
     * @param type $id person id (professor)
     * @return array years
     */
    public function getCoursesYearsByProfessor($id) {
        return $this->filtersData->getCoursesYearsByProfessor($id);
    }

    /**
     * Capture array of years
     * @return array years
     */
    public function getCoursesYears() {
        return $this->filtersData->getCoursesYears();
    }
    
    /**
     * 
     * @return type
     */
    public function getCurrentPeriod() {
        return $this->filtersData->getCurrentPeriod();
    }
}
