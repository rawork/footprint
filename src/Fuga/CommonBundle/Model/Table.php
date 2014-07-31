<?php
	
namespace Fuga\CommonBundle\Model;

class Table {
	
	public $tables;

	public function __construct() {

		$this->tables = array();
		$this->tables[] = array(
			'name'			=> 'table',
			'module'		=> 'table',
			'title'			=> 'Tables',
			'order_by'		=> 'module_id,sort,name',
			'is_sort'		=> true,
			'is_publish'	=> true,
			'fieldset'		=> array (
				'title' => array (
					'name'	=> 'title',
					'title' => 'Title',
					'type'	=> 'string',
					'width' => '20%',
					'search'=> true
				),
				'name' => array (
					'name'	=> 'name',
					'title' => 'Name',
					'type'	=> 'string',
					'width' => '20%',
					'help'	=> 'English w/o spaces',
					'search' => true
				),
				'module_id' => array (
					'name'	=> 'module_id',
					'title' => 'Module',
					'type'	=> 'select',
					'help'	=> 'Module',
					'l_table' => 'config_module',
					'l_field' => 'title',
					'width' => '25%'//,
					//'group_update' => true
				),
				'order_by' => array (
					'name' => 'order_by',
					'title' => 'Sort by',
					'type' => 'string'
				),
				'is_view'	=> array (
					'name'	=> 'is_view',
					'title' => 'Tree',
					'type'	=> 'checkbox'
				),
				'is_lang'	=> array (
					'name'	=> 'is_lang',
					'title' => 'Multilang',
					'type'	=> 'checkbox',
					'width' => '1%',
					'group_update' => true
				),
				'is_sort'	=> array (
					'name'	=> 'is_sort',
					'title'	=> 'With sort',
					'type'	=> 'checkbox',
					'width' => '1%',
					'group_update' => true
				),
				'is_publish' => array (
					'name'	=> 'is_publish',
					'title'	=> 'With activity',
					'type'	=> 'checkbox',
					'width' => '1%',
					'group_update' => true
				),
				'is_search' => array (
					'name'	=> 'is_search',
					'title' => 'With search',
					'type'	=> 'checkbox',
					'width' => '1%',
					'group_update' => true
				),
				'show_credate'	=> array (
					'name'	=> 'show_credate',
					'title' => 'Show created',
					'type'	=> 'checkbox'
				),
				'multifile' => array (
					'name'	=> 'multifile',
					'title' => 'With files',
					'type'	=> 'checkbox'
				)
			)
		);

	$this->tables[] = array(
			'name'		=> 'field',
			'module' => 'table',
			'title'		=> 'Fields',
			'order_by'	=> 'table_id,sort',
			'is_sort'	=> true,
			'is_publish' => true,
			'fieldset'	=> array (
			'title'		=> array (
				'name'  => 'title',
				'title' => 'Title',
				'type'  => 'string',
				'width' => '21%',
				'search'=> true
			),
			'name' => array (
				'name'		=> 'name',
				'title'		=> 'Name',
				'search'	=> true,
				'type'		=> 'string',
				'help'		=> 'Англ. название поля',
				'width'		=> '21%',
				'search'	=> true
			),
			'table_id' => array (
				'name'		=> 'table_id',
				'title'		=> 'Table',
				'type'		=> 'select',
				'l_table'	=> 'table_table',
				'l_field'	=> 'title',
				'width'		=> '21%',
				'search'	=> true
			),
			'type' => array (
				'name'		=> 'type',
				'title'		=> 'Field type',
				'type'		=> 'enum',
				'select_values' => 'HTML|html;Select|select;Select tree|select_tree;Multiselect|select_list;Color|color;Gallery|gallery;Date|date;Datetime|datetime;Money|currency;Picture|image;Password|password;Enum|enum;String|string;Memo|text;File|file;Checkbox|checkbox;Integer|number;Template|template',
				'defvalue'	=> 'string',
				'width'		=> '21%'
			),
			'select_values' => array (
				'name'  => 'select_values',
				'title' => 'Values',
				'type'  => 'string',
				'help'  => 'Знак-раздельтель &laquo;;&raquo;'
			),
			'params' => array (
				'name'  => 'params',
				'title' => 'Parameters',
				'type'  => 'string'
			),
			'width' => array (
				'name'  => 'width',
				'title' => 'Width',
				'type'  => 'string',
				'width' => '10%',
				'defvalue' => '95%',
				'group_update' => true
			),
			'group_update' => array (
				'name'  => 'group_update',
				'title' => 'G',
				'type'  => 'checkbox',
				'width' => '1%',
				'group_update' => true,
				'help'  => 'Групповое обновление'
			),
			'readonly' => array (
				'name'  => 'readonly',
				'title' => 'R',
				'type'  => 'checkbox',
				'width' => '1%',
				'group_update' => true,
				'help' => 'Только чтение'
			),
			'search' => array (
				'name'  => 'search',
				'title' => 'S',
				'type'  => 'checkbox',
				'width' => '1%',
				'group_update' => true,
				'help' => 'Поиск'
			),
			'not_empty' => array (
				'name' => 'not_empty',
				'title' => 'Not empty',
				'type' => 'checkbox',
				'group_update'  => true,
				'width' => '1%'
			),
			'defvalue' => array (
				'name'  => 'defvalue',
				'title' => 'Default value',
				'search' => true,
				'type'  => 'string'
			)
		));
	}
}	