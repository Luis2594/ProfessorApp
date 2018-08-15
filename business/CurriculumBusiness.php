<?php

include_once '../data/CurriculumData.php';

class CurriculumBusiness {

    private $curriculumData;

    public function CurriculumBusiness() {
        return $this->curriculumData = new CurriculumData();
    }

    public function insert($curriculum) {
        return $this->curriculumData->insert($curriculum);
    }

    public function insertCurriculumCourse($idCurriculum, $idCourse) {
        return $this->curriculumData->insertCurriculumCourse($idCurriculum, $idCourse);
    }
    
    public function insertCourseToCurriculum($id, $period, $idCourse) {
        return $this->curriculumData->insertCourseToCurriculum($id, $period, $idCourse);
    }

    public function update($curriculum) {
        return $this->curriculumData->update($curriculum);
    }

    public function delete($id) {
        return $this->curriculumData->delete($id);
    }

    public function getAll() {
        return $this->curriculumData->getAll();
    }
    public function getAllCurriculumCourseParsed() {
        return $this->curriculumData->getAllCurriculumCourseParsed();
    }
    
    public function getAllEnrollment() {
        return $this->curriculumData->getAllEnrollment();
    }
    
    public function getAllCourses() {
        return $this->curriculumData->getAllCourses();
    }

    public function getCurriculumCourseOutCurriculum($id) {
        return $this->curriculumData->getCurriculumCourseOutCurriculum($id);
    }
   
    public function getCurriculumCourseByCurriculum($id) {
        return $this->curriculumData->getCurriculumCourseByCurriculum($id);
    }

    public function getCurriculumCourseEnrollment($id) {
        return $this->curriculumData->getCurriculumCourseEnrollment($id);
    }
    
    public function getCurriculumId($id) {
        return $this->curriculumData->getCurriculumId($id);
    }
    
    public function deleteCurriculumCourse($id) {
        return $this->curriculumData->deleteCurriculumCourse($id);
    }

}
