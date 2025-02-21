<?php
defined('_JEXEC') or die;

// Include helper
require_once dirname(__FILE__) . '/helper.php';

// Load language file
$lang = JFactory::getLanguage();
$lang->load('mod_web357_random_recipe', JPATH_SITE);

// Get the random recipe data
$randomRecipe = ModWeb357RandomRecipeHelper::getRandomRecipe();

// Load the template to render the data
require JModuleHelper::getLayoutPath('mod_web357_random_recipe', $params->get('layout', 'default'));
