<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\StudentRepository;
use App\Repository\SubjectRepository;
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

class CardController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    #[Route('/cards/getSubjectsAndTags', name: 'getSubjectsAndTags',methods:['GET'])]
    public function getSubjectsAndTags(Request $request,SubjectRepository $subjectRepository): Response
    {
        $subjects=$subjectRepository->findAll();
        $answer=Response::HTTP_OK;
        $this->logger->info($request->getMethod());
        $menus=[];
        if(!$subjects){
            //$answer=Response::HTTP_NOT_FOUND;
        }else{
            foreach ($subjects as $subject){
                $menu=["subject"=>$subject->getName(),'tags'=>[]];
                foreach ($subject->getClassrooms() as $classroom ){
                    foreach ($classroom->getCards() as $card ){
                        $tags=explode("_",$card->getTags());
                        foreach ($tags as $tag ){
                            if(!in_array($tag,$menu['tags'])){
                                array_push($menu['tags'],$card->getTags());
                            }
                        }
                    }
                }
                $createMenu=["name"=>$menu['subject'],"url"=>$menu['subject'],"submenu"=>[]];
                foreach ($menu['tags'] as $tag){
                    array_push($createMenu["submenu"],["name"=>$tag,"url"=>'F_cards/listByTag/'.$menu['subject'].'/'.$tag]);
                }
                array_push($menus,$createMenu);
            }
        }
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($menus, 'json');
        //$jsonContent = $serializer->serialize($menu, 'json');
        return new Response($jsonContent,$answer,["content-type"=>"application/json"]);
    }
    #[Route('/cards/getAllBySubjectAndTag', name: 'getAllBySubjectAndTag',methods:['POST'])]
    public function getAllBySubjectAndTag(Request $request,SubjectRepository $subjectRepository): Response
    {
        $subject = $request->get("subject");
        $tag = $request->get("tag");
        $foundSubject=$subjectRepository->findOneBy(["name"=>$subject]);
        $answer=Response::HTTP_OK;
        $this->logger->info($request->getMethod());
        $foundCards=[];
        if(!$foundSubject){
            $answer=Response::HTTP_NOT_FOUND;
        }else{
            foreach ($foundSubject->getClassrooms() as $classroom){
                foreach ($classroom->getCards() as $cards){
                    $tags=explode("_",$cards->getTags());
                    if(in_array($tag,$tags)){
                        array_push($foundCards,$cards);
                    }
                }
            }

        }
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($foundCards, 'json');
        return new Response($jsonContent,$answer,["content-type"=>"application/json"]);
    }
}
