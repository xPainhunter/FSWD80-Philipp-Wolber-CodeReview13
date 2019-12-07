<?php

	namespace AppBundle\Controller;
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\Routing\Annotation\Route;
	use AppBundle\Entity\Thing;

	use Symfony\Component\Form\Extension\Core\Type\TextType;
	use Symfony\Component\Form\Extension\Core\Type\TextareaType;
	use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
	use Symfony\Component\Form\Extension\Core\Type\IntegerType;
	use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;

	class ThingsController extends Controller{
		/**
		* @Route("/thingsView/view/{id}", name="view_page")
		*/
		public function viewAction($id){
			$em = $this->getDoctrine()->getManager();
			$thing = $em->getRepository(Thing::class)->find($id);
			return $this->render("thingsView/view.html.twig", array("thing"=>$thing));
		}

		/**
		* @Route("/thingsView/new", name="new_page")
		*/
		public function newAction(Request $request){
			$em = $this->getDoctrine()->getManager();
			$thing = new Thing;

			$form = $this->createFormBuilder($thing)
				->add('name', TextType::class, array('attr' => array('class' => 'form-control', 'placeholder' => 'Enter the name of your Event', 'style' => 'margin-bottom:15px')))
				->add('startDate', DateTimeType::class, array('attr' => array('class' => 'd-flex justify-content-around', 'style' => 'margin-bottom:30px')))
				->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'placeholder' => 'Enter a description', 'style' => 'margin-bottom:15px')))
				->add('img', TextType::class, array('attr' => array('class' => 'form-control', 'placeholder' => 'Enter the image name with datatype (example.jpg)', 'style' => 'margin-bottom:15px')))
				->add('capacity', IntegerType::class, array('attr' => array('class' => 'form-control', 'placeholder' => 'Enter the capacity', 'style' => 'margin-bottom:15px')))
				->add('email', TextType::class, array('attr' => array('class' => 'form-control', 'placeholder' => 'Enter the email of the person in charge', 'style' => 'margin-bottom:15px')))
				->add('tel', TextType::class, array('attr' => array('class' => 'form-control', 'placeholder' => 'Enter telephone number of person in charge', 'style' => 'margin-bottom:15px')))
				->add('address', TextType::class, array('attr' => array('class' => 'form-control', 'placeholder' => 'Enter Address', 'style' => 'margin-bottom:15px')))
				->add('link', TextType::class, array('attr' => array('class' => 'form-control', 'placeholder' => 'Enter a link', 'style' => 'margin-bottom:15px')))
				->add('type', ChoiceType::class, array('choices' => array('Music'=>'Music', 'Sport'=>'Sport', 'Movie'=>'Movie', 'Theater'=>'Theater', 'Clubbing'=>'Clubbing'), 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
				->add('save', SubmitType::class, array('label'=> 'Add Event', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-bottom:15px')))
				->getForm();
				$form->handleRequest($request);

			if($form->isSubmitted() && $form->isValid()){
				$name = $form['name']->getData();
				$startDate = $form['startDate']->getData();
				$description = $form['description']->getData();
				$img = $form['img']->getData();
				$capacity = $form['capacity']->getData();
				$email = $form['email']->getData();
				$tel = $form['tel']->getData();
				$address = $form['address']->getData();
				$link = $form['link']->getData();
				$type = $form['type']->getData();

				$thing->setName($name);
				$thing->setStartdate($startDate);
				$thing->setDescription($description);
				$thing->setImg($img);
				$thing->setCapacity($capacity);
				$thing->setEmail($email);
				$thing->setTel($tel);
				$thing->setAddress($address);
				$thing->setLink($link);
				$thing->setType($type);

				$em->persist($thing);
				$em->flush();	
				$this->addFlash(
					'notice',
					'Thing Added'
					);
				return $this->redirectToRoute('new_page');
			}
			return $this->render('thingsView/new.html.twig', array('form' => $form->createView()));
		}

		/**
		* @Route("/thingsView/edit/{id}", name="edit_page")
		*/
		public function editAction(Request $request, $id){
			$em = $this->getDoctrine()->getManager();
			$thing = $em->getRepository(Thing::class)->find($id);

			$thing->setName($thing->getName());
			$thing->setStartdate($thing->getStartdate());
			$thing->setDescription($thing->getDescription());
			$thing->setImg($thing->getImg());
			$thing->setCapacity($thing->getCapacity());
			$thing->setEmail($thing->getEmail());
			$thing->setTel($thing->getTel());
			$thing->setAddress($thing->getAddress());
			$thing->setLink($thing->getLink());
			$thing->setType($thing->getType());

			$form = $this->createFormBuilder($thing)
				->add('name', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
				->add('startDate', DateTimeType::class, array('attr' => array('class' => 'd-flex justify-content-around', 'style' => 'margin-bottom:30px')))
				->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
				->add('img', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
				->add('capacity', IntegerType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
				->add('email', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
				->add('tel', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
				->add('address', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
				->add('link', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
				->add('type', ChoiceType::class, array('choices' => array('Music'=>'Music', 'Sport'=>'Sport', 'Movie'=>'Movie', 'Theater'=>'Theater', 'Clubbing'=>'Clubbing'), 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
				->add('save', SubmitType::class, array('label'=> 'Edit Event', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-bottom:15px')))
				->getForm();
			$form->handleRequest($request);

			if($form->isSubmitted() && $form->isValid()){
				$name = $form['name']->getData();
				$startDate = $form['startDate']->getData();
				$description = $form['description']->getData();
				$img = $form['img']->getData();
				$capacity = $form['capacity']->getData();
				$email = $form['email']->getData();
				$tel = $form['tel']->getData();
				$address = $form['address']->getData();
				$link = $form['link']->getData();
				$type = $form['type']->getData();

				$thing->setName($name);
				$thing->setStartdate($startDate);
				$thing->setDescription($description);
				$thing->setImg($img);
				$thing->setCapacity($capacity);
				$thing->setEmail($email);
				$thing->setTel($tel);
				$thing->setAddress($address);
				$thing->setLink($link);
				$thing->setType($type);

				$em->flush();
				$this->addFlash('notice', 'Thing Added');
				return $this->redirectToRoute('index_page');
			}
		return $this->render('thingsView/edit.html.twig', array('thing' => $thing, 'form' => $form->createView()));
		}

		/**
		* @Route("/thingsView/delete/{id}", name="delete_page")
		*/
		public function deleteAction($id){
			$em = $this->getDoctrine()->getManager();
			$thing = $em->getRepository(Thing::class)->find($id);
			$em->remove($thing);
			$em->flush();
			$this->addFlash('notice','Event Removed');
			return $this->redirectToRoute('index_page');
		}
	}
?>