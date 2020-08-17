<?php

namespace Anteris\Autotask\API\OrganizationalLevel1s;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask OrganizationalLevel1s.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/OrganizationalLevel1sEntity.htm Autotask documentation.
 */
class OrganizationalLevel1Service
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new organizationallevel1.
     *
     * @param  OrganizationalLevel1Entity  $resource  The organizationallevel1 entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(OrganizationalLevel1Entity $resource)
    {
        $this->client->post("OrganizationalLevel1s", $resource->toArray());
    }


    /**
     * Finds the OrganizationalLevel1 based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): OrganizationalLevel1Entity
    {
        return OrganizationalLevel1Entity::fromResponse(
            $this->client->get("OrganizationalLevel1s/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see OrganizationalLevel1QueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): OrganizationalLevel1QueryBuilder
    {
        return new OrganizationalLevel1QueryBuilder($this->client);
    }

    /**
     * Updates the organizationallevel1.
     *
     * @param  OrganizationalLevel1Entity  $resource  The organizationallevel1 entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(OrganizationalLevel1Entity $resource): void
    {
        $this->client->put("OrganizationalLevel1s/$resource->id", $resource->toArray());
    }
}