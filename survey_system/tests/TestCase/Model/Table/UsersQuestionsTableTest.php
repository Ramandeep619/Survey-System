<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersQuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersQuestionsTable Test Case
 */
class UsersQuestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersQuestionsTable
     */
    public $UsersQuestions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsersQuestions',
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
        $config = TableRegistry::getTableLocator()->exists('UsersQuestions') ? [] : ['className' => UsersQuestionsTable::class];
        $this->UsersQuestions = TableRegistry::getTableLocator()->get('UsersQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersQuestions);

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
