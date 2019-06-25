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

		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			// header("Access-Control-Allow-Methods: GET");
			$data = ['usuarios' => $this->UsuariosModel->getAll()];
			// //Mostrando el json
			echo json_encode($data);
		} else {
			echo "ERRORAZO";
		}
	}

	//obtener id
	public function getById($id)
	{
		//header("Access-Control-Allow-Methods: GET");
		//obteniendo el registro de la db
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$dato = ['usuario' => $this->UsuariosModel->getById($id)];
			//enviando el registro a la bd
			echo json_encode($dato);
		} else {
			echo "ERRORAZO";
		}
	}

	public function insert()
	{

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = "";
			if (isset($_POST)) {
				$data = $_POST;
			}
			$result = $this->UsuariosModel->insert($data);
			echo $result;
		} else {
			echo "ERRORAZO";
		}
	}

	public function update()
	{



		//  header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json;");
		//   header("Access-Control-Allow-Methods: PUT");
		//  header("Access-Control-Max-Age: 3600");
		//  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
		if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
			$data = "";
			if (isset($_POST)) {
				$data = $_POST;
			}
			$result = $this->UsuariosModel->update($data);
			echo $result;
		} else {
			echo "ERRORAZO";
		}
	}



	public function delete($id)
	{
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $result = $this->UsuariosModel->delete($id);
            echo $result;
        }else{
					echo "ERRORAZO";
				}

	}
}
