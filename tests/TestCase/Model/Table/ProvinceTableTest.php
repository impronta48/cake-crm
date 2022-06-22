<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProvinceTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProvinceTable Test Case
 */
class ProvinceTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProvinceTable
     */
    protected $Province;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Province',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Province') ? [] : ['className' => ProvinceTable::class];
        $this->Province = $this->getTableLocator()->get('Province', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Province);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProvinceTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
