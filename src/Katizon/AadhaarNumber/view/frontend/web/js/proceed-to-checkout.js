/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'jquery',
    'Magento_Customer/js/model/authentication-popup',
    'Magento_Customer/js/customer-data'
], function ($, authenticationPopup, customerData) {
    'use strict';

    return function (config, element) {
        $(element).on('click', function (event) {
            var cart = customerData.get('cart'),
                customer = customerData.get('customer');

            event.preventDefault();

            if (!customer().firstname && cart().isGuestCheckoutAllowed === false) {
                authenticationPopup.showModal();

                return false;
            }
            let aadhaarValue = $("#aadhaar_number").val();
            if (aadhaarValue != null && aadhaarValue != "") {
                let aadhaarValueLength = aadhaarValue.trim().length;
                if (aadhaarValueLength != 12) {
                    $('#error-msg span').text('Aadhaar number should be 12 digits long');
                    return false;
                }
            }
            $(element).attr('disabled', true);
            location.href = config.checkoutUrl;
        });

    };
});
