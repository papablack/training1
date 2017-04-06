<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Note;
use AppBundle\Form\NoteType;
use Doctrine\DBAL\DBALException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * NoteController class.
 *
 * @package AppBundle\Controller
 * @author Haracewiat <contact@haracewiat.pl>
 */
class NoteController extends Controller
{

    /**
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Note:index.html.twig', array(
            'notes' => $this->getUser()->getNotes(),
            'form' => $this->createForm(NoteType::class, null, array('action' => $this->generateUrl('app_note_note')))->createView(),
        ));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function noteAction(Request $request)
    {
        $note = new Note();
        $note->setUser($this->getUser());
        $form = $this->createForm(NoteType::class, $note);

        $form->handleRequest($request);

        if (true == $form->isValid()) {
            try {
                $em = $this->getDoctrine()->getManager();
                $em->persist($note);
                $em->flush();

                $this->addFlash('success', 'Note created');
            } catch (\Exception $exception) {
                $this->addFlash('error', 'Error occurred');
            }
        }

        return $this->redirectToRoute('app_note_index');
    }

}
