<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CourseContentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CourseContentsTable Test Case
 */
class CourseContentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CourseContentsTable
     */
    public $CourseContents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CourseContents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CourseContents') ? [] : ['className' => CourseContentsTable::class];
        $this->CourseContents = TableRegistry::getTableLocator()->get('CourseContents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CourseContents);

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
