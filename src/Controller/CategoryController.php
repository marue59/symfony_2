<?php

namespace App\Controller;


use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

Class CategoryController extends AbstractController
{
    /**
     * @Route("/category/add", name="add_category")
     * @param Request $request
     * @return Response
     */
    public function addCategory(Request $request): Response
    {
        $category = new Category();

        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();

            $this->redirectToRoute('wild_index');
        }
        return $this->render('wild/add_category.html.twig', [
            'form' => $form->createView(),
            'category' =>$category,
        ]);
    }
}
