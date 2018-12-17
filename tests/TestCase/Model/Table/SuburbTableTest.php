<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SuburbTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SuburbTable Test Case
 */
class SuburbTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SuburbTable
     */
    public $Suburb;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.suburb',
        'app.suburb_configuration',
        'app.statuses',
        'app.amenities',
        'app.files',
        'app.handylinks',
        'app.news',
        'app.payments_notifications_queue',
        'app.phonebook',
        'app.requests',
        'app.streets',
        'app.surveys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Suburb') ? [] : ['className' => SuburbTable::class];
        $this->Suburb = TableRegistry::get('Suburb', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Suburb);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
