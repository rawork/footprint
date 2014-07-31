<?php

namespace Fuga\CommonBundle\Model;

class Config {
	
	public $tables;

	public function __construct() {

		$this->tables = array();
		$this->tables[] = array(
			'name' => 'module',
			'module' => 'config',
			'title' => 'Modules',
			'order_by' => 'sort,title',
			'fieldset' => array (
			'title' => array (
				'name' => 'title',
				'title' => 'Title',
				'type' => 'string',
				'width' => '25%'
			),
			'name' => array (
				'name' => 'name',
				'title' => 'Name',
				'type' => 'string',
				'width' => '20%',
				'search' => true
			),
			'path' => array (
				'name' => 'path',
				'title' => 'Path',
				'type' => 'string',
				'width' => '50%',
				'search' => true
			),
			'sort' => array (
				'name' => 'sort',
				'title' => 'sort',
				'type' => 'number',
				'group_update'  => true,
				'width' => '3%'
			)
		));

		$this->tables[] = array(
			'name' => 'variable',
			'module' => 'config',
			'title' => 'Common settings',
			'order_by' => 'name',
			'fieldset' => array (
			'title' => array (
				'name' => 'title',
				'title' => 'Title',
				'type' => 'string',
				'width' => '33%',
				'search' => true
			),
			'name' => array (
				'name' => 'name',
				'title' => 'Name',
				'type' => 'string',
				'width' => '33%',
				'search'=> true
			),
			'value' => array (
				'name'  => 'value',
				'title' => 'Value',
				'width' => '33%',
				'type' => 'string'
			)
		));

		$this->tables[] = array(
			'name' => 'version',
			'module' => 'config',
			'title' => 'Site versions',
			'order_by' => 'id',
			'is_publish' => true,
			'fieldset' => array (
				'title' => array (
					'name' => 'title',
					'title' => 'Title',
					'type' => 'string',
					'width' => '40%',
				),
				'folder' => array (
					'name' => 'folder',
					'title' => 'Folder',
					'type' => 'string',
					'width' => '40%',
				),
				'language' => array (
					'name'  => 'language',
					'title' => 'Language',
					'width' => '15%',
					'type'  => 'enum',
					'select_values' => 'en',
					'defvalue' => 'en',
				)
			));

	}
}
