<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'clientes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre', 'telefono', 'email', 'preferencias', 'historialReservas'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getClientes(){
        $db = db_connect();
        $builder = $db->table('clientes')->select('nombre')->groupBy('nombre');
        $query = $builder->get();
        return $query->getResult();
    }
    
    public function getClienteById(){
        $request = request();
        $id = $request->getGet('id');
        $db = db_connect();
        $sql = $db->table('clientes')->select('*')->where('id', $id);
        $query = $sql->get();
        return $query->getResult();
    }
    
    public function getClienteByNombre(){
        $request = request();
        $nombre = $request->getGet('nombre');
        $db = db_connect();
        $sql = $db->table('clientes')->select('nombre')->where('nombre', $nombre);
        $query = $sql->get();
        return $query->getResult();
    }

    public function insertCliente($data){
        $this->insert($data);
        return true;
    }
    
    public function getClienteByEmail(){
        $request = request();
        $email = $request->getGet('email');
        $db = db_connect();
        $sql = $db->table('clientes')->select('nombre')->select('email')->where('email', $email);
        $query = $sql->get();
        return $query->getResult();
    }
    public function getClienteByPreferencias(){
        $request = request();
        $preferencias = $request->getGet('preferencias');
        $db = db_connect();
        $sql = $db->table('clientes')->select('nombre')->select('preferencias')->where('preferencias', $preferencias);
        $query = $sql->get();
        return $query->getResult();
    }
    public function getHistorialReservas(){
        $request = request();
        $historialReservas = $request->getGet('historialReservas');
        $db = db_connect();
        $sql = $db->table('clientes')->select('nombre')->select('historialReservas')->where('historialReservas', $historialReservas);
        $query = $sql->get();
        return $query->getResult();
    }
}
