<?php

namespace Anteris\Autotask\API\OpportunityAttachments;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of OpportunityAttachment entities.
 * @see OpportunityAttachmentEntity
 */
class OpportunityAttachmentCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): OpportunityAttachmentEntity
    {
        return parent::current();
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response): OpportunityAttachmentCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            OpportunityAttachmentEntity::arrayOf($array['items'])
        );
    }
}