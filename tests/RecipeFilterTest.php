<?php
// Include necessary files
require_once JPATH_BASE . '/administrator/components/com_web357test/src/Model/RecipesModel.php';

use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;
use Joomla\CMS\Application\CMSApplication;
use Joomla\Database\QueryInterface;
use Webtest\Component\Web357test\Administrator\Model\RecipesModel;

class RecipeFilterTest extends TestCase
{
    protected $model;
    protected $dbMock;
    protected $appMock;

    /**
     * Set up the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Mock the database driver
        $this->dbMock = $this->createMock('Joomla\Database\DatabaseDriver');

        // Mock the application
        $this->appMock = $this->createMock(CMSApplication::class);

        // Mock the QueryInterface (query object)
        $mockQuery = $this->createMock(QueryInterface::class);

        // Mock the select method on the query interface
        $mockQuery->method('select')->willReturnSelf();
        $mockQuery->method('where')->willReturnSelf();

        // Mock __toString method to return a valid SQL string
        $mockQuery->method('__toString')->willReturn("SELECT * FROM #__recipes WHERE a.difficulty = 'hard'");

        // Set up the mock database to return the mock query
        $this->dbMock->method('getQuery')->willReturn($mockQuery);

        // Inject the mock database and application into the Factory
        Factory::$database = $this->dbMock;
        Factory::$application = $this->appMock;

        // Create an instance of the model
        $this->model = new RecipesModel();
    }

    /**
     * Test that the difficulty filter is set correctly.
     *
     * @dataProvider difficultyFilterProvider
     */
    public function testPopulateStateSetsDifficultyFilter($difficulty, $expectedState)
    {
        // Set the state for 'filter.difficulty'
        $this->model->setState('filter.difficulty', $difficulty);
        
        // Get the internal state via reflection
        $reflection = new \ReflectionClass($this->model);
        $stateProperty = $reflection->getProperty('state');
        $stateProperty->setAccessible(true);
        
        // Get the state value and assert it
        $state = $stateProperty->getValue($this->model);
        $this->assertEquals($expectedState, $state['filter.difficulty']);
    }

    /**
     * Test the query generation for difficulty filter.
     */
    public function testGetListQueryFiltersByDifficulty()
    {
        // Use reflection to access the protected method
        $reflection = new \ReflectionClass($this->model);
        $method = $reflection->getMethod('getListQuery');
        $method->setAccessible(true);

        // Invoke the method and capture the query
        $query = $method->invoke($this->model);
        $sql   = (string) $query; // This will convert the query object to string

        // Assert the query contains the expected string (example: WHERE a.difficulty = 'hard')
        $this->assertStringContainsString("WHERE a.difficulty = 'hard'", $sql);
    }

    /**
     * Data provider for difficulty filter tests.
     * Provides different difficulty values and the expected state after setting.
     */
    public static function difficultyFilterProvider()
    {
        return [
            ['easy', 'easy'],
            ['hard', 'hard'],
            ['medium', 'medium'],
        ];
    }
}
