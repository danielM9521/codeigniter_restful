<?php
class UsuariosModel extends CI_Model
{
    //Metodo get
    public function getAll($param=null)
    {
        return $this->db->get('usuario')->result();
        


    }

    //Post
    public function insert($datos)
    {

        $sql="INSERT INTO usuario (nombre, apellido) VALUES (?,?);";
        $result=$this->db->query($sql,$datos);
        if ($result){
            return "Registro agregado correctamente";
        }else{
            return "Registro no agregado";
        }
    }

    //Metodo para eliminar
    public function delete($id){
        $result=$this->db->query("DELETE FROM usuario WHERE id_usuario=$id;");
        if ($result){
            return "Registro eliminado correctamente";
        }else{
            return "Registro no eliminado";
        }
    }

    //obtener un id
    public function getById($id){
        //con row se recorre la consulta
        return $this->db->query("SELECT * FROM usuario WHERE id_usuario=$id;")->row();
    }

    //Metodo Update
    public function update($data){

        $sql="UPDATE usuario SET nombre=?, apellido=? WHERE id_usuario=?;";
        $result=$this->db->query($sql,$data);
        if ($result){
            return "Registro actualizado correctamente".$result;
        }else{
            return "Registro no actualizado";
        }
    }
}
