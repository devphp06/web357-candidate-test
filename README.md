# Changelog detailing all modifications
18/02/2025
- Added Serving Size parameter to recipes component.
- Serving size parameter will be displayed in both recipe list and single recipe views

18/02/2025
- Updated frontend display of difficulty levels( plain text to font awesome icons) in recipe list and single recipe view.
- Added hidden labels for accessibility

18/02/2025
- Add difficulty level filter dropdown in backend recipes list.
- Filter list to show results on basis of filters selected
- Clear filters when clear button is clicked.

18/02/2025
- Create a new module (mod_web357_random_recipe)
- Display random recipe on each page reload.
- Include title, difficulty icons, serving size and link to full recipe page.

20/02/2025
- Remove zip files from repository

20/02/2025
- Place module folder directly inside repo root

21/02/2025
- Install PHPUnit package and write tess.
- Create a package for module and component
- Update Readme.md file with
    Installation instructions
    Changelog detailing all modifications
    Screenshots of new features
    Testing instructions

21/02/2025
- Fixed a bug in installing language files for module using package



# Screenshots
    ## Serving Size Parameter
    - Serving Size field in backend on creating new recipe - https://prnt.sc/NIfpBS8t9NKK
    - Serving size in single recipe view - https://prnt.sc/izZfW1pXBuqP
    - Serving size in recipe list - https://prnt.sc/ksyHqRC-n5Cn

    ## Frontend Display of Difficulty Icons
    - Recipe List - https://prnt.sc/ksyHqRC-n5Cn
    - Single recipe - https://prnt.sc/izZfW1pXBuqP

    ## Backend difficulty level filter
    - https://prnt.sc/ht1Qr8Lo--eE

    ## Random Recipe Module
    - https://prnt.sc/aloAMPb6D1E9



# Installation Instructions
    ## Installing package(module and component)
    - Clone repo onto your local.
    - Then open pkg_recipe folder.
    - Zip component and module folders separately inside pkg_recipe
    - Zip pkg_recipe now.
    - Now Open Joomla Extension Manager.
    - Upload the pkg_recipe.zip file
    - Package will install both component and module to joomla

    ## PHPUnit
    - Copy composer.phar file to your joomla project
    - composer require --dev phpunit/phpunit
    - copy tests folder to root of joomla project
    - copy phpunit.xml to root of joomla project
    - Open terminal inside your project root. Go to project root path.
    - Run command in terminal to run all test classes at once inside tests folder -> php ./vendor/bin/phpunit tests/
    - Run command in terminal to run once test class at once inside tests folder -> php ./vendor/bin/phpunit tests/RecipeFilterTest.php



# Testing instructions
    ## Installation
    - Install Joomla5
    - Install package as per Installation Instructions above

    ## Serving Size
    - Go to Component  -> Web357 Test -> Recipes
    - Create a new recipe with serving size parameter.
    - Check serving size parameter is displayed in recipe list and single recipe view in frontend.

    ## Difficulty Level Icons in Frontend
    - View easy shows one star, medium show two star and hard shows three star icons in recipe list and single recipe view in frontend.

    ## Random Recipe Module
    - Go to Menus -> Main Menu -> New
    - Create a new menu item.
    - In module assignment settings for menu. Click mod_web357_random_recipe module.
    - Then in menu assignment tab select Module assignment option(Select single or multiple pages where you want to display random recipe)
    - Go to Module tab.
    - Set position for menu.
    - Change module status to published
    - Save and Close module settings
    - Save the Menu Item.
    - Check page were you assigned random recipe module. It will be visibel at position that you select in module assignment settings.
