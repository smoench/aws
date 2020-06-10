<?php

namespace AsyncAws\Sns\Tests\Unit\Input;

use AsyncAws\Core\Test\TestCase;
use AsyncAws\Sns\Input\CreatePlatformApplicationInput;

class CreatePlatformApplicationInputTest extends TestCase
{
    public function testRequest(): void
    {
        self::fail('Not implemented');

        $input = new CreatePlatformApplicationInput([
            'Name' => 'change me',
            'Platform' => 'change me',
            'Attributes' => ['change me' => 'change me'],
        ]);

        // see https://docs.aws.amazon.com/sns/latest/APIReference/API_CreatePlatformApplication.html
        $expected = '
    POST / HTTP/1.0
    Content-Type: application/x-www-form-urlencoded

    Action=CreatePlatformApplication
    &Version=2010-03-31
        ';

        self::assertRequestEqualsHttpRequest($expected, $input->request());
    }
}
