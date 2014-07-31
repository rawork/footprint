<?php

namespace Fuga\PublicBundle\Controller;

use Fuga\CommonBundle\Controller\PublicController;

class BlogController extends PublicController
{
	public function __construct()
	{
		parent::__construct('blog');
	}

	public function indexAction($node)
	{
		$nodeItem = $this->getManager('Fuga:Common:Page')->getNodeByName($node);
		$page = $this->get('request')->query->get('page', 1);
		$paginator = $this->get('paginator');
		$paginator->paginate(
			$this->get('container')->getTable('blog_blog'),
			$this->generateUrl('public_page_dinamic', array('node'=> $node, 'action'=> 'index')).'?page=###',
			'publish=1 AND node_id='.$nodeItem['id'],
			$this->getParam('per_page'),
			$page
		);
		$paginator->setTemplate('public');
		$items = $this->get('container')->getItems(
			'blog_blog',
			'publish=1 AND node_id='.$nodeItem['id'],
			null,
			$paginator->limit
		);

		return $this->render('blog/index.html.twig', compact('items', 'paginator'));
	}

	public function viewAction($id)
	{
		$item = $this->get('container')->getItem('blog_blog', 'publish=1 AND id='.$id);
		if (!$item) {
			throw $this->createNotFoundException('Статья не найдена');
		}

		$this->get('container')->setVar('title', $item['name']);

		if (preg_match_all('/#([a-z0-9]+)#/', $item['content'], $matches)){
			foreach($matches[0] as $key => $match) {
				$video = $this->get('container')->getItem('blog_video', 'name="'.$matches[1][$key].'"');
				if ($video) {
					$code = $this->get('templating')->render('blog/video.html.twig', array('item'=> $video));
				} else {
					$code = '';
				}
				$item['content'] = str_replace($match, $code, $item['content']);
			}
		}

		$galleries = array();
		if (preg_match_all('/\$([a-z0-9]+)\$/', $item['content'], $matches)){
			foreach($matches[0] as $key => $match) {
				$foto = $this->get('container')->getItem('blog_foto', 'name="'.$matches[1][$key].'"');
				if ($foto) {
					$code = $this->get('templating')->render('blog/foto.html.twig', array('item'=> $foto));
					$galleries[] = $foto['name'];
				} else {
					$code = '';
				}
				$item['content'] = str_replace($match, $code, $item['content']);
			}
		}

		$galleries = $galleries ? json_encode($galleries) : null;
		$posts = $this->getManager('Fuga:Public:Blog')->getPostsByTags($item['tag_id_value']['extra'], $item['id']);

		return $this->render('blog/view.html.twig', compact('item', 'posts', 'galleries'));
	}

	public function readAction($id)
	{
		$item = $this->get('container')->getItem('blog_blog', 'publish=1 AND id='.$id);
		if (!$item) {
			throw $this->createNotFoundException('Новость не найдена');
		}

		return $this->render('blog/view.html.twig', compact('item'));
	}
}