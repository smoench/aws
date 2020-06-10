<?php

namespace AsyncAws\Sns\Input;

use AsyncAws\Core\Exception\InvalidArgument;
use AsyncAws\Core\Input;
use AsyncAws\Core\Request;
use AsyncAws\Core\Stream\StreamFactory;

final class CreatePlatformApplicationInput extends Input
{
    /**
     * Application names must be made up of only uppercase and lowercase ASCII letters, numbers, underscores, hyphens, and
     * periods, and must be between 1 and 256 characters long.
     *
     * @required
     *
     * @var string|null
     */
    private $Name;

    /**
     * The following platforms are supported: ADM (Amazon Device Messaging), APNS (Apple Push Notification Service),
     * APNS_SANDBOX, and FCM (Firebase Cloud Messaging).
     *
     * @required
     *
     * @var string|null
     */
    private $Platform;

    /**
     * For a list of attributes, see SetPlatformApplicationAttributes.
     *
     * @see https://docs.aws.amazon.com/sns/latest/api/API_SetPlatformApplicationAttributes.html
     * @required
     *
     * @var array<string, string>|null
     */
    private $Attributes;

    /**
     * @param array{
     *   Name?: string,
     *   Platform?: string,
     *   Attributes?: array<string, string>,
     *   @region?: string,
     * } $input
     */
    public function __construct(array $input = [])
    {
        $this->Name = $input['Name'] ?? null;
        $this->Platform = $input['Platform'] ?? null;
        $this->Attributes = $input['Attributes'] ?? null;
        parent::__construct($input);
    }

    public static function create($input): self
    {
        return $input instanceof self ? $input : new self($input);
    }

    /**
     * @return array<string, string>
     */
    public function getAttributes(): array
    {
        return $this->Attributes ?? [];
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function getPlatform(): ?string
    {
        return $this->Platform;
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
        $body = http_build_query(['Action' => 'CreatePlatformApplication', 'Version' => '2010-03-31'] + $this->requestBody(), '', '&', \PHP_QUERY_RFC1738);

        // Return the Request
        return new Request('POST', $uriString, $query, $headers, StreamFactory::create($body));
    }

    /**
     * @param array<string, string> $value
     */
    public function setAttributes(array $value): self
    {
        $this->Attributes = $value;

        return $this;
    }

    public function setName(?string $value): self
    {
        $this->Name = $value;

        return $this;
    }

    public function setPlatform(?string $value): self
    {
        $this->Platform = $value;

        return $this;
    }

    private function requestBody(): array
    {
        $payload = [];
        if (null === $v = $this->Name) {
            throw new InvalidArgument(sprintf('Missing parameter "Name" for "%s". The value cannot be null.', __CLASS__));
        }
        $payload['Name'] = $v;
        if (null === $v = $this->Platform) {
            throw new InvalidArgument(sprintf('Missing parameter "Platform" for "%s". The value cannot be null.', __CLASS__));
        }
        $payload['Platform'] = $v;
        if (null === $v = $this->Attributes) {
            throw new InvalidArgument(sprintf('Missing parameter "Attributes" for "%s". The value cannot be null.', __CLASS__));
        }

        $index = 0;
        foreach ($v as $mapKey => $mapValue) {
            ++$index;
            $payload["Attributes.entry.$index.key"] = $mapKey;
            $payload["Attributes.entry.$index.value"] = $mapValue;
        }

        return $payload;
    }
}
