<?php
class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        var_dump($row);
        // Check row
        if($row){
            return true;
        } else {
            return false;
        }
    }
    //Register the user
    public function register($data) {
        $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
        //Bind the values to the sql statement
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute the insert statement
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}