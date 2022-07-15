<?php 
    class Database{
       protected $connection;
       
        public function __construct($host="localhost",$user="root",$pass="",$dbname="doobstore"){
            $this->connection = new mysqli($host,$user,$pass,$dbname);
            if($this->connection->connect_error){
                $this->error('Erreur De connection '.$this->connection->connect_error);
            }
           
            $this->connection->set_charset('utf8');
        }

        public function query($query){
            $queryExe = mysqli_query($this->connection,$query);
            if(mysqli_num_rows($queryExe)>0){
                while($row = mysqli_fetch_assoc($queryExe)){
                    return $row;
                }
            }
            else{
                echo "no data are available";
            }
            
        }
        /**
         * this functions are for selection from data base
         * 
         */
        public function SelectAll($table,$row_count=Null){
            if(is_null($row_count)){
                $sql = "SELECT * FROM $table";
            }
            else{
                $sql = "SELECT * FROM $table LIMIT $row_count";
            }   
            $queryExe = mysqli_query($this->connection,$sql);
            if(mysqli_num_rows($queryExe)>0){
                while($row = mysqli_fetch_assoc($queryExe)){
                    $data[] = $row;
                }
                return $data;
            }

        }
        //select by candition

        
        public function Select($table='books',$parameter,$value){
           

            $sql = "SELECT * FROM $table WHERE $parameter = '$value'";
            $exe = mysqli_query($this->connection,$sql) or die(mysqli_error($this->connection));
            if(mysqli_num_rows($exe) > 0){
                while($row = mysqli_fetch_assoc($exe)){
                    $data[]=$row;
                }
                return $data;
            }
            

            
        }
        
        /**
         * this function are for insertion into database
         * 
         */
        public function insert($table,$columns,$values){
            $Request = "INSERT INTO $table($columns)VALUES($values)";
            if(mysqli_query($this->connection,$Request)){
                return true;
            }
            else{
                return  mysqli_error($this->connection);
            }
            
        }
        


    }

   

