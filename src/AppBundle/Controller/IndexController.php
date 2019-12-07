<?php

	namespace AppBundle\Controller;


	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\Routing\Annotation\Route;
	use AppBundle\Entity\Thing;

	class IndexController extends Controller{
		/**
		* @Route("/", name="index_page")
		*/
		public function indexAction(Request $request){
			$em = $this->getDoctrine()->getManager();
			$thing = $em->getRepository(Thing::class)->findAll();
			return $this->render("thingsView/index.html.twig", array("thing"=>$thing));
		}
	}
?>