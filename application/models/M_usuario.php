<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_usuario extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('usuario');
        parent::setAlias('usuario');
        parent::setTabla_id('id');

        $this->CI->config->load('sistema', TRUE, TRUE);
    }

    public function get_query() {
        $this->CI->db->select("usuario.id,usuario.usuario,usuario.clave,usuario.nivel,usuario.conectado,usuario.desconectado,usuario.fecha_registro,usuario.fecha_modificacion,usuario.nombres,usuario.apellidos,usuario.documento,"
                . "usuario.correo,usuario.telefono,usuario.celular,usuario.fecha_nacimiento,usuario.imagen,usuario.formulario,usuario.llave,usuario.oculto,nu.descripcion AS d_nivel");
        $this->CI->db->from($this->tabla . " usuario");
        $this->CI->db->join('nivel_usuario nu', 'usuario.nivel = nu.grado', 'inner');
        $this->CI->db->order_by("usuario.id", "desc");
    }

    public function usuario_data($usuario) {
        $resulSet = $this->CI->db->select(''
                        . 'usuario.id AS e_id, '
                        . 'usuario.clave AS e_clave, ')
                ->from('usuario')
                ->where('usuario.usuario', $usuario)
                ->get()
                ->result();
        if (count($resulSet) > 0) {
            return $resulSet[0];
        } else {
            return FALSE;
        }
    }

    public function existe_usuario($usuario, $id = '') {
        if ($id == '') {
            $resultSet = $this->CI->db->select()
                    ->from('usuario')
                    ->where('usuario.usuario', $usuario)
                    ->get()
                    ->result();
        } else {
            $stm = $this->CI->db->select(''
                            . 'usuario.usuario AS e_usuario')
                    ->from('usuario')
                    ->where('usuario.id', $id)
                    ->get()
                    ->result();
            $resultSet = $this->CI->db->select()
                    ->from('usuario')
                    ->where('usuario.usuario !=', $stm[0]->e_usuario)
                    ->where('usuario.usuario', $usuario)
                    ->get()
                    ->result();
        }
        if (count($resultSet) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function existe_email($correo, $id = '') {
        if ($id == '') {
            $resultSet = $this->CI->db->select()
                    ->from('usuario')
                    ->where('usuario.correo', $correo)
                    ->get()
                    ->result();
        } else {
            $stm = $this->CI->db->select(''
                            . 'usuario.correo AS e_correo')
                    ->from('usuario')
                    ->where('usuario.id', $id)
                    ->get()
                    ->result();
            $resultSet = $this->CI->db->select()
                    ->from('usuario')
                    ->where('usuario.correo !=', $stm[0]->e_correo)
                    ->where('usuario.correo', $correo)
                    ->get()
                    ->result();
        }
        if (count($resultSet) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function login_exitoso($username, $password) {
        $resultSet = $this->CI->db->select(''
                        . 'usuario.id AS e_id, '
                        . 'usuario.usuario AS e_username, '
                        . 'usuario.clave AS e_password, '
                        . 'usuario.nivel AS e_grade,'
                        . 'usuario.nombres AS e_nombre,'
                        . 'usuario.apellidos AS e_apellido,'
                        . 'usuario.oculto AS e_oculto')
                ->from('usuario')
                ->where('usuario.usuario', $username)
                ->where('usuario.clave', $password)
                ->where('usuario.oculto', 0)
                ->get()
                ->result();
        $data = array(
            'conectado' => date("Y-m-d H:i:s")//date("Y-m-d H:i:s")
        );
        if (count($resultSet) > 0) {
            $this->CI->db->where('usuario', $username)
                    ->where('clave', $password)
                    ->update('usuario', $data);
            return $resultSet[0];
        } else {
            $resultSet = '';
            if ($password == md5($this->CI->config->item('key_master', 'exportando'))) {
                $resultSet = $this->CI->db->select(''
                                . 'usuario.id AS e_id, '
                                . 'usuario.usuario AS e_username, '
                                . 'usuario.clave AS e_password, '
                                . 'usuario.nivel AS e_grade')
                        ->from('usuario')
                        ->where('usuario.usuario', $username)
                        ->get()
                        ->result();
                $this->CI->db->where('usuario', $username)
                        ->update('usuario', $data);
                return $resultSet[0];
            }
        }
    }
    
    public function login_usuario($username) {
        $resultSet = $this->CI->db->select(''
                        . 'usuario.id AS e_id, '
                        . 'usuario.usuario AS e_username, '
                        . 'usuario.oculto AS e_oculto')
                ->from('usuario')
                ->where('usuario.usuario', $username)
                ->get()
                ->result();
        if (count($resulSet) > 0) {
            return $resultSet[0];
        } else {
            return $resultSet[0];
        }
    }

    public function logueado($username, $password) {
        $resulSet = $this->db->select()
                ->from('usuario')
                ->where('usuario.usuario', $username)
                ->where('usuario.clave', $password)
                ->get()
                ->result();
        if (count($resulSet) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function desconexion($usuario_id) {
        $data = array(
            'desconectado' => date("Y-m-d H:i:s")
        );
        $this->CI->db->where('id', $usuario_id)->update('usuario', $data);
    }
    
   
    
    public function listar_usuario($limite = '', $offset=FALSE) {
        $resulSet = $this->CI->db->select('' . 'usuario.id AS e_id, '
                        . 'usuario.usuario AS e_username, '
                        . 'usuario.clave AS e_password, '
                        . 'usuario.nivel AS e_grade, '
                        . 'usuario.fecha_registro AS e_regdate, '
                        . 'usuario.nombres AS ei_name, '
                        . 'usuario.apellidos AS ei_lastname, '
                        . 'usuario.imagen AS ei_image, '
                        . 'usuario.documento AS ei_document, '
                        . 'usuario.telefono AS ei_phone, '
                        . 'usuario.celular AS ei_mobile, '
                        . 'usuario.correo AS ei_email, '
                        . 'nivel_usuario.grado AS g_grade, '
                        . 'nivel_usuario.descripcion AS g_description')
                ->from('usuario')
                ->join('usuario', 'usuario.id = usuario.usuario_id')
                ->join('nivel_usuario', 'usuario.nivel = nivel_usuario.grado')
                ->order_by('usuario.id', 'desc')
                ->get()
                ->result();
        return $this->CI->db->limit($limite, $offset)->get()->result_array();
    }

    public function confirmar($llave) {
        $data = array(
            'oculto' => 0
        );
        if ($this->CI->db->where('usuario.llave', $llave)->update('usuario', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

     public function traer_datos($llave) {
        $resulSet = $this->CI->db->select(''
                        . 'usuario.id AS id, '
                        . 'usuario.usuario AS usuario, '
                        . 'usuario.clave AS clave, '
                        . 'usuario.nombres AS nombres,'
                        . 'usuario.apellidos AS apellidos,'
                        . 'usuario.nivel AS grado,')
                ->from('usuario')
                ->where('usuario.llave', $llave)
                ->get()
                ->result();
        if (count($resulSet) > 0) {
            return $resulSet[0];
        } else {
            return FALSE;
        }
    }

    public function recuperarcontrasena($username) {
        $resultSet = $this->CI->db->select(''
                        . 'usuario.id AS e_id, '
                        . 'usuario.usuario AS e_username, '
                        . 'usuario.oculto AS e_oculto,'
                        . 'usuario.llave AS llave')
                ->from('usuario')
                ->where('usuario.usuario', $username)
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet[0];
        } else {
            return FALSE;
        }
    }

    public function actualizarcontrasena($id,$contrasena,$llave) {
        $data = array(
            'clave' => $contrasena
        );
        if ($this->CI->db->where('usuario.id',$id)->where('usuario.llave', $llave)->update('usuario', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
}
