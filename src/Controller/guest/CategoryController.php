<?php

namespace App\Controller\guest;

use App\Entity\Category;
use App\Form\CategoryForm;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController {


	#[Route('/list-categories', name:"list-categories")]
	public function displayListCategories(CategoryRepository $categoryRepository) {
		
		$categories = $categoryRepository->find('title');

		return $this->render('guest/list-category.html.twig', [
			'categories' => $categories
		]);
	}


	#[Route('/details-category/{id}', name: "details-category")]
	public function displayShowCategory($id, CategoryRepository $categoryRepository) {
		
		$category = $categoryRepository->find($id);

		return $this->render('guest/details-category.html.twig', [
			'category' => $category
		]);

	}
		}
