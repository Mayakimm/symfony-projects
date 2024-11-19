<?php

namespace App\Controller;

use App\Repository\MenusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(SessionInterface $session, MenusRepository $menu): Response
    {
      $panier = $session->get('panier', []);

      $data = [];
      $total = 0;

      foreach($panier as $key => $quantity){
        $produit = $menu->find($key);

        $data[] = [
          "menu"=>$produit,
          "quantity"=>$quantity
        ];
        $total += $produit->getTime() * $quantity;
      }

      // dd($total);
      return $this ->render('panier/index.html.twig', [
        'data'=>$data,
        'total'=>$total,
      ]);
    }

    #[Route('/panier/add/{id}', name: 'app_add_panier')]
    public function add($id, SessionInterface $session): Response
    {
      $panier = $session->get('panier', []);

      if(empty($panier[$id])) {
        $panier[$id] = 1;
      }else{
        $panier[$id]++;
      }

      $session->set('panier', $panier);

      return $this->redirectToRoute("app_panier");
    }

    #[Route('/panier/delete/{id}', name: 'app_delete_panier')]
    public function delete($id, SessionInterface $session): Response
    {
      $panier = $session->get('panier', []);

      if(!empty($panier[$id])) {
        if($panier[$id]>1){
          $panier[$id]--;}
        else{
        unset($panier[$id]);
      }}

      $session->set('panier', $panier);

      return $this->redirectToRoute("app_panier");
    }

    #[Route('/panier/remove/{id}', name: 'app_remove_panier')]
    public function remove($id, SessionInterface $session): Response
    {
      $panier = $session->get('panier', []);

      if(!empty($panier[$id])){
        unset($panier[$id]);
      }

      $session->set('panier', $panier);

        return $this->redirectToRoute("app_panier");
    }

    #[Route('/panier/trash', name: 'app_trash_panier')]
    public function trash(SessionInterface $session): Response
    {
      $session->remove('panier');
      return $this->redirectToRoute("app_panier");
    }
}
