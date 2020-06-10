<?php

namespace AsyncAws\Sns\Result;

use AsyncAws\Core\Response;
use AsyncAws\Core\Result;

class CreatePlatformApplicationResponse extends Result
{
    /**
     * PlatformApplicationArn is returned.
     */
    private $PlatformApplicationArn;

    public function getPlatformApplicationArn(): ?string
    {
        $this->initialize();

        return $this->PlatformApplicationArn;
    }

    protected function populateResult(Response $response): void
    {
        $data = new \SimpleXMLElement($response->getContent());
        $data = $data->CreatePlatformApplicationResult;

        $this->PlatformApplicationArn = ($v = $data->PlatformApplicationArn) ? (string) $v : null;
    }
}
