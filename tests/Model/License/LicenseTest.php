<?php

namespace Finderly\OpenapiPhpLib\Model\License;

use PHPUnit\Framework\TestCase;

class LicenseTest extends TestCase
{
    public function testLicense(): void
    {
        $license = new License();
        $name = 'nameex';
        $identifier = 'identifierex';
        $url = 'http://url.com';

        $license
            ->setUrl($url)
            ->setIdentifier($identifier)
            ->setName($name);

        $this->assertEquals(
            [
                'name' => $name,
                'identifier' => $identifier,
                'url' => $url,
            ],
            $license->toArray()
        );
    }
}
