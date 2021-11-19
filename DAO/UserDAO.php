<?php

namespace DAO;

use DAO\IUserDAO as IUserDAO;
use Models\User as User;
use DAO\Connection as Connection;

class UserDAO implements IUserDAO
{
    private $connection;
    private $tableName = "user";

    public function Add(User $user)
    {
        try {
            $sql = "INSERT INTO user (email, name, id_student, id_company, id_userType) 
                VALUES (:email, :name, :id_student, :id_company, :id_userType);";


            $parameters["email"] = $user->getEmail();         
            $parameters["name"] = $user->getName();
            $parameters["id_student"] = $user->getStudentId();
            $parameters["id_company"] = $user->getCompanyId();
            $parameters["id_userType"] = $user->getUserTypeId();


            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sql, $parameters);
        } catch (\PDOException $ex) {
            throw $ex;
        }
    }

    public function GetAll()
    {
        try {
            $userList = array();

            $sql = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($sql);

            foreach ($resultSet as $row) {
                $user = new User();
                $user->setUserId($row["id_user"]);
                $user->setEmail($row["email"]);              
                $user->setName($row["name"]);
                $user->setStudentId($row["id_student"]);
                $user->setCompanyId($row["id_company"]);
                $user->setUserTypeId($row["id_userType"]);

                array_push($userList, $user);
            }
            return $userList;
        } catch (\PDOException $ex) {
            throw $ex;
        }
    }

    public function getUserByEmail($email)
    {
        $userExist = NULL;
        $users = $this->GetAll();

        foreach ($users as $user) {
            if ($user->getEmail() == $email) {
                $userExist = $user;
            }
        }        
        return $userExist;
    }

    public function getUserById($userId)
    {
        try {

            $query = "SELECT * FROM user WHERE id_user =:id_user";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $user = new User();
                $user->setUserId($row["id_user"]);
                $user->setEmail($row["email"]);               
                $user->setName($row["name"]);
                $user->setStudentId($row["id_student"]);
                $user->setCompanyId($row["id_company"]);
                $user->setUserTypeId($row["id_userType"]);
            }
            return $user;
        } catch (\PDOException $ex) {
            throw $ex;
        }
    }
}
 


?>