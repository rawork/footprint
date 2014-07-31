<?php

namespace Fuga\CommonBundle\Model;

class User {
	
	public $tables;

	public function __construct() {

		$this->tables = array();

		$this->tables[] = array(
		'name' => 'user',
		'module' => 'user',
		'title' => 'Users',
		'order_by' => 'login',
		'fieldset' => array (
			'login' => array (
				'name' => 'login',
				'title' => 'Login',
				'type' => 'string',
				'width' => '25%',
				'search' => true,
			),
			'password' => array (
				'name' => 'password',
				'title' => 'Password',
				'type' => 'password',
			),
			'token' => array (
				'name' => 'token',
				'title' => 'Token',
				'type' => 'string',
				'readonly' => true,
			),
			'hashkey' => array (
				'name' => 'hashkey',
				'title' => 'Hash',
				'type' => 'string',
				'readonly' => true,
			),
			'name' => array (
				'name' => 'name',
				'title' => 'Name',
				'type' => 'string',
				'width' => '15%',
				'search' => true,
			),
			'lastname' => array (
				'name' => 'lastname',
				'title' => 'Lastname',
				'type' => 'string',
				'width' => '15%',
				'search' => true,
			),
			'email' => array (
				'name' => 'email',
				'title' => 'E-mail',
				'type' => 'string',
				'width' => '20%',
				'search' => true,
			),
			'group_id' => array (
				'name' => 'group_id',
				'title' => 'Group',
				'type' => 'select',
				'l_table' => 'user_group',
				'l_field' => 'title',
				'width' => '25%',
				'search' => true,
			),
			'is_admin' => array (
				'name' => 'is_admin',
				'title' => 'Admin',
				'type' => 'checkbox',
				'width' => '1%',
				'group_update' => true
			),
			'is_active' => array (
				'name' => 'is_active',
				'title' => 'Active',
				'type' => 'checkbox',
				'width' => '1%',
				'group_update' => true,
				'search' => true,
			)	
		));

		$this->tables[] = array(
		'name' => 'group',
		'module' => 'user',
		'title' => 'User groups',
		'order_by' => 'title',
		'fieldset' => array (
			'title' => array (
				'name' => 'title',
				'title' => 'Title',
				'type' => 'string',
				'width' => '20%',
			),
			'name' => array (
				'name' => 'name',
				'title' => 'name',
				'type' => 'string',
				'width' => '15%',
				'help' => 'english letters w/o spaces',
				'search' => true,
			),
			'rules' => array (
				'name' => 'rules',
				'title' => 'Access',
				'type' => 'select_list',
				'l_table' => 'config_module',
				'l_field' => 'title',
				'view_type' => 'simple', // dialog
				'link_table' => 'user_group_module',
				'link_inversed' => 'group_id',
				'link_mapped' => 'module_id',
				'width' => '60%',
				'search' => true,
			)
		));
		
	}
}