<?php
/**
 * Created by PhpStorm.
 * User: mattlody
 * Date: 09/06/2014
 * Time: 21:52
 */

use Applestump\MixpanelBundle\Annotations as Mixpanel;;

class SampleModel {

    /**
     * @Mixpanel\Id()
     */
    public function getId()
    {
        return 1234;
    }

    /**
     * Mixpanel\Property(propertyName="scalar")
     */
    public function getScalar()
    {
        return "Value 1";
    }

    /**
     * Mixpanel\Property(propertyName="simpleArray")
     */
    public function getSimpleArray()
    {
        $array = array("value 1", "value 2", "value 3");

        return $array;
    }

    /**
     * Mixpanel\Property(propertyName="dictionary")
     */
    public function getDictionary()
    {
        $dict = array(
            array("key1", "value 1"),
            array("key2", "value 2"),
            array("key3", "value 3")
        );

        return $dict;
    }

} 