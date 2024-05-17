<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/clientes','Cliente::index');
$routes->get('/clientes/getClientes', 'Cliente::getClientes');
$routes->get('/clientes/getClienteById', 'Cliente::getClienteById');
$routes->get('/clientes/getClienteByNombre', 'Cliente::getClienteByNombre');
$routes->get('/clientes/getClienteByEmail', 'Cliente::getClienteByEmail');
$routes->get('/clientes/getClienteByTelefono', 'Cliente::getClienteByTelefono');
$routes->get('/clientes/getClienteByPreferencias', 'Cliente::getClienteByPreferencias');
$routes->get('/clientes/getHistorialReservas', 'Cliente::getHistorialReservas');


$routes->get('/clientes/agregarDato','Cliente::agregarDato');
$routes->post('/clientes/insertCliente','Cliente::insertCliente');
