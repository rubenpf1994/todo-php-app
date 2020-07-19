<?php 

class Conexion
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'root';
    private $bd = 'todobd';
    private $conn;
	public function __construct() {
        $connection = mysqli_connect($this->host, $this->user, $this->pass, $this->bd);

        if (!$connection) {
            die('Error de Conexión (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }else{
            $this->conn = $connection;
        }
        
    }

    public function getConn(){
        return $this->conn;
    }

}
?>