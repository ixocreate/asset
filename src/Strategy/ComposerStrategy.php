<?php
declare(strict_types=1);

namespace Ixocreate\Asset\Strategy;

use PackageVersions\Versions;

final class ComposerStrategy implements StrategyInterface
{
    /**
     * @var string
     */
    private $version;

    /**
     * ComposerVersionStrategy constructor.
     * @param int $length
     */
    public function __construct(int $length)
    {
        if ($length > 40) {
            throw new \InvalidArgumentException("Length can't be greater than 40 in ". ComposerVersionStrategy::class);
        }

        if ($length < 3) {
            throw new \InvalidArgumentException("Length must be 3 or greater");
        }

        $this->version = Versions::getVersion(Versions::ROOT_PACKAGE_NAME);
        if (\mb_strpos($this->version, '@') !== false) {
            $this->version = \mb_substr($this->version, \mb_strpos($this->version, '@') + 1);
        }

        $this->version = \mb_substr($this->version, 0, $length);


    }

    /**
     * @return string
     */
    public function version(): string
    {
        return $this->version;
    }
}