<?php

namespace Fuga\CommonBundle\Model;

use Symfony\Component\HttpFoundation\RedirectResponse;

class LocaleManager extends ModelManager
{
	public function getLocales()
	{
		return array('en');
	}

	public function getCurrentLocale()
	{
		return $this->get('session')->get('locale');
	}

	public function setLocale($locale)
	{
		if ($this->get('session')->get('locale', PRJ_LOCALE) != $locale) {
			$this->get('session')->set('locale', $locale);
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$response = new RedirectResponse($_SERVER['REQUEST_URI'], 302);
				$response->send();
				exit;
			}
		} elseif (!$this->get('session')->get('locale')) {
			$this->get('session')->set('locale', PRJ_LOCALE);
		}
	}
} 