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
        $(element).on('change', function (event) {
            let aadhaarValue = $("#aadhaar_number").val();
            if (aadhaarValue != null && aadhaarValue != "") {
                let aadhaarValueLength = aadhaarValue.trim().length;
                if (aadhaarValueLength != 12) {
                    $('#error-msg span').text('Aadhaar number should be 12 digits long');
                    return false;
                } else {
                    $('#error-msg span').text('');
                    let param = {
                        aadhaarNumber: aadhaarValue,
                        id: config.quote_id
                    };
                    $.ajax({
                        showLoader: true,
                        url: config.aadhaarSaveUrl,
                        data: param,
                        type: "POST"
                    }).done(function (data) {
                        if (data.response) {
                            $('#error-msg span').text(data.message);
                            return true;
                        } else {
                            $("#aadhaar_number").val('');
                            $('#error-msg span').text(data.message);
                            return false;
                        }
                    });
                }
            }
        });

    };
});
