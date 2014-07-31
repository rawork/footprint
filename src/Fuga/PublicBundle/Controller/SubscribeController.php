<?php

namespace Fuga\PublicBundle\Controller;

use Fuga\CommonBundle\Controller\Controller;

class SubscribeController extends Controller
{
	public function indexAction()
	{
		$subscribe_message = '';
		if (isset($_SESSION['subscribe_message'])) {
			$subscribe_message = $_SESSION['subscribe_message'];
		}
		return $this->render('subscribe/form.html.twig', compact('subscribe_message'));
	}

	public function subscribeAction()
	{
		$type = $this->get('request')->request->get('type');
		$email = $this->get('request')->request->get('email');
		$name = $this->get('request')->request->get('name');
		$lastname = $this->get('request')->request->get('lastname');

		if (!$this->get('util')->isEmail($email)) {
			$message = array(
				'message' => 'Неправильный E-mail',
				'success' => false
			);
		} else {
			if ($type == 2) {
				$message = $this->getManager('Fuga:Common:Subscribe')->unsubscribe($email);
			} elseif ($type == 1) {
				$message = $this->getManager('Fuga:Common:Subscribe')->subscribe($email, $name, $lastname);
			}
		}

		return array('content' => $this->render('subscribe/result.html.twig', $message));
	}

	public function activateAction($key)
	{
		$this->get('session')->set('subscribe_message', $this->getManager('Fuga:Common:Subscribe')->activate($key));

		return $this->redirect($this->generateUrl('subscribe_index'));
	}

	public function sendAction()
	{
		$this->get('session')->getFlashBag()->add(
			'admin.message',
			$this->get('scheduler')->everyMinute() ? 'Ошибка отправки писем' : 'Письма разосланы'
		);

		return $this->redirect($this->generateUrl(
			'admin_entity_index',
			array('state' => 'service', 'module' => 'subscribe', 'entity' => 'lists')
		));
	}

}