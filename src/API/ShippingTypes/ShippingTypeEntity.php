<?php

namespace Anteris\Autotask\API\ShippingTypes;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ShippingType entities.
 */
class ShippingTypeEntity extends DataTransferObject
{
    public ?int $billingCodeID;
    public ?string $description;
    public $id;
    public ?bool $isActive;
    public ?string $name;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new ShippingType entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        parent::__construct($array);
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response)
    {
        $responseArray = json_decode($response->getBody(), true);

        if (isset($responseArray['item']) === false) {
            throw new \Exception('Missing item key in response.');
        }

        return new self($responseArray['item']);
    }
}
