<?php

namespace Go\Zend\Framework\Tests\Integration;

use Go\Core\AspectContainer;
use Go\Core\GoAspectContainer;
use Go\Zend\Framework\Tests\Aspect\TestAspect;
use PHPUnit\Framework\TestCase;
use Zend\Mvc\Application;

/**
 * @package Go\Zend\Framework\Tests\Integration
 */
class ModuleTest extends TestCase
{
    /**
     * @test
     */
    public function itRegistersTestAspectViaConfiguration()
    {
        $configuration = require __DIR__ . '/../resources/application_config.php';
        $application = Application::init($configuration);

        /** @var GoAspectContainer $container */
        $container = $application->getServiceManager()->get(AspectContainer::class);

        $aspect = $container->getAspect(TestAspect::class);

        $this->assertInstanceOf(
            TestAspect::class,
            $aspect,
            'aspect should be instance of registered test aspect class'
        );
    }
}