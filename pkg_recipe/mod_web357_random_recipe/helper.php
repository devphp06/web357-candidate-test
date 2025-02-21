<?php
defined('_JEXEC') or die;

class ModWeb357RandomRecipeHelper
{
    public static function getRandomRecipe()
    {
        // Get the database object
        $db = JFactory::getDbo();

        // Query to fetch a random recipe
        $query = $db->getQuery(true)
                    ->select('*')
                    ->from($db->quoteName('#__web357test_recipes'))
                    ->order('RAND()')
                    ->setLimit(1);

        $db->setQuery($query);

        return $db->loadObject();
    }

    // Method to get difficulty icons
    public static function getDifficultyIcons($difficulty)
    {
        // Return the appropriate number of Font Awesome star icons based on difficulty
        switch ($difficulty) {
            case 'easy':
                return '<i class="fas fa-star"></i>'; // 1 star
            case 'medium':
                return '<i class="fas fa-star"></i><i class="fas fa-star"></i>'; // 2 stars
            case 'hard':
                return '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>'; // 3 stars
            default:
                return ''; // No icon if the difficulty is unknown
        }
    }
}
