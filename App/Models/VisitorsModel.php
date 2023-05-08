<?php
class VisitorsModel{

    private $db;

		public function __construct(){
			$this->db = (new Database())->getPdo();
		}

        public function addVisitors($ip, $country, $browser){

            $sql = "INSERT INTO visitors (ip, country, browser) VALUES ('$ip', '$country', '$browser')";
            
            $this->db->query($sql); 
                
        }
        public function getLastVisitor() {
            // Выполнение запроса к базе данных для получения последнего посетителя
            $sql = "SELECT * FROM visitors ORDER BY timestamp DESC LIMIT 1";
            $result = $this->db->query($sql);
    
            // Обработка результатов запроса
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            } else {
                return null;
            }
        }

   }