<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * DefaultController class.
 *
 * @package AppBundle\Controller
 * @author Haracewiat <contact@haracewiat.pl>
 */
class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function indexAction(Request $request)
    {
        return $this->redirectToRoute('app_note_index');
    }

}

