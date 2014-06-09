<?php
/**
 * Created by PhpStorm.
 * User: mattlody
 * Date: 09/06/2014
 * Time: 22:00
 */

namespace Applestump\MixpanelBundle\Tests\Annotations;

use Applestump\MixpanelBundle\Tests\Annotations\Model\SampleModel;
use Applestump\MixpanelBundle\Annotations\Reader;
use Doctrine\Common\Annotations\AnnotationReader;

class ReaderTest extends \PHPUnit_Framework_TestCase
{
    public function testId()
    {
        $annotationReader = new AnnotationReader();
        $userReader = new Reader($annotationReader);
        $userReader->setUserObject(new SampleModel());

        // assert that the id is read correctly
        $this->assertEquals(1234, $userReader->getId());
    }
}