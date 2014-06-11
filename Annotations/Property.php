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

    private $name;

    public function __construct(array $values)
    {

        if (isset($values['name'])) {
            $this->name = $values['name'];
        }
        else{
            throw new \InvalidArgumentException('The Mixpanel Property annotation must specify the name parameter');
        }

    }

    public function getName()
    {
        return $this->name;
    }

} 