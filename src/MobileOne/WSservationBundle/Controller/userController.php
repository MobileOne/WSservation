<?php
namespace MobileOne\WSservationBundle\Controller;

use MobileOne\WSservationBundle\Entity\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use JMS\SecurityExtraBundle\Security\Util\String;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\FOSRestBundle;
use MobileOne\WSservationBundle\Entity;
use MobileOne\WSservationBundle\Entity\User;
use MobileOne\WSservationBundle\Entity\Report;
use Symfony\Component\HttpFoundation\Session\Session;

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
	    $user  ->setFirstName($content->{'firstName'});
	    $user  ->setLastName($content->{'lastName'});
	    $user  ->setEmail($content->{'email'});
	    $user  ->setPassword($content->{'password'});
	
	
	
	    // Persist les données
	    $em = $this->getDoctrine()->getManager();
	    $em->persist($user);
	    $em->flush();
	
	
	    return $user;
	
	
	  }
	  
	  
	  public function postReportAction()
	  {
	  	
	  	$request = $this->get('request');
	  	$content = json_decode($request->getContent());
	  	
	  	$repository = $this->container->get('doctrine')
		->getManager()
		->getRepository('MobileOneWSservationBundle:User');
			
		$user = $repository->find($content -> {'id'});
		
	  	$report = new Report();
	  	
	  	$report -> setDate(new \DateTime());
	  	$report -> setUser($user);
	  	$report -> setDescription($content -> {'description'});
	  	
	  	$em = $this->getDoctrine()->getManager();
	  	$em->persist($report);
	  	$em->flush();
	  	return $report;
	  	
	  }
	  
	  public function getUserReportAction($id)
	  {
// 	  	$em = $this->$this->container->get('doctrine')
// 	  	->getManager();
	  	$repositoryUser = $this->container->get('doctrine')
	  							->getManager()
	  							->getRepository('MobileOneWSservationBundle:User');
	  	
		$repositoryReports = 	$this->container->get('doctrine')
	  							->getManager()
	  							->getRepository('MobileOneWSservationBundle:Report');
	  	  		
	  	$user = $repositoryUser->find($id);
	  	
	  	

	  	$reports = $repositoryReports -> findBy(array('user' => $user),
                                     array('date' => 'desc')
	  			
                                    );
	  	
	  	
	  	return $reports;
	  }

}