<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OfficersFixture
 */
class OfficersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'username' => 'Lorem ipsum dolor sit a',
                'password' => 'Lorem ipsum dolor sit a',
                'telp' => 'Lorem ipsum d',
                'created' => '2023-11-02 00:20:45',
                'modified' => '2023-11-02 00:20:45',
                'level_id' => 1,
            ],
        ];
        parent::init();
    }
}
