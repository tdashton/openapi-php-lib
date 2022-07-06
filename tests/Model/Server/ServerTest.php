<?php

namespace Finderly\OpenapiPhpLib\Model\Server;

use PHPUnit\Framework\TestCase;

class ServerTest extends TestCase
{
    public function testServerObjectWithNoVariables(): void
    {
        $server = new Server();
        $description = 'description xx';
        $url = 'http://someurl.com';

        $server->setDescription($description);
        $this->assertEquals($description, $server->getDescription());
        $server->setUrl($url);
        $this->assertEquals($url, $server->getUrl());
        $this->assertEmpty($server->getVariables());

        $this->assertEquals(
            ['description' => $description, 'url' => $url],
            $server->toArray()
        );
    }

    public function testServerObjectWithVariable(): void
    {
        $server = new Server();
        $description = 'description yy';
        $url = 'http://someurlyy.com';

        $server->setDescription($description);
        $this->assertEquals($description, $server->getDescription());
        $server->setUrl($url);
        $this->assertEquals($url, $server->getUrl());

        $server->addVariable(
            'testVar',
            (new Variable())->setDescription('descript')->setDefault('def')
        );

        $server->addVariable(
            'testVarEnum',
            (new Variable())->setEnum(['allow1', 'allow2'])->setDescription('descriptEnum')->setDefault('def')
        );

        $this->assertNotEmpty($server->getVariables());

        $this->assertEquals(
            [
                'description' => $description,
                'url' => $url,
                'variables' => [
                    'testVar' => ['description' => 'descript', 'default' => 'def'],
                    'testVarEnum' => ['description' => 'descriptEnum', 'default' => 'def', 'enum' => ['allow1', 'allow2']]
                ],
            ],
            $server->toArray()
        );
    }
}
