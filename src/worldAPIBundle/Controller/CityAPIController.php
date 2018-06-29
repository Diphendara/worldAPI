<?php

namespace worldAPIBundle\Controller;

use worldAPIBundle\Entity\City;
use worldAPIBundle\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


/**
 * City controller.
 *
 * @Route("/api/city")
 */
class CityAPIController extends Controller
{
    /**
     * JSON Index
     * @Route("/", name="cities")
     * @Method("GET")
     */
    public function jsonIndexAction(){
        #Buscas en la bbdd
        $repository = $this->getDoctrine()->getRepository('worldAPIBundle:City');
        $cities = $repository->findAll(); 
  
        #Devuelve la respuesta
        return self::makeJSONResponse($cities); #Importante el self
      }
    
    /**
     * Finds and displays a city entity.
     *
     * @Route("/{id}", name="city_show_json")
     * @Method("GET")
     */
    public function jsonShowAction($id = 1){
        $repository = $this->getDoctrine()->getRepository('worldAPIBundle:City');
        $city = $repository->findById($id);

        return self::makeJSONResponse($city);
    }
    /**
     * Creates a new city entity.
     *
     * @Route("/new", name="city_new_json")
     * @Method("POST")
     */
    public function jsonNewAction(Request $request)
    {
        $content = $request->getContent();

        #Transform json to city without countrycode
        $city = self::createSerializerIgnoredAttributes(array('CountryCode'))->deserialize($content, City::class, 'json');        

        $arrayContent  = json_decode($content, true); #Pasar a Array el string que te envian por post
        $jsonCountryCode = json_encode($arrayContent['CountryCode']); #Convertir A json EL ARRAY del CountryCode

        $jsonCountry = self::createSerializer()->deserialize($jsonCountryCode, Country::class, 'json'); #Pasar de JSON a objeto COUNTRY   

        $repository = $this->getDoctrine()->getRepository('worldAPIBundle:Country');
        $country =  $repository->findOneByCode2($jsonCountry->getCode2());#Buscar el OBJETO de la base de datos, para usarlo más adelante
            
        $city->setCountryCode($country);
        $em = $this->getDoctrine()->getManager();
        $em->persist($city);
        $em->flush();
        
        return self::makeJSONResponse($city);
    }

    /**
     * @Route("/countrycode/{code}", name="countrycode_cities")
     * @Method("GET")
     */
    #Las variables por argumento se ponen SIN el dolar
    public function countrycodeAction($code = null){
        #Buscas en la bbdd
        $repository = $this->getDoctrine()->getRepository('worldAPIBundle:City');
        $cities = $repository->findBy(array('countrycode' => $code)); #Se le pasa una array, en plan 'WHERE' con todos los campos que se quieran filtrar
        #Devuelve la respuesta
        return self::makeJSONResponse($cities); #Importante el self
    }

    #### Auxiliar functions ####

    private function makeJSONResponse($data){ #import linea 11
        $jsonContent = self::createSerializer()->serialize($data, 'json'); #Serializas la serializacion

        #Crea la respuesta
        $response = new Response();
        $response->setContent($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    private function createSerializer(){ #imports lineas 7-10, y instalar con lo de composer el serialice
        $encoder = array(new JsonEncoder());
        $normalizer = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizer, $encoder);

        return $serializer;
    }
    
    private function createSerializerIgnoredAttributes($attributesToIgnore){ #imports lineas 7-10, y instalar con lo de composer el serialice
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes($attributesToIgnore);
        $encoder = new JsonEncoder();        
        $serializer = new Serializer(array($normalizer), array($encoder));

        return $serializer;
    }
}
