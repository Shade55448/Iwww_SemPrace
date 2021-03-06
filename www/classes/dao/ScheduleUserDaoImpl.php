<?php
require_once("./classes/dao/ScheduleUserDao.php");
require_once("./classes/Connection.php");

class ScheduleUserDaoImpl implements ScheduleUserDao
{
    protected $_db;

    public function __construct()
    {
        $this->_db = Connection::getPdoInstance();
    }

    function getAllScheduleUsers(): array
    {
        $stmt = $this->_db->prepare('SELECT * FROM `Schedule-User`');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insertScheduleUser($scheduleId, $userId, $gradeId)
    {
        $stmt = $this->_db->prepare('INSERT INTO `Schedule-User`(id_schedule, id_user, id_grade)
         VALUES(:id_schedule, :id_user, :id_grade)');
        $stmt->bindParam(":id_schedule", $scheduleId);
        $stmt->bindParam(":id_user", $userId);
        $stmt->bindParam(":id_grade", $gradeId);
        $stmt->execute();
    }

    public function deleteScheduleUserById($id)
    {
        $stmt = $this->_db->prepare("DELETE FROM `Schedule-User` WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function getScheduleUserById($id)
    {
        $stmt = $this->_db->prepare("SELECT * FROM `Schedule-User` WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateScheduleUser($id, $scheduleId, $userId, $gradeId)
    {
        $stmt = $this->_db->prepare("UPDATE `Schedule-User` SET
                id_schedule = :id_schedule,
                id_user = :id_user,
                id_grade = :id_grade WHERE id = :id");

        $stmt->bindParam(":id_schedule", $scheduleId);
        $stmt->bindParam(":id_user", $userId);
        $stmt->bindParam(":id_grade", $gradeId);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function getScheduleUserByScheduleId($scheduleId): array
    {
        $stmt = $this->_db->prepare("SELECT * FROM `Schedule-User` WHERE id_schedule = :id");
        $stmt->bindParam(":id", $scheduleId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getScheduleUserByScheduleIdAndUserId($scheduleId, $userId): array
    {
        $stmt = $this->_db->prepare("SELECT * FROM `Schedule-User` WHERE id_schedule = :id AND id_user = :user_id");
        $stmt->bindParam(":id", $scheduleId);
        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteScheduleUserByScheduleIdAndUserId($scheduleId, $userId)
    {
        $stmt = $this->_db->prepare("DELETE FROM `Schedule-User` WHERE id_schedule = :id AND id_user = :user_id");
        $stmt->bindParam(":id", $scheduleId);
        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();
    }

    public function getScheduleUserByUserId($userId): array
    {
        $stmt = $this->_db->prepare("SELECT * FROM `Schedule-User` WHERE id_user = :user_id");
        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}