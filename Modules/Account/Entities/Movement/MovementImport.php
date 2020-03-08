<?php

namespace Modules\Account\Entities\Movement;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Modules\Account\Entities\Movement\Movement;

class MovementImport implements
    ToCollection,
    WithCustomCsvSettings,
    WithHeadingRow,
    WithValidation
{
    /**
     * The Account ID of the imported Movements
     *
     * @var int
     */
    private $accountId;

    /**
     * The ID of the User importing the Movements
     *
     * @var int
     */
    private $creatorId;

    /**
     * Constructor.
     *
     * @param int $accountId
     * @param int $creatorId
     */
    public function __construct(int $accountId, int $creatorId)
    {
        $this->accountId = $accountId;
        $this->creatorId = $creatorId;
    }

    /**
     * @param Collection $rows
     *
     * @return void
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Movement::create([
                'date' => $row['data_da_operacao'],
                'amount' => (float) $row['montante_na_moeda_da_conta'],
                'description' => $row['movimento'],
                'account_id' => $this->accountId,
                'creator_id' => $this->creatorId,
            ]);
        }
    }

    /**
     * The CSV file settings
     *
     * @return array
     */
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    /**
     * The row validation rules
     *
     * @return array
     */
    public function rules(): array
    {
        // TODO: add row validation rules
    }
}
