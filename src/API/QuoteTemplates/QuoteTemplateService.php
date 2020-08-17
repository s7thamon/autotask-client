<?php

namespace Anteris\Autotask\API\QuoteTemplates;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask QuoteTemplates.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/QuoteTemplatesEntity.htm Autotask documentation.
 */
class QuoteTemplateService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the QuoteTemplate based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): QuoteTemplateEntity
    {
        return QuoteTemplateEntity::fromResponse(
            $this->client->get("QuoteTemplates/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see QuoteTemplateQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): QuoteTemplateQueryBuilder
    {
        return new QuoteTemplateQueryBuilder($this->client);
    }

}