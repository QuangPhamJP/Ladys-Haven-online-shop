<?php
    /**
     * 
     */
    class DatabaseConnect
    {
        private static $conn = null;
        
        public static function connect(){
            try{
                return $conn = new PDO("mysql:host=localhost;dbname=ladyshop", "doraemon", "123456");
            }catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
                return null;
            }
        }

        public static function getResult($querySelect, $conn){
            if($conn != null){
                $stm = $conn->prepare($querySelect);
                $stm->execute();
                return $result = $stm->fetchAll();
            }
            else{
                printf("Fail get result. Connect fail");
                return null;
            }
        }

        public static function closeConnect($conn){
            if($conn != null){
                $conn = null;
                echo 'Da dong ket noi';
            }
        }
    }        
    
?>