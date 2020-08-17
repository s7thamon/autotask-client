<?php

namespace Anteris\Autotask\API\TicketHistory;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents TicketHistory entities.
 */
class TicketHistoryEntity extends DataTransferObject
{
    public string $action;
    public Carbon $date;
    public string $detail;
    public int $id;
    public int $resourceID;
    public int $ticketID;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['date'] = new Carbon($array['date']);
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