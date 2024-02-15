
# Module Katizon AadhaarNumber

# Module Katizon Categories

# Module Katizon ProductList


## Main Functionalities
Module to collect Aadhaar Number on Cart Page

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Katizon`
 - Enable the module by running `php bin/magento module:enable Katizon_AadhaarNumber`
 - Enable the module by running `php bin/magento module:enable Katizon_Categories`
 - Enable the module by running `php bin/magento module:enable Katizon_ProductList`

 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require katizon/module-aadhaarnumber`
 - Install the module composer by running `composer require katizon/module-categories`
 - Install the module composer by running `composer require katizon/module-productlist`

 - enable the module by running `php bin/magento module:enable Katizon_AadhaarNumber`
 -  - Enable the module by running `php bin/magento module:enable Katizon_Categories`
 - Enable the module by running `php bin/magento module:enable Katizon_ProductList`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

