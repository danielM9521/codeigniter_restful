<?php
class UsuariosModel extends CI_Model
{
    //Metodo get
    public function getAll($param = null)
    {
        return $this->db->get('usuario')->result();
    }

    //Registramos datos en la bd
    public function insert($datos)
    {
        //Si viene por application/json
        if (is_array($datos)) {
            $sql = "INSERT INTO usuario (nombre, apellido) VALUES (?,?);";
            $result = $this->db->query($sql, $datos);
        }
        //Si viene por application/x-www-form-urlencoded
        elseif (is_object($datos)) {
            $this->db->set('nombre', $datos->{'nombre'});
            $this->db->set('apellido', $datos->{'apellido'});
            $result = $this->db->insert('usuario');
        }
        if ($result) {
            return "Registro agregado correctamente";
        } else {
            return "Registro no agregado";
        }
    }

    //Metodo para eliminar
    public function delete($id)
    {
        $result = $this->db->query("DELETE FROM usuario WHERE id_usuario=$id;");
        if ($result) {
            return "Registro eliminado correctamente";
        } else {
            return "Registro no eliminado";
        }
    }

    //Obtener un registro por su id
    public function getById($id)
    {
        //con row se recorre la consulta
        return $this->db->query("SELECT * FROM usuario WHERE id_usuario=$id;")->row();
    }

    //Método para actualizar un registro de la bd
    public function update($data)
    {
        //Si viene por application/json
        if (is_array($data)) {
            $sql = "UPDATE usuario SET nombre = ? , apellido = ? WHERE id_usuario = ?;";
            $result = $this->db->query($sql, $data);
        }
        //Si viene por application/x-www-form-urlencoded
        elseif (is_object($data)) {
            $this->db->set('nombre', $data->{'nombre'});
            $this->db->set('apellido', $data->{'apellido'});
            $this->db->where('id_usuario', $data->{'id_usuario'});
            $result = $this->db->update('usuario');
        }
        if ($result) {
            return "Registro actualizado correctamente";
        } else {
            return "Registro no actualizado";
        }
    }
}
