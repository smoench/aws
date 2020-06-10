<?php

namespace AsyncAws\Sns\Tests\Unit\Input;

use AsyncAws\Core\Test\TestCase;
use AsyncAws\Sns\Input\DeletePlatformApplicationInput;

class DeletePlatformApplicationInputTest extends TestCase
{
    public function testRequest(): void
    {
        self::fail('Not implemented');

        $input = new DeletePlatformApplicationInput([
            'PlatformApplicationArn' => 'change me',
        ]);

        // see https://docs.aws.amazon.com/sns/latest/APIReference/API_DeletePlatformApplication.html
        $expected = '
    POST / HTTP/1.0
    Content-Type: application/x-www-form-urlencoded

    Action=DeletePlatformApplication
    &Version=2010-03-31
        ';

        self::assertRequestEqualsHttpRequest($expected, $input->request());
    }
}
