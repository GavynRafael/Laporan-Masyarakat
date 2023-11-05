<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CitizensTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CitizensTable Test Case
 */
class CitizensTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CitizensTable
     */
    protected $Citizens;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Citizens',
        'app.Levels',
        'app.Reports',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Citizens') ? [] : ['className' => CitizensTable::class];
        $this->Citizens = $this->getTableLocator()->get('Citizens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Citizens);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CitizensTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CitizensTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
