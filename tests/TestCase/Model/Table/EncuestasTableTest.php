<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EncuestasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EncuestasTable Test Case
 */
class EncuestasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EncuestasTable
     */
    protected $Encuestas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Encuestas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Encuestas') ? [] : ['className' => EncuestasTable::class];
        $this->Encuestas = $this->getTableLocator()->get('Encuestas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Encuestas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EncuestasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
