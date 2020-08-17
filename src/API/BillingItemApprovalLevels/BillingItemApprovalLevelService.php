<?php

namespace Anteris\Autotask\API\BillingItemApprovalLevels;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask BillingItemApprovalLevels.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/BillingItemApprovalLevelsEntity.htm Autotask documentation.
 */
class BillingItemApprovalLevelService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new billingitemapprovallevel.
     *
     * @param  BillingItemApprovalLevelEntity  $resource  The billingitemapprovallevel entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(BillingItemApprovalLevelEntity $resource)
    {
        $this->client->post("BillingItemApprovalLevels", $resource->toArray());
    }


    /**
     * Finds the BillingItemApprovalLevel based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): BillingItemApprovalLevelEntity
    {
        return BillingItemApprovalLevelEntity::fromResponse(
            $this->client->get("BillingItemApprovalLevels/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see BillingItemApprovalLevelQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): BillingItemApprovalLevelQueryBuilder
    {
        return new BillingItemApprovalLevelQueryBuilder($this->client);
    }

}