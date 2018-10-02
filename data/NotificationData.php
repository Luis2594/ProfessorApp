<?php

require_once '../data/Connector.php';
include_once '../domain/Notification.php';

class NotificationData extends Connector {

    public function insertNotification($notification) {
        $query = "call insertNotification('" . $notification->getNotificationText() . "'," .
                $notification->getNotificationCourse() . "," . $notification->getNotificationGroup() . "," .
                $notification->getNotificationProfessor() . "," . $notification->getNotificationYear() . "," .
                $notification->getNotificationPeriod() . ",'" . $notification->getNotificationDate() . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function updateNotification($notification) {
        $query = "call updateNotification(" . $notification->getNotificationId() . ","
                . "'" . $notification->getNotificationText() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function deleteNotification($id) {
        $query = 'call deleteNotification(' . $id . ');';
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function deleteIncomingNotification($id) {
        $query = 'call deleteIncomingNotification(' . $id . ');';
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getNotificationByProfessor($id) {
        $query = 'call getNotificationByProfessor(' . $id . ');';

        try {
            $allNotifications = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allNotifications) > 0) {
                include_once '../business/CourseBusiness.php';
                $courseBusiness = new CourseBusiness();
                while ($row = mysqli_fetch_array($allNotifications)) {
                    $currentNotification = 
                    new Notification($row['notificationid'], $row['notificationtext'], 
                    $courseBusiness->getCourseId($row['notificationcourse'])[0]->getCourseName(), 
                    $row['notificationgroup'], $row['notificationprofessor'], $row['notificationyear'], 
                    $row['notificationperiod'], $row['notificationdate'], $row['notificationread']);
                    array_push($array, $currentNotification);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getIncomingNotificationByProfessor($id) {
        $query = 'call getIncomingNotificationByProfessor(' . $id . ');';

        try {
            $allNotifications = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allNotifications) > 0) {
                while ($row = mysqli_fetch_array($allNotifications)) {
                    $currentNotification = 
                    new Notification($row['notificationid'], $row['notificationtext'], "-", "-", 
                    $row['notificationprofessor'], $row['notificationyear'], $row['notificationperiod'], 
                    $row['notificationdate'], $row['notificationread']);
                    array_push($array, $currentNotification);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getAllNotificationByStudent($id) {
        $query = 'call getAllNotificationByStudent("' . $id . '");';
        try {
            $allNotifications = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allNotifications) > 0) {
                while ($row = mysqli_fetch_array($allNotifications)) {
                    $currentNotification = new Notification($row['notificationid'], $row['notificationtext'], $row['notificationcourse'], $row['notificationgroup'], $row['notificationprofessor'], $row['notificationyear'], $row['notificationperiod'], $row['notificationdate'], $row['notificationread']);
                    array_push($array, $currentNotification);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getNotification($id) {
        $query = 'call getNotification(' . $id . ');';
        try {
            $allNotifications = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allNotifications) > 0) {
                while ($row = mysqli_fetch_array($allNotifications)) {
                    $currentNotification = 
                    new Notification($row['notificationid'], $row['notificationtext'], $row['notificationcourse'], 
                    $row['notificationgroup'], $row['notificationprofessor'], $row['notificationyear'], 
                    $row['notificationperiod'], $row['notificationdate'], $row['notificationread']);
                    array_push($array, $currentNotification);
                }
            }

            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

}
