# Mage2 Module Katizon AadhaarNumber

    ``katizon/module-aadhaarnumber``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Module to collect Aadhaar Number on Cart Page

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Katizon`
 - Enable the module by running `php bin/magento module:enable Katizon_AadhaarNumber`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require katizon/module-aadhaarnumber`
 - enable the module by running `php bin/magento module:enable Katizon_AadhaarNumber`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - Enable (aadhaar_number/general/enable)

 - Aadhaar Label (aadhaar_number/general/label)


## Specifications




## Attributes

 - Sales - Aadhaar Number (aadhaar_number)

 - Sales - Aadhar Number (aadhar_number)

