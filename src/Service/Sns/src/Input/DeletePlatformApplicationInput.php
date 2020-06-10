<?php

namespace AsyncAws\Sns\Input;

use AsyncAws\Core\Exception\InvalidArgument;
use AsyncAws\Core\Input;
use AsyncAws\Core\Request;
use AsyncAws\Core\Stream\StreamFactory;

final class DeletePlatformApplicationInput extends Input
{
    /**
     * PlatformApplicationArn of platform application object to delete.
     *
     * @required
     *
     * @var string|null
     */
    private $PlatformApplicationArn;

    /**
     * @param array{
     *   PlatformApplicationArn?: string,
     *   @region?: string,
     * } $input
     */
    public function __construct(array $input = [])
    {
        $this->PlatformApplicationArn = $input['PlatformApplicationArn'] ?? null;
        parent::__construct($input);
    }

    public static function create($input): self
    {
        return $input instanceof self ? $input : new self($input);
    }

    public function getPlatformApplicationArn(): ?string
    {
        return $this->PlatformApplicationArn;
    }

    /**
     * @internal
     */
    public function request(): Request
    {
        // Prepare headers
        $headers = ['content-type' => 'application/x-www-form-urlencoded'];

        // Prepare query
        $query = [];

        // Prepare URI
        $uriString = '/';

        // Prepare Body
        $body = http_build_query(['Action' => 'DeletePlatformApplication', 'Version' => '2010-03-31'] + $this->requestBody(), '', '&', \PHP_QUERY_RFC1738);

        // Return the Request
        return new Request('POST', $uriString, $query, $headers, StreamFactory::create($body));
    }

    public function setPlatformApplicationArn(?string $value): self
    {
        $this->PlatformApplicationArn = $value;

        return $this;
    }

    private function requestBody(): array
    {
        $payload = [];
        if (null === $v = $this->PlatformApplicationArn) {
            throw new InvalidArgument(sprintf('Missing parameter "PlatformApplicationArn" for "%s". The value cannot be null.', __CLASS__));
        }
        $payload['PlatformApplicationArn'] = $v;

        return $payload;
    }
}
