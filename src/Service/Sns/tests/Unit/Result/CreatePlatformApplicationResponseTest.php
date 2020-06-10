<?php

namespace AsyncAws\Sns\Tests\Unit\Result;

use AsyncAws\Core\Response;
use AsyncAws\Core\Test\Http\SimpleMockedResponse;
use AsyncAws\Core\Test\TestCase;
use AsyncAws\Sns\Result\CreatePlatformApplicationResponse;
use Psr\Log\NullLogger;
use Symfony\Component\HttpClient\MockHttpClient;

class CreatePlatformApplicationResponseTest extends TestCase
{
    public function testCreatePlatformApplicationResponse(): void
    {
        self::fail('Not implemented');

        // see https://docs.aws.amazon.com/sns/latest/APIReference/API_CreatePlatformApplication.html
        $response = new SimpleMockedResponse('<change>it</change>');

        $client = new MockHttpClient($response);
        $result = new CreatePlatformApplicationResponse(new Response($client->request('POST', 'http://localhost'), $client, new NullLogger()));

        self::assertSame('changeIt', $result->getPlatformApplicationArn());
    }
}
