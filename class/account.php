<?php


class account extends model{
    public $table="account";
    public $email;
    public $id;
    public $key;
    public $username;
    public $created_time;
    
    
    
    function account($db){
        parent::__construct($db);
        $this->email=filter_input(INPUT_GET,'email');
        $this->username=filter_input(INPUT_GET,'username');
    }
    
    function create(){
        $this->created_time=time();
        if($this->email==""||!$this->email){
            return array(new application($this->db),false,"need email");
        }
        if($this->username==""||!$this->username){
            return array(new application($this->db),false,"need username");
        }
        $this->key=md5($this->created_time.$this->email.  rand(0, 1000));
        $sql="INSERT INTO $this->table("
                . "email,"
                . "key,"
                . "created_time,"
                . "username"
                . ") VALUES ("
                . "'$this->email',"
                . "'$this->key',"
                . "$this->created_time,"
                . "'$this->username'"
                . ")";
        echo $sql;
        $this->db->query($sql);
        if($this->db->result){
            return array(new application($this->db),true,"creating account success");
        }else{
            return array(new application($this->db),false,"creating account failed");
        }
    }
    function read($res){}
    function update(){}
    function delete(){}
}
