/*
=========================================================
* BMS JS
=========================================================

* Copyright BMS 2024 (https://github.com/eafarooqi)
* Author: eafarooqi (https://github.com/eafarooqi)

=========================================================
*/

"use strict";
const d = document;
d.addEventListener("DOMContentLoaded", function (event) {
    initBootstrapValidation();             // Bootstrap 5 Validation init
    initDoConfirmation();                  // action confirmation popup

    // Custom Functions
    sidebarActiveJs()                       // making the menu active as a fallback if active class cant be added in php.
});

// #################### Initialization Functions ########################

// Bootstrap 5 Validation
function initBootstrapValidation(){
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
}

// Delete confirmation popup
function initDoConfirmation(){
    document.body.addEventListener( 'click', function ( event ) {
        if( event.target.classList.contains('doWithConfirmation') || (event.target.parentNode && event.target.parentNode.classList.contains('doWithConfirmation'))) {

            event.preventDefault();
            let ele = null;

            if(event.target.parentNode.classList.contains('doWithConfirmation')){
                ele = event.target.parentNode;
            } else {
                ele = event.target;
            }

            // displaying confirmation popup
            Swal.fire({
                title: ele.dataset.confirmTitle || 'Delete Confirmation',
                text: ele.dataset.confirmText || "This operation cannot be reversed.",
                showCancelButton: true,
                confirmButtonText: ele.dataset.buttonText || 'Delete'
            }).then((result) => {

                if (result.isConfirmed) {
                    if(ele.tagName === 'A'){
                        // if anchor
                        window.location.href = ele.getAttribute('href');
                    }else if(ele.tagName === 'BUTTON') {
                        // if form
                        ele.closest('form').submit();
                    }
                }
            });
        };
    });
}

// #################### Custom Functions ########################

// fallback function/hack to keep the sidebar sub items active
// if not already done from php
function sidebarActiveJs(){
    let subActive = document.querySelector('.sub-active') !== null;
    if(subActive) {
        document.querySelector('.sub-active').closest('.sidebarNav > li').classList.add('active');
        document.querySelector('.sub-active').closest('.multi-level').classList.add('show');
    }
}

