<?php

include_once '../data/CourseScheduleData.php';

class CourseScheduleBusiness {
    
    private $courseScheduleData;

    public function CourseScheduleBusiness() {
        return $this->courseScheduleData = new CourseScheduleData();
    }
    
     public function insert($courseSchedule) {
       return $this->courseScheduleData->insert($courseSchedule);
    }
    
    public function update($courseSchedule) {
       return $this->courseScheduleData->update($courseSchedule);
    }
    
    public function delete($id) {
      return $this->courseScheduleData->delete($id);
    }
    
    public function getAll() {
      return $this->courseScheduleData->getAll();
    }
    
    public function getCourseId($id) {
     return $this->courseScheduleData->getCourseId($id);
    }
    
    public function getLastId() {
        return $this->courseScheduleData->getLastId();
    }
    
}
