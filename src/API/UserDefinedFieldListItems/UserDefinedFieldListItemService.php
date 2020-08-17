<?php

namespace Anteris\Autotask\API\UserDefinedFieldListItems;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask UserDefinedFieldListItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/UserDefinedFieldListItemsEntity.htm Autotask documentation.
 */
class UserDefinedFieldListItemService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new userdefinedfieldlistitem.
     *
     * @param  UserDefinedFieldListItemEntity  $resource  The userdefinedfieldlistitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(UserDefinedFieldListItemEntity $resource)
    {
        $this->client->post("UserDefinedFieldListItems", $resource->toArray());
    }


    /**
     * Finds the UserDefinedFieldListItem based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): UserDefinedFieldListItemEntity
    {
        return UserDefinedFieldListItemEntity::fromResponse(
            $this->client->get("UserDefinedFieldListItems/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see UserDefinedFieldListItemQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): UserDefinedFieldListItemQueryBuilder
    {
        return new UserDefinedFieldListItemQueryBuilder($this->client);
    }

    /**
     * Updates the userdefinedfieldlistitem.
     *
     * @param  UserDefinedFieldListItemEntity  $resource  The userdefinedfieldlistitem entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(UserDefinedFieldListItemEntity $resource): void
    {
        $this->client->put("UserDefinedFieldListItems/$resource->id", $resource->toArray());
    }
}