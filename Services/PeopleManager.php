<?php
/**
 * Created by PhpStorm.
 * User: mattlody
 * Date: 09/06/2014
 * Time: 20:40
 */

namespace Applestump\MixpanelBundle\Services;
use Doctrine\Common\Annotations\AnnotationReader;


class PeopleManager {


    protected $instance;

    public function __construct(MixPanel $mixPanel)
    {
        $this->instance = $mixPanel;
        $this->annotationReader = new AnnotationReader();
    }

    /**
     * @param $user
     */
    public function register($user)
    {
        //Get the values for the user from the annotation reader
        //Property Annotations
        $reflectionProperty = new ReflectionProperty('AnnotationDemo', 'property');
        $propertyAnnotations = $annotationReader->getPropertyAnnotations($reflectionProperty);

        echo "========= PROPERTY ANNOTATIONS =========" . PHP_EOL;
        var_dump($propertyAnnotations);
    }

} 