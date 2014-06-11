<?php
/**
 * Created by PhpStorm.
 * User: mattlody
 * Date: 09/06/2014
 * Time: 21:16
 */

namespace Applestump\MixpanelBundle\Services;
use Doctrine\Common\Annotations\AnnotationReader;

class Reader {

    private $reader;
    private $userObject;
    private $propertyClass = 'Applestump\\MixpanelBundle\\Annotations\\Property';
    private $idClass = 'Applestump\\MixpanelBundle\\Annotations\\Id';

    /**
     * @param Doctrine\Common\Annotations\Reade $reader
     */
    public function __construct(AnnotationReader $reader = null)
    {
        if(is_null($reader))
        {
            $reader = new AnnotationReader();
        }

        $this->reader = $reader;
    }

    /**
     * @param $userObject The user object (annotated appropriately).
     */
    public function setUserObject($userObject)
    {
        $this->userObject = $userObject;
        $reflectionObject = new \ReflectionObject($this->userObject);
        $this->userEntityMethods = $reflectionObject->getMethods();
    }

    /**
     * @return array Returns an array of key => values of the mixpanel properties.
     */
    public function getProperties($user)
    {
        $this->setUserObject($user);

        $properties = array();

        foreach ($this->userEntityMethods as $userEntityMethod) {

            $annotation = $this->reader->getMethodAnnotation($userEntityMethod, $this->propertyClass);

            if (null !== $annotation) {

                $propertyName = $annotation->getName();

                // retrieve the value for the property, by making a call to the method
                $value = $userEntityMethod->invoke($this->userObject);

                $properties[$propertyName] = $value;
            }
        }

        return $properties;
    }

    /**
     * @return mixed The unique identifier for this user.
     */
    public function getId($user)
    {
        $this->setUserObject($user);

        $id = null;

        foreach ($this->userEntityMethods as $reflectionMethod) {
            // fetch the @Id annotation from the annotation reader
            $annotation = $this->reader->getMethodAnnotation($reflectionMethod, $this->idClass);
            if (null !== $annotation) {

                // retrieve the value for the id, by making a call to the method
                return $reflectionMethod->invoke($this->userObject);

            }
        }

    }


} 