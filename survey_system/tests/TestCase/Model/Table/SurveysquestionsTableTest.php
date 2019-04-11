<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SurveysquestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SurveysquestionsTable Test Case
 */
class SurveysquestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SurveysquestionsTable
     */
    public $Surveysquestions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Surveysquestions',
        'app.Surveys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Surveysquestions') ? [] : ['className' => SurveysquestionsTable::class];
        $this->Surveysquestions = TableRegistry::getTableLocator()->get('Surveysquestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Surveysquestions);

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
