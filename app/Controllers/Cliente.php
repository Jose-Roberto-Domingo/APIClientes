<?php

namespace App\Controllers;

use App\Controllers\BaseController;

Use CodeIgniter\HTTP\ResponseInterface;
Use CodeIgniter\HTTP\Response;

class Cliente extends BaseController
{
    public function index()
    {
        return view('datos');
    }
    
    public function getClientes(){
        $model = model('ClientesModel');
        $data['datos'] = $model->getClientes();
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/html');
        $response->noCache();
        $response->send();
    }
    
    public function getClienteById(){
        $model = model('ClientesModel');
        $data['datos'] = $model->getClienteById();
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/html');
        $response->noCache();
        $response->send();
    }
    
    public function getClienteByNombre(){
        $model = model('ClientesModel');
        $data['datos'] = $model->getClienteByNombre();
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/html');
        $response->noCache();
        $response->send();
    }
    
    public function getClienteByEmail(){
        $model = model('ClientesModel');
        $data['datos'] = $model->getClienteByEmail();
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/html');
        $response->noCache();
        $response->send();
    }
    
    public function getClienteByTelefono(){
        $model = model('ClientesModel');
        $data['datos'] = $model->getClienteByTelefono();
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/html');
        $response->noCache();
        $response->send();
    }
    
    public function getClienteByPreferencias(){
        $model = model('ClientesModel');
        $data['datos'] = $model->getClienteByPreferencias();
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/html');
        $response->noCache();
        $response->send();
    }
    public function agregarDato(){
        return view('agregarDato');
    }
    public function insertCliente(){
    $response = response();
    $data = [
        'nombre' => $_POST['nombre'],
        'telefono' => $_POST['telefono'],
        'email' => $_POST['email'],
        'preferencias' => $_POST['preferencias'],
        'historialReservas' => $_POST['historialReservas']
    ];
    $model = model('ClientesModel');

    if($model->insertCliente($data)){
        $data["error"] = false;
    }else{
        $data["error"] = "No se insertó";
    }        
    $response->setStatusCode(Response::HTTP_OK);
    $response->setBody(json_encode($data));
    $response->setHeader('Content-Type','application/json');
    $response->noCache();
    
    $response->send();
}

    
    public function getHistorialReservas(){
        $model = model('ClientesModel');
        $data['datos'] = $model->getClienteByHistorialReservas();
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/html');
        $response->noCache();
        $response->send();
    }
}
