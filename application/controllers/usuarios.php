<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UsuariosModel');
	}

	public function index()
	{
		$dato["titulo"] = "Hola mundo";
		$this->load->view('welcome_message', $dato);
	}


	public function getAll()
	{
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json;");
		header("Access-Control-Allow-Methods: GET");
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$datos = ['usuarios' => $this->UsuariosModel->getAll()];
			// //Mostrando el json
			echo json_encode($datos);
		} else {
			$error = array('Error' => 'No se puede obtener los registros');
			echo json_encode($error);
		}
	}

	//Obtener registro por su id
	public function getById($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json;");
		header("Access-Control-Allow-Methods: GET");
		//obteniendo el registro de la db
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$dato = ['usuario' => $this->UsuariosModel->getById($id)];
			echo json_encode($dato);
		} else {
			$error = array('Error' => 'No se puede obtener los registros');
			echo json_encode($error);
		}
	}

	public function insert()
	{
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json;");
		header("Access-Control-Allow-Methods: POST");
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if ($_SERVER['CONTENT_TYPE'] == 'application/json') {
				$post = file_get_contents('php://input');
				$post = json_decode($post);
				$result = $this->UsuariosModel->insert($post);
				echo $result . ", por application/json";
			} elseif ($_SERVER['CONTENT_TYPE'] == 'application/x-www-form-urlencoded') {
					if (isset($_POST)) {
					$data = $_POST;
				}
				$result = $this->UsuariosModel->insert($data);
				echo $result. ", por application/x-www-form-urlencoded";
			}
		} else {
			$error = array('Error' => 'No se puede ingresar el nuevo registro');
			echo json_encode($error);
		}
	}

	public function update()
	{
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json;");
		header("Access-Control-Allow-Methods: PUT");
		if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
			if ($_SERVER['CONTENT_TYPE'] == 'application/json') {
				$_PUT = file_get_contents('php://input');
				$_PUT = json_decode($_PUT);
				$result = $this->UsuariosModel->update($_PUT);
				echo $result . ", por application/json";
			} elseif ($_SERVER['CONTENT_TYPE'] == 'application/x-www-form-urlencoded') {
				parse_str(file_get_contents('php://input'), $_PUT);
				$result = $this->UsuariosModel->update($_PUT);
				echo $result . ", por application/x-www-form-urlencoded";
			}
		} else {
			$error = array('Error' => 'No se puede actualizar el registro');
			echo json_encode($error);
		}
	}

	public function delete($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json;");
		header("Access-Control-Allow-Methods: DELETE");
		if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
			$result = $this->UsuariosModel->delete($id);
			echo $result;
		} else {
			$error = array('Error' => 'No se puede eliminar el registro');
			echo json_encode($error);
		}
	}
}
