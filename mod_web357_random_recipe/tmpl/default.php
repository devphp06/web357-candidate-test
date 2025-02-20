<?php
defined('_JEXEC') or die;
?>

<div class="random-recipe">
    <h3><?php echo $randomRecipe->title; ?></h3>
    <div class="difficulty">
        <?php
        // Difficulty icons based on recipe's difficulty
        echo ModWeb357RandomRecipeHelper::getDifficultyIcons($randomRecipe->difficulty);
        ?>
    </div>
    <div class="serving-size">
        <?php echo JText::_('MOD_WEB357_RANDOM_RECIPE_SERVING_SIZE_LBL') ?> : <?php echo $randomRecipe->serving_size; ?>
    </div>
    <a href="<?php echo JRoute::_('index.php?option=com_web357test&view=recipe&id=' . $randomRecipe->id); ?>"><?php echo JText::_('MOD_WEB357_RANDOM_RECIPE_VIEW'); ?></a>

</div>
