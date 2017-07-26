<?php

require_once '../data/Connector.php';
include '../domain/Notification.php';
//require_once './resource/log/ErrorHandler.php';

class NotificationData extends Connector {

    public function insertGeneralNotification($notification) {
        $query = "call insertGeneralNotification('" . $notification->getNotificationText() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
    
    public function insertNotificationFromProfessor($notification) {
        $query = "call insertNotificationFromProfessor(" .
                $notification->getNotificactionProfessor() . "," .
                $notification->getNotificationCourse() . "," .
                $notification->getNotificationStudent() . "," .
                $notification->getNotificationText() . "," .
                $notification->getNotificationDate() . "," .
                ")";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function updateGeneralNotification($notification) {
        $query = "call updateGeneralNotification('" . $notification->getNotificationId() . "',"
                . "'" . $notification->getNotificationText() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function deteleNotification($id) {
        $query = 'call deteleNotification("' . $id . '");';
        try {
            if ($this->exeQuery($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllGeneralNotification() {
        $query = 'call getAllGeneralNotification();';
        try {
            $allNotifications = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allNotifications) > 0) {
                while ($row = mysqli_fetch_array($allNotifications)) {
                    //Notification($notificationId, $notificationText, 
                    //$notificactionProfessor, $notificationCourse, 
                    //$notificationStudent, $notificationForum, 
                    //$notificationRead, $notificationDate) 
                    $currentNotification = new Notification(
                            $row['notificationid'], $row['notificationtext'], NULL, NULL, NULL, NULL, NULL, NULL);
                    array_push($array, $currentNotification);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
    
    public function getAllNotificationByStudent($id) {
        $query = 'call getAllNotificationByStudent("' . $id . '");';
        try {
            $allNotifications = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allNotifications) > 0) {
                while ($row = mysqli_fetch_array($allNotifications)) {
                    //Notification($notificationId, $notificationText, 
                    //$notificactionProfessor, $notificationCourse, 
                    //$notificationStudent, $notificationForum, 
                    //$notificationRead, $notificationDate) 
                    $currentNotification = new Notification(
                            $row['notificationid'], $row['notificationtext'], 
                            NULL, NULL, 
                            NULL, NULL, 
                            NULL, $row['notificationdate']);
                    array_push($array, $currentNotification);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getNotification($id) {
        $query = 'call getNotification("' . $id . '");';
        try {
            $allNotifications = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allNotifications) > 0) {
                while ($row = mysqli_fetch_array($allNotifications)) {
                    //Notification($notificationId, $notificationText, 
                    //$notificactionProfessor, $notificationCourse, 
                    //$notificationStudent, $notificationForum, 
                    //$notificationRead, $notificationDate) 
                    $currentNotification = new Notification(
                            $row['notificationid'], $row['notificationtext'], NULL, NULL, NULL, NULL, NULL, NULL);
                    array_push($array, $currentNotification);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
