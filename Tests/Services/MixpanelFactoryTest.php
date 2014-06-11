<?php
/**
 * Created by PhpStorm.
 * User: mattlody
 * Date: 09/06/2014
 * Time: 22:00
 */

namespace Applestump\MixpanelBundle\Tests\Annotations;

use Applestump\MixpanelBundle\Services\MixpanelFactory;
use Doctrine\Common\Annotations\AnnotationReader;

class MixpanelFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        //create the factory
        $factory = new MixpanelFactory('123');

        $mp = $factory->get();
        $mp->track('Login clicked!');
        // assert that an instance of MixPanel is returned by the factory
        $this->assertInstanceOf('MixPanel', $factory->get());
    }

}