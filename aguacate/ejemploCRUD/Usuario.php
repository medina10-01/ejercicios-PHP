<?php
require_once("Autoload.php");

class Usuario extends Conexion{
    private $intId;
    private $strNombre;
    private $intTelefono;
    private $strEmail;
    private $strDireccion;
    private $conexion;

    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function insertUsuario(string $nombre, int $telefono, string $email, string $direccion){
        try {
            $this->strNombre = $nombre;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->strDireccion = $direccion;

            $sql = "INSERT INTO usuario(nombre,telefono,email,direccion) VALUES(:nom, :tel, :email, :dir) ";

            $insert = $this->conexion->prepare($sql);

            $arrData = array(":nom" => $this->strNombre,
                ":tel" => $this->intTelefono,
                ":email" => $this->strEmail,
                ":dir" => $this->strDireccion
            );
            $resInsert = $insert->execute($arrData);
            //$idInsert = $this->conexion->lastInsertId();
            $insert->closeCursor();
            return $idInsert;
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage()();
        }
    }

    public function getUsuarios(){
        try {
            $sql = "SELECT * FROM usuario";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC); //ARRAY
            //$request = $execute->fetchall(PDO::FETCH_CLASS); //OBJETOS
            $execute->closeCursor();
            return $request;
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage()();
        }

    }

    public function getUsuario(int $id){
        try {
            $this->intId = $id;
            $sql = "SELECT * FROM usuario WHERE idusuario = :id";
            $arrData = array(":id" => $this->intId);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrData);
            $request = $query->fetch(PDO::FETCH_ASSOC); //ARRAY
            $query->closeCursor();
            return $request;
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage()();
        }

    }


    public function updateUsuario(int $id, string $nombre, int $telefono, string $email, string $direccion){
        try {
            $this->intId = $id;
            $this->strNombre = $nombre;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->strDireccion = $direccion;

            $sql = "UPDATE usuario SET nombre = :nom, telefono = :tel, email = :email, direccion = :dir WHERE idusuario = :id";
            $update = $this->conexion->prepare($sql);
            $arrData = array(
                ":nom" => $this->strNombre,
                ":tel" => $this->intTelefono,
                ":email" => $this->strEmail,
                ":dir" => $this->strDireccion,
                ":id" => $this->intId
            );
            $resUpdate = $update->execute($arrData);
            //$idInsert = $this->conexion->lastInsertId(); // retorna el id del usuario
            $update->closeCursor();//se cierra la conexion
            return $resUpdate;
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage()();
        }

    }

    public function deleteUser(int $id){
        try {
            $this->intId = $id;
            $sql = "DELETE FROM usuario WHERE idusuario = :id";
            $delete = $this->conexion->prepare($sql);

            $arrData =  [
                ":id" => $this->intId
            ];
            //ejecutar la consulta
            $del = $delete->execute($arrData);

            return $del;
        }catch (Throwable $th) {
            echo "Error: ". $e->getMessage();
        }

    }

}
?>