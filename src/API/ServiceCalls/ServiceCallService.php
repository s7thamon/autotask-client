<?php

namespace Anteris\Autotask\API\ServiceCalls;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ServiceCalls.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ServiceCallsEntity.htm Autotask documentation.
 */
class ServiceCallService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new servicecall.
     *
     * @param  ServiceCallEntity  $resource  The servicecall entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ServiceCallEntity $resource)
    {
        $this->client->post("ServiceCalls", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ServiceCall to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ServiceCalls/$id");
    }

    /**
     * Finds the ServiceCall based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ServiceCallEntity
    {
        return ServiceCallEntity::fromResponse(
            $this->client->get("ServiceCalls/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ServiceCallQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ServiceCallQueryBuilder
    {
        return new ServiceCallQueryBuilder($this->client);
    }

    /**
     * Updates the servicecall.
     *
     * @param  ServiceCallEntity  $resource  The servicecall entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ServiceCallEntity $resource): void
    {
        $this->client->put("ServiceCalls/$resource->id", $resource->toArray());
    }
}