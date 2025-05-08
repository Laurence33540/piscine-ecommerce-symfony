<?php

namespace App\Controller\guest;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController {

	

	#[Route('/list-products', name: 'list-products')]
	public function displayListProducts(ProductRepository $ProductRepository) {

		
		$product = $ProductRepository->findAll();

		return $this->render('guest/list-product.html.twig', [
			'products' => $product
		]);

	}


	#[Route('/details-product/{id}', name: "details-product")]
	public function displayDetailsProducts($id, ProductRepository $productRepository) {

		$product = $productRepository->find($id);

		return $this->render('guest/details-product.html.twig', [
			'product' => $product
		]);
	}

}