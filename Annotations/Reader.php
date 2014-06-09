<?php
/**
 * Created by PhpStorm.
 * User: mattlody
 * Date: 09/06/2014
 * Time: 21:16
 */

namespace Applestump\MixpanelBundle\Annotations;
use Doctrine\Common\Annotations\Reader as AnnotationReader;

class Reader {

    private $reader;
    private $userObject;
    private $annotationClass = 'Applestump\\MixpanelBundle\\Annotations\\Property';
    private $idClass = 'Applestump\\MixpanelBundle\\Annotations\\Id';

    /**
     * @param Doctrine\Common\Annotations\Reade $reader
     */
    public function __construct(AnnotationReader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @param $userObject The user object (annotated appropriately).
     */
    public function setUserObject($userObject)
    {
        $this->userObject = $userObject;
    }

    /**
     * @return array Returns an array of key => values of the mixpanel properties.
     */
    public function getMethodProperties()
    {
        $properties = array();

        $reflectionObject = new \ReflectionObject($this->userObject);

        foreach ($reflectionObject->getMethods() as $reflectionMethod) {
            // fetch the @Property annotation from the annotation reader
            $annotation = $this->reader->getMethodAnnotation($reflectionMethod, $this->annotationClass);
            if (null !== $annotation) {
                $propertyName = $annotation->getPropertyName();

                // retrieve the value for the property, by making a call to the method
                $value = $reflectionMethod->invoke($this->userObject);

                $param = array('$propertyName'=>$value);
                $properies[] = $param;
            }
        }

        return $properties;
    }

    /**
     * @return mixed The unique identifier for this user.
     */
    public function getId()
    {
        $id = null;

        $reflectionObject = new \ReflectionObject($this->userObject);

        foreach ($reflectionObject->getMethods() as $reflectionMethod) {
            // fetch the @Id annotation from the annotation reader
            $annotation = $this->reader->getMethodAnnotation($reflectionMethod, $this->idClass);
            if (null !== $annotation) {

                // retrieve the value for the id, by making a call to the method
                return $reflectionMethod->invoke($this->userObject);

            }
        }

    }

} 