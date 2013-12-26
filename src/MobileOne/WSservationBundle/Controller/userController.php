<?php
namespace MobileOne\WSservationBundle\Controller;
use MobileOne\WSservationBundle\Entity;
use MobileOne\WSservationBundle\Entity\User;
use MobileOne\WSservationBundle\Entity\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use JMS\SecurityExtraBundle\Security\Util\String;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\FOSRestBundle;
use Symfony\Component\BrowserKit\Request;
//use Doctrine\Tests\Models\Quote\User;
//use MobileOne\WSservationBundle\Form\UserType;
use MobileOne\WSservationBundle\Form;
use MobileOne\WSservationBundle\Form\UserType;


class userController extends Controller
{
	/**
	 * 
	 *
	 * @return array
	 * 
	
	 */
	public function getUserAction($id)
	{
		$repository = $this->container->get('doctrine')
		->getManager()
		->getRepository('MobileOneWSservationBundle:User');
			
		$user = $repository->find($id);
		return $user;
	}
	
	
	/**
	 *
	 *
	 * @return array
	 *
	
	 */
	public function getUsersAction()
	{
		$repository = $this->container->get('doctrine')
		->getManager()
		->getRepository('MobileOneWSservationBundle:User');
			
		$user = $repository->findAll();
		return array('users' => $user);
	}
	
	
	/**
	 *
	 *
	 * @return array
	 *
	
	 */
	public function getEmailPasswordAuthentificationAction($email, $pass)
	{
		$repository = $this->container->get('doctrine')
		->getManager()
		->getRepository('MobileOneWSservationBundle:User');
		
		$user = $repository->findOneBy(array('email'=>$email));
		$userPassword = $user->getPassword();
		if($userPassword == $pass)
		{
			return $user;
		}
		else
		{
			return false;
		}
		
		
		
	}
	

	
	public function postUserAction()
	{

		$request = $this->get('request');
		$content = json_decode($request->getContent());
		
		$user = new User();
		$user	->setFirstName($content->{'firstName'});
		$user	->setLastName($content->{'lastName'});
		$user	->setEmail($content->{'email'});
		$user	->setPassword($content->{'password'});
		
		

		// Persist les données
		$em = $this->getDoctrine()->getManager();
		$em->persist($user);
		$em->flush();
			

		return $user;
		
		
	}
	

	

}