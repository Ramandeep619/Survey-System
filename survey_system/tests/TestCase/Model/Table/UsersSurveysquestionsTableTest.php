<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersSurveysquestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersSurveysquestionsTable Test Case
 */
class UsersSurveysquestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersSurveysquestionsTable
     */
    public $UsersSurveysquestions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsersSurveysquestions',
        'app.Users',
        'app.Questions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsersSurveysquestions') ? [] : ['className' => UsersSurveysquestionsTable::class];
        $this->UsersSurveysquestions = TableRegistry::getTableLocator()->get('UsersSurveysquestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersSurveysquestions);

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
