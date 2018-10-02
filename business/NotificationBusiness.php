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

    public function deleteNotification($id) {
        return $this->notificationData->deleteNotification($id);
    }

    public function deleteIncomingNotification($id) {
        return $this->notificationData->deleteIncomingNotification($id);
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
