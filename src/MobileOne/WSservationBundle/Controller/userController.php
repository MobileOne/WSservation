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
use MobileOne\WSservationBundle\Entity\Picture;
use MobileOne\WSservationBundle\Entity\Report;
use Symfony\Component\HttpFoundation\Session\Session;
use MobileOne\WSservationBundle\Entity\Customer;
use MobileOne\WSservationBundle\Entity\Company;
use MobileOne\WSservationBundle\Entity\Sound;
use Symfony\Component\HttpFoundation\Request;
use MobileOne\WSservationBundle\Form\UserType;
use MobileOne\WSservationBundle\Entity\ReportRepository;
use Symfony\Component\Core\SecurityContext;
use JMS\SecurityExtraBundle\Annotation\Secure;
// use Symfony\Component\BrowserKit\Request;


class userController extends Controller
{
	public function persist($entity)
	{
		$em = $this->getDoctrine()->getManager();
		$em->persist($entity);
		$em->flush();
	}
	
	public function remove($entity)
	{
		$em = $this->getDoctrine()->getManager();
		$em->remove($entity);
		$em->flush();
	}
	
	/*******************************************************************************************************************
											Users
	********************************************************************************************************************/
	public function postUserAction()
	{
// 		$user = new User();
		
		
// 		$form = $this->createForm(new UserType(), $user);
		
// 		$form->bind($this->getRequest());
		$request = $this->get('request');
		$content = json_decode($request->getContent());
		$company = $this->getCompanyAction($content -> {'companyId'});
		$repositoryUsers = $this->container->get('doctrine')
		->getManager()
		->getRepository('MobileOneWSservationBundle:User');
		$users = $repositoryUsers->findAll();
		$email = $content->{'email'};
		foreach ($users as $value)
		{
			if ($email == $value->getEmail())
			{
				return 'email deja existant';
			}
			
		}
		
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$salt = time();
			$password = $content->{'password'} . $salt;
// 			$password = $content->{'password'};
			$passwordEncode = hash('sha256', $password);
			$user = new User();
			$user	->setSalt($salt);
			$user  ->setUsername($content->{'firstName'});
			$user  ->setLastName($content->{'lastName'});
			$user  ->setEmail($content->{'email'});
			$user  ->setPassword($passwordEncode);
			$user  ->setCompany($company);
			$this->persist($user);
			return $user;
		}
		return "Ceci n'est pas une adresse mail valide";
		
	}
	
	public function putUserAction($id)
	{
		$request = $this->get('request');
		$content = json_decode($request->getContent());
		$user = $this->getUserAction($id);
		$user  ->setUsername($content->{'firstName'});
		$user  ->setLastName($content->{'lastName'});
		$user  ->setEmail($content->{'email'});		
		$this->persist($user);
		
		return $user;
		
	}
		
	/**
	 * @return array
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
	 * @return array
	 */
	public function postAuthentificationAction()
	{
		$request = $this->get('request');
		$content = json_decode($request->getContent());
		$repository = $this->container->get('doctrine')
		->getManager()
		->getRepository('MobileOneWSservationBundle:User');
		$user = $repository->findOneBy(array('email'=>$content->{'email'}));
		if ($user != null)
		{

			$userPassword = $user->getPassword();
			if($userPassword == hash('sha256', $content->{'password'} . $user->getSalt()))
			{
				return $user;
			}
			return "Wrong";
				
		}
		return "Wrong";
	}
	
	public function deleteUserAction($id)
	{
		$user = $this->getUserAction($id);
		$this->remove($user);
		return "done";
	
	}
	
	/*******************************************************************************************************************
	 											Companies
	********************************************************************************************************************/
	
	/**
	 * @return array
	 */
	public function getCompanyUserAction($id)
	{
		$repositoryUsers = $this->container->get('doctrine')
		->getManager()
		->getRepository('MobileOneWSservationBundle:User');
		$company = $this->getCompanyAction($id);
		$users = $repositoryUsers -> findBy(array('company' => $company));
		return $users;
	}
	
	
	public function postCompanyAction()
	{
		$request = $this->get('request');
		$content = json_decode($request->getContent());
		$directory = 'D:/Dev/workspace/mobileOne/Companies directory/';
		$nameCompany = $content->{'name'};
		$companyDirectory = $directory.basename($nameCompany);
		
		$company = new Company();
		$company -> setName($content->{'name'});
		//Créer le dossier de la societe s'il n'existe pas.
		//Créer un user par défaut.
		if (!file_exists ($companyDirectory))
		{
			mkdir($companyDirectory);
		}
		
		$this->persist($company);
		return $company;
	}
	
	public function putCompanyAction($id)
	{
		$request = $this->get('request');
		$content = json_decode($request->getContent());
		$company = $this->getCompanyAction($id);
		$company -> setName($content->{'name'});
		$this->persist($company);
		return $company;
	}
	
	
	public function getCompanyAction($id)
	{
		$repository = $this->container->get('doctrine')
		->getManager()
		->getRepository('MobileOneWSservationBundle:Company');
			
		$company = $repository->find($id);
	
		return $company;
	}
	
	public function deleteCompanyAction($id)
	{
		$company = $this->getCompanyAction($id);
		$this->remove($company);
		return "done";
	}
	
	/*******************************************************************************************************************
	 											Customers
	********************************************************************************************************************/
	
	
	public function postCustomerAction()
	{
		$request = $this->get('request');
		$content = json_decode($request->getContent());
		$company = $this->getCompanyAction($content->{'companyId'});
		$customer = new Customer();
		$customer -> setFirstName($content->{'firstName'});
	    $customer -> setLastName($content->{'lastName'});
	    $customer -> setCompany($company);   
	    $this->persist($customer);
		return $customer;
	}
	
	public function getCustomerAction($id)
	{
		$repository = $this->container->get('doctrine')
		->getManager()
		->getRepository('MobileOneWSservationBundle:Customer');		
		$customer = $repository->find($id);

		return $customer;
	}
	
	public function getCompanyCustomerAction($id)
	{

		$repositoryCustomers = $this->container->get('doctrine')
		->getManager()
		->getRepository('MobileOneWSservationBundle:Customer');
		$company = $this->getCompanyAction($id);
		
		
		$customers = $repositoryCustomers -> findBy(array('company' => $company));
		
		return $customers;
	}
	
	
	
	public function getCustomersAction()
	{
		$repository = $this->container->get('doctrine')
		->getManager()
		->getRepository('MobileOneWSservationBundle:Customer');	
		$customer = $repository->findAll();	
		return array('customers' => $customer);
	}
	
	public function deleteCustomerAction($id)
	{
		$customer = $this->getCustomerAction($id);
		$this->remove($customer);
		return "done";
	}
	
	

	/*******************************************************************************************************************
	 											Reports
	********************************************************************************************************************/
	  
	  
	  public function postReportAction()
	  {
	  	
	  	$request = $this->get('request');
	  	$content = json_decode($request->getContent());	
		$customer = $this->getCustomerAction($content -> {'customerId'});
		$user = $this->getUserAction($content -> {'userId'});
	  	$report = new Report();
	  	$report -> setDate(new \DateTime());
	  	$report -> setUser($user);
	  	$report -> setCustomer($customer);
	  	$report -> setTitle($content -> {'title'});
	  	$report -> setDescription($content -> {'description'});
	  	$report -> setPositionX($content -> {'positionX'});
	  	$report -> setPositionY($content -> {'positionY'});
	  	$this->persist($report);
	  	return $report;
	  	
	  }
	  
	  
	  
	  public function putReportAction($id)
	  {
	  	$request = $this->get('request');
	  	$content = json_decode($request->getContent());
	  	$report = $this->getReportAction($id);
	  	$report -> setDescription($content -> {'description'});
	  	$this->persist($report);
	  	return $report;
	  }
	  
	  public function getReportAction($id)
	  {
	  	$repositoryReports = 	$this->container->get('doctrine')
	  	->getManager()
	  	->getRepository('MobileOneWSservationBundle:Report');  	
	  	$report = $repositoryReports->find($id);
	  	return $report;
	  	
	  }
	  
	  
	  public function getUserReportAction($id)
	  { 	
		$repositoryReports = 	$this->container->get('doctrine')
	  							->getManager()
	  							->getRepository('MobileOneWSservationBundle:Report');
	  	$user = $this->getUserAction($id);
	  	$reports = $repositoryReports -> findBy(array('user' => $user),
                                     array('date' => 'desc')
                                    );
	  	return $reports;
	  }
	  
	  
	  
	  public function getCustomerReportAction($id)
	  {
	  	$customer = $this->getCustomerAction($id);
	  	$repositoryReports = 	$this->container->get('doctrine')
	  	->getManager()
	  	->getRepository('MobileOneWSservationBundle:Report');
	  	$reports = $repositoryReports -> findBy(array('customer' => $customer),
	  			array('date' => 'desc')
	  	);
	  	return $reports;
	  }
	  
	  
	  public function getCompanyReportAction($id)
	  {
// 	  	$company = $this->getCompanyAction($id);
	  	$users = $this->getCompanyUserAction($id);
	  	$repositoryReports = 	$this->container->get('doctrine')
	  	->getManager()
	  	->getRepository('MobileOneWSservationBundle:Report');
	  	if ($users != null)
	  	{
	  		$reports = $repositoryReports -> findBy(array('user' => $users),
	  				array('date' => 'desc')
	  		);
	  		if ($reports != null)
	  		{
	  			return $reports;
	  		}	
	  	}
	  	return "No reports";
	  	
	  }
	  
	  public function deleteReportAction($id)
	  {
	  	$report = $this->getReportAction($id);
	  	$this->remove($report);
	  	return "done";
	  }
	  
	  /*******************************************************************************************************************
	   												Pictures
	  ********************************************************************************************************************/
	  public function postPictureAction()
	  {
	  	$request = $this->get('request');
	  	$content = json_decode($request->getContent());	
	  	$report = $this->getReportAction($content->{'reportId'});
	  	$picture = new Picture();
	  	$picture -> setName($content->{'name'});
	  	$picture -> setData($content->{'data'});
	  	$picture -> setReport($report);

	  	$this->persist($picture);
	  	
	  	return $picture;
	  }
	  
	  
	  public function postPictureArrayAction()
	  {
	  	$request = $this->get('request');
	  	$content = json_decode($request->getContent());
	  	$report = $this->getReportAction($content->{'reportId'});	  
	  	$nbPictures = count($content->{'pictures'});	  	  
	  	for ($i=0; $i < $nbPictures; $i++)
	  	{	  		
		  	$picture = new Picture();
  	 		$picture -> setName($content -> {'pictures'}[$i]->{'name'});
  	 		$picture -> setData($content -> {'pictures'}[$i]->{'data'});
  	 		$picture -> setReport($report);
  	 		$this-> persist($picture);
	  	}	  
	  	return $report;
	  	}
	  
	  	
	  public function getReportPictureAction($id)
	  {
	  	$repositoryPicture = $this->container->get('doctrine')
	  	->getManager()
	  	->getRepository('MobileOneWSservationBundle:Picture');
	  	$report = $this->getReportAction($id); 
	  	$pictures = $repositoryPicture -> findBy(array('report' => $report) 			 
	  	);  	
	  	return $pictures;
	  }
	  
	  
	  public function getPictureAction($id)
	  {
	  	$repository = $this->container->get('doctrine')
	  	->getManager()
	  	->getRepository('MobileOneWSservationBundle:Picture');	  		
	  	$picture = $repository->find($id); 
	  	return $picture;
	  }
	   
	  
	  public function deletePictureAction($id)
	  {
	  	$picture = $this->getPictureAction($id);
	  	$this->remove($picture);
	  	return "done";
	  }
	  

	  /*******************************************************************************************************************
	   													Sounds
	  ********************************************************************************************************************/
	  
	  public function postReportSoundAction($id)
	  {
// 		$uploadDir = 'D:/Projet eclipse/mobileOne/sounds/';
// 		$uploadFile = $uploadDir.basename($_FILES['son']['name']);
		$name = $_FILES['son']['name'];
		$directory = 'D:/Dev/workspace/mobileOne/Companies directory/';
		$companyName = $this->getReportAction($id)->getUser()->getCompany()->getName();
		$companyDirectory = $directory.basename($companyName).'/sounds/';
		$completeName = $companyDirectory.basename($name);
	  	if (!file_exists ($companyDirectory))
			{
				mkdir($companyDirectory);
			}
		
		$realName = $_FILES['son']['name'];
		move_uploaded_file($_FILES['son']['tmp_name'], $completeName);
	  	$report = $this->getReportAction($id);
	  	$sound = new Sound();
	  	$sound->setReport($report);
	  	$sound->setName($_FILES['son']['name']);
	  	$sound->setUrl($completeName);
	  	$this->persist($sound);
	  	return $sound;
// 	  	return $companyDirectory;
	  }
	  public function getSoundAction($id)
	  {
	  	$repository = $this->container->get('doctrine')
	  	->getManager()
	  	->getRepository('MobileOneWSservationBundle:Sound');
	  	$sound = $repository->find($id);
	  	return $sound;
	  	
	  }  
	  
	  public function getReportSoundAction($id)
	  {
	  	$repositorySounds = $this->container->get('doctrine')
	  	->getManager()
	  	->getRepository('MobileOneWSservationBundle:Sound');
	  	$report = $this->getReportAction($id);
	  	$sounds = $repositorySounds -> findBy(array('report' => $report)
	  	);
	  	return $sounds;
	  }
	  
	  
	  public function deleteSoundAction($id)
	  {
	  	$sound = $this->getSoundAction($id);
	  	$this->remove($sound);
	  	return "done";
	  }
	  /**
	   * 
	   * @Secure(roles="ROLE_ADMIN")
	   */
	  public function postAuthAction()
	  {
// 	  	if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
// 	  	{
// 	  		return "Acces limite aux auteurs";
// // 	  		throw new AccessDeniedHttpException('Accès limité aux auteurs');
// 	  	}
	  		
	  	$username = $_SERVER['PHP_AUTH_USER'];
	  	$password = $_SERVER['PHP_AUTH_PW'];
	  	return $username;
	  }
	  
	  public function getTokenAction()
	  {
	  	$security = $this->$container->get('security.context');
	  	$token = $security->getToken();
	  	return $token;
	  	
	  }
	
// 	  $content -> {'pictures'}
	  //ajouter songs, pictures
	  //qsdqsd

}