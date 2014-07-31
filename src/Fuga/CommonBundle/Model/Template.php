<?php
	
namespace Fuga\CommonBundle\Model;

class Template {
	
	public $tables;

	public function __construct() {

		$this->tables = array();
		$this->tables[] = array(
		'name' => 'template',
		'module' => 'template',
		'title' => 'Templates',
		'order_by' => 'name',
		'is_lang' => true,
		'fieldset' => array (
			'name' => array (
				'name' => 'name',
				'title' => 'Name',
				'type' => 'string',
				'width' => '95%'
			),
			'template' => array (
				'name' => 'template',
				'title' => 'Template HTML',
				'type' => 'template'
			)
		));
		$this->tables[] = array(
		'name' => 'version',
		'module' => 'template',
		'title' => 'Версионирование',
		'order_by' => 'id DESC',
		'is_hidden' => true,
		'fieldset' => array (
			'table_name' => array (
				'name' => 'table_name',
				'title' => 'Table',
				'type' => 'string',
				'width' => '20%',
				'search'=> true
			),
			'field_name' => array (
				'name' => 'field_name',
				'title' => 'Field',
				'type' => 'string',
				'width' => '25%',
				'search'=> true
			),
			'entity_id' => array (
				'name' => 'entity_id',
				'title' => 'Entity',
				'type' => 'number',
				'width' => '25%',
				'search' => true
			),
			'file' => array (
				'name'  => 'file',
				'title' => 'Version',
				'type' => 'file',
				'width' => '25%'
			)
		));
		$this->tables[] = array(
		'name' => 'rule',
		'module' => 'template',
		'title' => 'Template rules',
		'order_by' => 'sort',
		'is_lang' => true,
		'is_sort' => true,
		'fieldset' => array (
			'template_id' => array (
				'name' => 'template_id',
				'title' => 'Template',
				'type' => 'select',
				'l_table' => 'template_template',
				'l_field' => 'name',
				'l_lang' => true,
				'width' => '31%'
			),
			'type' => array (
				'name' => 'type',
				'title' => 'Condition type',
				'type' => 'enum',
				'select_values' => 'Раздел|F;Параметр URL|U;Период времени|T',
				'width' => '20%'
			),
			'cond' => array (
				'name' => 'cond',
				'title' => 'Condition',
				'type' => 'string',
				'width' => '20%'
			),
			'datefrom' => array (
				'name' => 'datefrom',
				'title' => 'Start show',
				'type' => 'datetime',
				'width' => '12%'
			),
			'datetill' => array (
				'name' => 'datetill',
				'title' => 'Stop show',
				'type' => 'datetime',
				'width' => '12%'
			)
		));
	}
}	