<?php

include_once '../data/NotificationData.php';

class NotificationBusiness {

    private $notificationData;

    public function NotificationBusiness() {
        return $this->notificationData = new NotificationData();
    }

    public function insertNotification($notification) {
        return $this->notificationData->insertNotification($notification);
    }

    public function updateNotification($notification) {
        return $this->notificationData->updateNotification($notification);
    }

    public function deteleNotification($id) {
        return $this->notificationData->deteleNotification($id);
    }

    public function deteleIncomingNotification($id) {
        return $this->notificationData->deteleIncomingNotification($id);
    }

    public function getAllNotificationByStudent($id) {
        return $this->notificationData->getAllNotificationByStudent($id);
    }
    
    public function getNotification($id) {
        return $this->notificationData->getNotification($id);
    }
    
    public function getNotificationByProfessor($id){
        return $this->notificationData->getNotificationByProfessor($id);
    }

    public function getIncomingNotificationByProfessor($id){
        return $this->notificationData->getIncomingNotificationByProfessor($id);
    }

}
