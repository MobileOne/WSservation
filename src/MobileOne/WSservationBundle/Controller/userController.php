<?php
namespace MobileOne\WSservationBundle\Controller;
use MobileOne\WSservationBundle\Entity\UserType;
use MobileOne\WSservationBundle\Entity\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use JMS\SecurityExtraBundle\Security\Util\String;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\FOSRestBundle;
class userController extends controller
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
			
		$user = $repository->findBy(array('email' => 'testEmail' ),
									array('email' => 'desc'),
									5,
									0);
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

	

}