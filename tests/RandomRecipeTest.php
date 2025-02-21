<?php
namespace Webtest\Module\Web357RandomRecipe\Tests;
// Include necessary files
require_once JPATH_BASE . '/modules/mod_web357_random_recipe/helper.php';


use Joomla\CMS\Factory;
use Joomla\Database\DatabaseDriver;
use PHPUnit\Framework\TestCase;
use ModWeb357RandomRecipeHelper;

class RandomRecipeTest extends TestCase
{
    /**
     * @var DatabaseDriver
     */
    protected $db;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock the database connection
        $this->db = $this->createMock(DatabaseDriver::class);

        // Inject the mocked database into JFactory
        Factory::$database = $this->db;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Reset the database connection
        Factory::$database = null;
    }

    public function testGetRandomRecipe()
    {
        // Mock the database query
        $query = $this->createMock(\Joomla\Database\DatabaseQuery::class);
        $this->db->method('getQuery')->willReturn($query);

        // Mock the query methods
        $query->method('select')->willReturnSelf();
        $query->method('from')->willReturnSelf();
        $query->method('order')->willReturnSelf();
        $query->method('setLimit')->willReturnSelf();

        // Mock the database result
        $expectedRecipe = (object) [
            'id' => 1,
            'title' => 'Random Recipe',
            'difficulty' => 'easy',
        ];
        $this->db->method('loadObject')->willReturn($expectedRecipe);

        // Call the method under test
        $recipe = ModWeb357RandomRecipeHelper::getRandomRecipe();

        // Assert that the returned recipe matches the expected result
        $this->assertEquals($expectedRecipe, $recipe);
    }

    public function testGetDifficultyIcons()
    {
        // Test easy difficulty
        $easyIcons = ModWeb357RandomRecipeHelper::getDifficultyIcons('easy');
        $this->assertEquals('<i class="fas fa-star"></i>', $easyIcons);

        // Test medium difficulty
        $mediumIcons = ModWeb357RandomRecipeHelper::getDifficultyIcons('medium');
        $this->assertEquals('<i class="fas fa-star"></i><i class="fas fa-star"></i>', $mediumIcons);

        // Test hard difficulty
        $hardIcons = ModWeb357RandomRecipeHelper::getDifficultyIcons('hard');
        $this->assertEquals('<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>', $hardIcons);

        // Test unknown difficulty
        $unknownIcons = ModWeb357RandomRecipeHelper::getDifficultyIcons('unknown');
        $this->assertEquals('', $unknownIcons);
    }
}
