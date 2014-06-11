<?php
/**
 * Created by PhpStorm.
 * User: mattlody
 * Date: 09/06/2014
 * Time: 22:00
 */

namespace Applestump\MixpanelBundle\Tests\Annotations;

use Applestump\MixpanelBundle\Tests\Annotations\Model\SampleModel;
use Applestump\MixpanelBundle\Services\Reader;
use Doctrine\Common\Annotations\AnnotationReader;

class ReaderTest extends \PHPUnit_Framework_TestCase
{
    public function testId()
    {
        // assert that the id is read correctly
        $this->assertEquals(1234, $this->getUserReader()->getId(new SampleModel()));
    }

    public function testScalar()
    {
        //assert that the 'scalar' property == "Value 1"
        $properties = $this->getUserReader()->getProperties(new SampleModel());

        $this->assertEquals("Value 1", $properties['scalar']);
    }

    private function getUserReader()
    {
        $annotationReader = new AnnotationReader();
        $userReader = new Reader($annotationReader);

        return $userReader;
    }
}