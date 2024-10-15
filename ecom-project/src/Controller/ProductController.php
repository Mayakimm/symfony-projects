<?php

namespace App\Controller;

use App\Entity\Products;
use App\Entity\Categories;
use App\Form\ProductType;
use App\Form\CategoriesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
  #[Route('/product/add', name: 'app_productadd')]
  public function ajout(Request $request, EntityManagerInterface $entity): Response
  {
      $product = new Products();
      $form = $this->createForm(ProductType::class, $product);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()){
        $entity->persist($product);
        $entity->flush();
        $this->addFlash("message", "Produit ajouté avec succès");
        return $this->redirectToRoute("app_product");
      }
      // Formulaire pour catégories
      $category = new Categories();
      $formCategorie = $this->createForm(CategoriesType::class, $category);
      $formCategorie->handleRequest($request);
      if($formCategorie->isSubmitted() && $formCategorie->isValid()){
        $entity->persist($category);
        $entity->flush();
        $this->addFlash("message", "Catégorie ajouté avec success");
        return $this->redirectToRoute('app_productadd');
      }

      return $this->render('product/add.html.twig', [
          'form' => $form->createView(),
          'formCategorie' =>$formCategorie,
      ]);
    }

    #[Route('/product/modif/{id}', name: 'app_productmodif')]
      public function modif($id, Request $request, EntityManagerInterface $entity): Response
      {
          $product = $entity->getRepository(Products::class)->find($id);
          $form = $this->createForm(ProductType::class, $product);
          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()){
            $entity->persist($product);
            $entity->flush();
            $this->addFlash("message", "Produit modifié avec succès");
            return $this->redirectToRoute("app_product");
          }
          // Formulaire pour catégories
          $category = $entity->getRepository(Categories::class)->find($id);
          $formCategorie = $this->createForm(CategoriesType::class, $category);
          $formCategorie->handleRequest($request);
          if($formCategorie->isSubmitted() && $formCategorie->isValid()){
            $entity->persist($category);
            $entity->flush();
            $this->addFlash("message", "Catégorie modifié avec success");
            return $this->redirectToRoute('app_productadd');
          }

          return $this->render('product/add.html.twig', [
              'form' => $form->createView(),
              'formCategorie' =>$formCategorie,
          ]);
        }

        #[Route('/product/suppProduit/{id}', name: 'app_productsupp')]
        public function suppPro($id, Request $request, EntityManagerInterface $entity): Response
        {
            $product = $entity->getRepository(Products::class)->find($id);
            $entity->remove($product);
            $entity->flush();
            return $this->redirectToRoute('app_product');
          }

        #[Route('/product/suppCategories/{id}', name: 'app_productsuppCat')]
        public function suppCat($id, Request $request, EntityManagerInterface $entity): Response
        {
            $category = $entity->getRepository(Categories::class)->find($id);
            $entity->remove($category);
            $entity->flush();
            return $this->redirectToRoute('app_product');
          }


  #[Route('/product', name: 'app_product')]
  public function index(Request $request, EntityManagerInterface $entity): Response
  {
      $product = $entity->getRepository(Products::class)->findAll();

      return $this->render('product/index.html.twig', [
          'products' => $product,
      ]);
    }
}
