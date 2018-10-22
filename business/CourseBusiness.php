<?php

include_once '../data/CourseData.php';

class CourseBusiness {

    private $courseData;

    public function CourseBusiness() {
        return $this->courseData = new CourseData();
    }

    public function insert($course) {
        return $this->courseData->insert($course);
    }

    public function insertPeriod($course, $period) {
        return $this->courseData->insertPeriod($course, $period);
    }

    public function update($course) {
        return $this->courseData->update($course);
    }

    public function delete($id) {
        return $this->courseData->delete($id);
    }

    public function getAll() {
        return $this->courseData->getAll();
    }
    
    public function getAllJson() {
        return $this->courseData->getAllJson();
    }
    
    public function getAllParsed() {
        return $this->courseData->getAllParsed();
    }

    public function getCourseId($id) {
        return $this->courseData->getCourseId($id);
    }

    public function getCourseToAssignProfessor($id) {
        return $this->courseData->getCourseToAssignProfessor($id);
    }
    
     public function getCourseToAssignProfessorByFilters($id, $period, $year) {
        return $this->courseData->getCourseToAssignProfessorByFilters($id, $period, $year);
    }

    public function getCourseToAssignCurriculum($id) {
        return $this->courseData->getCourseToAssignCurriculum($id);
    }

    public function getCourseIdUpdate($id) {
        return $this->courseData->getCourseIdUpdate($id);
    }

    public function getType() {
        return $this->courseData->getType();
    }

    public function confirmCode($code) {
        return $this->courseData->confirmCode($code);
    }
    
    public function getCoursesByProfessor($id){
        return $this->courseData->getCoursesByProfessor($id);
    }
    
    /**
     * Capture students list by course and professor.
     * Used within the view of students by course and professor.
     */
    public function getStudentsListByCourseAndProfessor($course, $professor, $period, $year, $group){
        return $this->courseData->getStudentsListByCourseAndProfessor($course, $professor, $period, $year, $group);
    }   
    
    /**
     * Capture students grades by course and professor.
     * Used within the view of grades.
     */
    public function getStudentsGradesByCourseAndProfessor($course, $professor, $period, $year, $group){
        return $this->courseData->getStudentsGradesByCourseAndProfessor($course, $professor, $period, $year, $group);
    } 
    

     /**
     * Capture students reprobated by course and professor.
     * Used within the view of grades.
     */
    public function getStudentsReprobatedByCourseAndProfessor($course, $professor, $period, $year, $group){
        return $this->courseData->getStudentsReprobatedByCourseAndProfessor($course, $professor, $period, $year, $group);
    } 
    
    /**
     * Export students list.
     * Used within the action to export list.
     */
    public function exportStudentsListByCourseAndProfessor($course, $professor, $period, $year, $group){
        return $this->courseData->exportStudentsListByCourseAndProfessor($course, $professor, $period, $year, $group);
    }

    /**
     * Export students list.
     * Used within the action to export grades.
     */
    public function exportStudentsGradesByCourseAndProfessor($course, $professor, $period, $year, $group){
        return $this->courseData->exportStudentsGradesByCourseAndProfessor($course, $professor, $period, $year, $group);
    }
}
