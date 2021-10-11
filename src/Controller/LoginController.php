<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
use Webmozart\Assert\Assert;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class LoginController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    #[Route('/login', name: 'login',methods:['POST'])]
    public function login(Request $request,UserRepository $userRepository): Response
    {
        $userName = $request->get("username");
        $user=$userRepository->findOneBy(["username"=>$userName]);
        $answer=Response::HTTP_OK;
        $this->logger->info($request->getMethod());
        if(!$user){
            $answer=Response::HTTP_NOT_FOUND;
        }else{
            $password = $request->get("password");
            if($password!=$user->getPassword()){
                $answer=Response::HTTP_FORBIDDEN;
            }
        }
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($user, 'json');
        return new Response($jsonContent,$answer,["content-type"=>"application/json"]);
    }

    #[Route('/logout', name: 'logout',methods:['POST'])]
    public function logout(Request $request,UserRepository $userRepository): Response
    {
        $id = $request->get("id");
         $user=$userRepository->find($id);
        $answer=Response::HTTP_OK;
        $this->logger->info($request->getMethod());
        if(!$user){
            $answer=Response::HTTP_NOT_FOUND;
        }
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($user, 'json');
        return new Response($jsonContent,$answer,["content-type"=>"application/json"]);
    }
}
