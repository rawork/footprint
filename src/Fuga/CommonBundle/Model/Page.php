<?php

namespace Fuga\CommonBundle\Model;

class Page {
	
	public $tables;

	public function __construct() {

		$this->tables = array();
		$this->tables[] = array(
			'name' => 'page',
			'module' => 'page',
			'title' => 'Pages',
			'order_by' => 'sort,name', 
			'is_lang' => true,
			'is_publish' => true,
			'is_sort' => true,
			'is_view' => true,
			'is_search' => true,
			'fieldset' => array (
			'title' => array (
				'name' => 'title',
				'title' => 'Title',
				'type' => 'string',
				'width' => '60%',
				'search' => true
			),
			'name' => array (
				'name' => 'name',
				'title' => 'Name',
				'type' => 'string',
				'width' => '30%',
				'help' => 'english w/o spaces',
				'search' => true
			),
			'url' => array (
				'name' => 'url',
				'title' => 'Url',
				'type' => 'string'
			),
			'parent_id' => array (
				'name' => 'parent_id',
				'title' => 'Belong to',
				'type' => 'select_tree',
				'l_table' => 'page_page',
				'l_field' => 'title',
				'l_sort' => 'sort,title',
				'l_lang' => true
			),
			'module_id' => array (
				'name' => 'module_id',
				'title' => 'Type',
				'type' => 'select',
				'l_table' => 'config_module',
				'l_field' => 'title',
				'query' => "id NOT IN(17)"
			),
			'content' => array (
				'name' => 'content',
				'title' => 'Content',
				'type' => 'html'
			),
			'left_key' => array (
				'name'  => 'left_key',
				'title' => 'Left key',
				'type'  => 'number',
				'readonly' => true
			),
			'right_key' => array (
				'name'  => 'right_key',
				'title' => 'Right key',
				'type'  => 'number',
				'readonly' => true
			),
			'level' => array (
				'name'  => 'level',
				'title' => 'Level',
				'type'  => 'number',
				'readonly' => true
			)
		));

		$this->tables[] = array(
			'name' => 'block',
			'module' => 'page',
			'title' => 'Blocks',
			'order_by' => 'name', 
			'is_lang' => true,
			'is_publish' => true,
			'fieldset' => array (
			'title' => array (
				'name' => 'title',
				'title' => 'Title',
				'search' => true,
				'type' => 'string',
				'width' => '45%',
				'search'=> true
			),
			'name' => array (
				'name' => 'name',
				'title' => 'Name',
				'type' => 'string',
				'width' => '45%',
				'search'=> true
			),
			'content' => array (
				'name'  => 'content',
				'title' => 'Content',
				'type' => 'html'
			)
		));
		
		$this->tables[] = array(
			'name' => 'seo',
			'module' => 'page',
			'title' => 'SEO',
			'fieldset' => array (
			'words' => array (
				'name' => 'words',
				'title' => 'URI strings',
				'type' => 'text',
				'help' => 'use comma',
				'width' => '20%'
			),
			'keywords' => array (
				'name' => 'keywords',
				'title' => 'URI substrings',
				'type' => 'text',
				'help' => 'Use comma',
				'width' => '20%'
			),
			'title' => array (
				'name' => 'title',
				'title' => 'Page title',
				'type' => 'text',
				'width' => '25%',
				'search' => true
			),
			'meta' => array (
				'name' => 'meta',
				'title' => 'Page meta',
				'type' => 'text',
				'width' => '25%',
				'help' => 'including service symbols',
				'search' => true
			)
		));
	}
}