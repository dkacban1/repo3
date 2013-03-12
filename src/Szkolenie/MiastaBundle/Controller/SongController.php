<?php

namespace Szkolenie\MiastaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Szkolenie\MiastaBundle\Entity\Song;
use Szkolenie\MiastaBundle\Form\SongType;

/**
 * Song controller.
 *
 * @Route("/song")
 */
class SongController extends Controller
{
    /**
     * Lists all Song entities.
     *
     * @Route("/", name="song")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SzkolenieMiastaBundle:Song')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Song entity.
     *
     * @Route("/", name="song_create")
     * @Method("POST")
     * @Template("SzkolenieMiastaBundle:Song:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Song();
        $form = $this->createForm(new SongType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('song_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Song entity.
     *
     * @Route("/new", name="song_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Song();
        $form   = $this->createForm(new SongType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Song entity.
     *
     * @Route("/{id}", name="song_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SzkolenieMiastaBundle:Song')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Song entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Song entity.
     *
     * @Route("/{id}/edit", name="song_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SzkolenieMiastaBundle:Song')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Song entity.');
        }

        $editForm = $this->createForm(new SongType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Song entity.
     *
     * @Route("/{id}", name="song_update")
     * @Method("PUT")
     * @Template("SzkolenieMiastaBundle:Song:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SzkolenieMiastaBundle:Song')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Song entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SongType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('song_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Song entity.
     *
     * @Route("/{id}", name="song_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SzkolenieMiastaBundle:Song')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Song entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('song'));
    }

    /**
     * Creates a form to delete a Song entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
