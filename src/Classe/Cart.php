<?php

namespace App\Classe;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class Cart
{
    private $session;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager, RequestStack $session)
    {
        $this->session = $session;
        $this->entityManager = $entityManager;
    }

    public function add($id)
    {
        $cart = $this->session->getSession()->get('cart', []);

        if(!empty($cart[$id])){
            $cart[$id]++;
        } else{
            $cart[$id] = 1;
        }


        $this->session->getSession()->set('cart', $cart);
    }

    public function get()
    {
        return $this->session->getSession()->get('cart');
    }

    public function remove()
    {
        return $this->session->getSession()->remove('cart');
    }

    public function delete($id)
    {
        $cart = $this->session->getSession()->get('cart', []);

        unset($cart[$id]);

        return $this->session->getSession()->set('cart', $cart);
    }

    public function decrease($id)
    {
        $cart = $this->session->getSession()->get('cart', []);

        if($cart[$id] > 1){
            $cart[$id]--;
        } else {
            unset($cart[$id]);
        }

        return $this->session->getSession()->set('cart', $cart);
    }

    public function getFull(){
        $cartComplete = [];

        if($this->get()){

             foreach($this->get() as $id => $quantity){
                $product_objet = $this->entityManager->getRepository(Product::class)->findOneById($id);

                if(!$product_objet){
                    $this->delete($id);
                    continue;
                }

                $cartComplete[] = [
                    'product' => $product_objet,
                    'quantity' => $quantity
                ];
            } 
        }

        return $cartComplete;
    }
}