<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoft\Aop\Bootstrap\Boots;

use Swoft\Aop\Bean\Annotation;
use Swoft\Aop\Bean\Collector;
use Swoft\Aop\Bean\Parser;
use Swoft\Aop\Bean\Wrapper;
use Swoft\Aop\Proxy;
use Swoft\Bean\Annotation\Bootstrap;
use Swoft\Bootstrap\Boots\Bootable;

/**
 * Namespace compatibility with previous versions, which non-componentization version
 * @Bootstrap(order=1)
 */
class CompPreviousVersionNamespace implements Bootable
{
    /**
     * @return void
     */
    public function bootstrap()
    {
        $map = [
            Proxy\Proxy::class                  => 'Swoft\Proxy\Proxy',
            Wrapper\AspectWrapper::class        => 'Swoft\Bean\Wrapper',
            Parser\AfterParser::class           => 'Swoft\Bean\Parser\AfterParser',
            Parser\AfterReturningParser::class  => 'Swoft\Bean\Parser\AfterReturningParser',
            Parser\AfterThrowingParser::class   => 'Swoft\Bean\Parser\AfterThrowingParser',
            Parser\AroundParser::class          => 'Swoft\Bean\Parser\AroundParser',
            Parser\AspectParser::class          => 'Swoft\Bean\Parser\AspectParser',
            Parser\BeforeParser::class          => 'Swoft\Bean\Parser\BeforeParser',
            Parser\PointAnnotationParser::class => 'Swoft\Bean\Parser\PointAnnotationParser',
            Parser\PointBeanParser::class       => 'Swoft\Bean\Parser\PointBeanParser',
            Parser\PointExecutionParser::class  => 'Swoft\Bean\Parser\PointExecutionParser',
            Collector\AspectCollector::class    => 'Swoft\Bean\Collector\AspectCollector',
            Annotation\After::class             => 'Swoft\Bean\Parser\After',
            Annotation\AfterReturning::class    => 'Swoft\Bean\Parser\AfterReturning',
            Annotation\AfterThrowing::class     => 'Swoft\Bean\Parser\AfterThrowing',
            Annotation\Around::class            => 'Swoft\Bean\Parser\Around',
            Annotation\Aspect::class            => 'Swoft\Bean\Parser\Aspect',
            Annotation\Before::class            => 'Swoft\Bean\Parser\Before',
            Annotation\PointAnnotation::class   => 'Swoft\Bean\Parser\PointAnnotation',
            Annotation\PointBean::class         => 'Swoft\Bean\Parser\PointBean',
            Annotation\PointExecution::class    => 'Swoft\Bean\Parser\PointExecution',
        ];
        foreach ($map as $original => $alias) {
            \class_alias($original, $alias, true);
        }
    }
}
