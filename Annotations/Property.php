<?php
/**
 * Created by PhpStorm.
 * User: mattlody
 * Date: 09/06/2014
 * Time: 21:01
 */

namespace Applestump\MixpanelBundle\Annotations;
use Doctrine\Common\Annotations\Annotation;


/**
 * @Annotation
 */
final class Property
{
    private $propertyName;

    public function __construct($options)
    {
        if (isset($options['value'])) {
            $options['propertyName'] = $options['value'];
            unset($options['value']);
        }

        foreach ($options as $key => $value) {
            if (!property_exists($this, $key)) {
                throw new \InvalidArgumentException(sprintf('Property "%s" does not exist', $key));
            }

            $this->$key = $value;
        }
    }

    public function getPropertyName()
    {
        return $this->propertyName;
    }

} 