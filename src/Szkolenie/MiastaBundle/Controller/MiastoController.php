<?php

namespace Szkolenie\MiastaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Szkolenie\MiastaBundle\Entity\Miasto;
use Szkolenie\MiastaBundle\Form\MiastoType;

/**
 * Miasto controller.
 *
 * @Route("/miasto")
 */
class MiastoController extends Controller
{
    /**
     * Lists all Miasto entities.
     *
     * @Route("/", name="miasto")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SzkolenieMiastaBundle:Miasto')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Miasto entity.
     *
     * @Route("/", name="miasto_create")
     * @Method("POST")
     * @Template("SzkolenieMiastaBundle:Miasto:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Miasto();
        $form = $this->createForm(new MiastoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('miasto_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Miasto entity.
     *
     * @Route("/new", name="miasto_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Miasto();
        $form   = $this->createForm(new MiastoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Miasto entity.
     *
     * @Route("/{id}", name="miasto_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SzkolenieMiastaBundle:Miasto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Miasto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Miasto entity.
     *
     * @Route("/{id}/edit", name="miasto_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SzkolenieMiastaBundle:Miasto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Miasto entity.');
        }

        $editForm = $this->createForm(new MiastoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Miasto entity.
     *
     * @Route("/{id}", name="miasto_update")
     * @Method("PUT")
     * @Template("SzkolenieMiastaBundle:Miasto:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SzkolenieMiastaBundle:Miasto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Miasto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MiastoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('miasto_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Miasto entity.
     *
     * @Route("/{id}", name="miasto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SzkolenieMiastaBundle:Miasto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Miasto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('miasto'));
    }

    /**
     * Creates a form to delete a Miasto entity by id.
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
