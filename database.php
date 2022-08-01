<?php
    class database{
        public $que;
        private $servername='localhost';
        private $username='citc';
        private $password='sysdev';
        private $dbname='crud';
        private $result;
        private $mysqli;
        public $sql;

        public function __construct(){
            $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        }

        public function insert($table, $para=array()){
            $table_columns = implode(',', array_keys($para));
            $table_value = implode("','", $para);

            $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";

            $result = $this->mysqli->query($sql);
        }

        public function update($table, $para=array(), $id){
            $args = array();

            foreach ($para as $key => $value) {
                $args[] = "$key = '$value'";
            }

            $sql="UPDATE $table SET " . implode(',', $args);

            $sql .=" WHERE $id";

            $result = $this->mysqli->query($sql);
        }

        public function delete($table, $id){
            $sql="DELETE FROM $table";
            $sql .=" WHERE $id ";
            $sql;
            $result = $this->mysqli->query($sql);
        }

        public function select($table, $rows="*", $where = null){
            if ($where != null) {
                $sql="SELECT $rows FROM $table WHERE $where";
            }else{
                $sql="SELECT $rows FROM $table";
            }

            $this->sql = $result = $this->mysqli->query($sql);
        }

        public function __destruct(){
            $this->mysqli->close();
        }
    }
?>