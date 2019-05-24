<?php
/**
 * @link https://github.com/ixocreate
 * @copyright IXOLIT GmbH
 * @license MIT License
 */

declare(strict_types=1);

namespace Ixocreate\Test\Asset;

use Ixocreate\Asset\Asset;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Asset\Packages;

/**
 * @covers \Ixocreate\Asset\Asset
 */
class AssetTest extends TestCase
{
    public function testGetUrl()
    {
        $stub = $this->createMock(Packages::class);


        $stub->method('getUrl')
            ->willReturnCallback(function ($path) {
                return 'https://phpunit.de/manual/6.5' . $path;
            });


        $asset = new Asset($stub);

        $mitSlash = $asset->getUrl('/trsttstt');
        $ohneSlash = $asset->getUrl('trsttstt');
        $this->assertSame('https://phpunit.de/manual/6.5/trsttstt', $mitSlash);
        $this->assertSame('https://phpunit.de/manual/6.5/trsttstt', $ohneSlash);
    }
}
