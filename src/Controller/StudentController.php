<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\StudentRepository;
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

class StudentController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    #[Route('/student/user/{id}', name: 'user',methods:['GET'])]
    public function login(Request $request,StudentRepository $studentRepository,User $user): Response
    {
        $student=$studentRepository->findOneBy(["user"=>$user]);
        $answer=Response::HTTP_OK;
        $this->logger->info($request->getMethod());
        if(!$student){
            $answer=Response::HTTP_NOT_FOUND;
        }
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($student, 'json');
        return new Response($jsonContent,$answer,["content-type"=>"application/json"]);
    }
}
