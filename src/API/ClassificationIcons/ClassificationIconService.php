<?php

namespace Anteris\Autotask\API\ClassificationIcons;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ClassificationIcons.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ClassificationIconsEntity.htm Autotask documentation.
 */
class ClassificationIconService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the ClassificationIcon based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ClassificationIconEntity
    {
        return ClassificationIconEntity::fromResponse(
            $this->client->get("ClassificationIcons/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ClassificationIconQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ClassificationIconQueryBuilder
    {
        return new ClassificationIconQueryBuilder($this->client);
    }

}