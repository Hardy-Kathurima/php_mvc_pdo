<?php
class User
{
    private $dsn = "mysql:host=localhost;dbname=pdo_mvc";
    private $username = "root";
    private $password = "";
    public $db;


    public function __construct()
    {
        try {
            $this->db = new PDO($this->dsn, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }


    public function index()
    {
        $user_data = [];
        $select = "SELECT * FROM users";
        $stmt = $this->db->prepare($select);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as  $value) {
            $user_data[] = $value;
        }
        return $user_data;
    }

    public function insert($firstName, $lastName, $email)
    {
        $insert = "INSERT INTO users(first_name,last_name,email) VALUES(:firstName,:lastName,:email)";
        $stmt = $this->db->prepare($insert);
        $stmt->execute(['firstName' => $firstName, 'lastName' => $lastName, 'email' => $email]);
        return true;
    }
    public function getUserById($id)
    {
        $select = "SELECT * FROM users WHERE id=:id";
        $stmt = $this->db->prepare($select);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($id, $firstName, $lastName, $email)
    {
        $update = "UPDATE users SET first_name=:firstName,last_name=:lastName,email=:email WHERE id=:id";
        $stmt = $this->db->prepare($update);
        $stmt->execute(['id' => $id, 'firstName' => $firstName, 'lastName' => $lastName, 'email' => $email]);
        return true;
    }

    public function delete($id)
    {
        $delete = "DELETE FROM users WHERE id=:id";
        $stmt = $this->db->prepare($delete);
        $stmt->execute(['id' => $id]);
        return true;
    }

    public function totalRows()
    {
        $select = "SELECT * FROM users";
        $stmt = $this->db->prepare($select);
        $stmt->execute();
        $total_rows = $stmt->rowCount();
        return $total_rows;
    }
}
