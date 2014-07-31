<?php

namespace Fuga\PublicBundle\Controller;

use Fuga\CommonBundle\Controller\PublicController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContactController extends PublicController
{
	public function __construct()
	{
		parent::__construct('contact');
	}

	public function indexAction()
	{
		$items = $this->get('container')->getItems('contact_person', 'publish=1');

		return $this->render('contact/index.html.twig', compact('items'));
	}

}