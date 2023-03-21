/* jshint esversion: 6 */
(function (global, doc, ibexa) {
    "use strict";
    const SELECTOR_ALWAYS_AVAILABLE_CHECKBOX = '#ibexa-tab-location-view-translations .ibexa-content-translations__always-available-checkbox';
    const SELECTOR_ALWAYS_AVAILABLE_FORM = 'form[name="ng-content-update-always-available"]';
    const form = doc.querySelector(SELECTOR_ALWAYS_AVAILABLE_FORM);
    const checkbox = doc.querySelector(SELECTOR_ALWAYS_AVAILABLE_CHECKBOX);
    const handleUpdateError = ibexa.helpers.notification.showErrorNotification;
    const handleUpdateSuccess = (event, { message }) => {
        ibexa.helpers.notification.showSuccessNotification(message);
    };
    const handleUpdateResponse = (response) => {
        if (response.status !== 200) {
            throw new Error(response.statusText);
        }

        return response.json();
    };
    const updateVisibility = (event) => {
        form.querySelector('#ng-content-update-always-available_always_available').checked = event.target.checked;

        const request = new Request(form.action, {
            method: 'POST',
            body: new FormData(form),
            mode: 'same-origin',
            credentials: 'same-origin',
        });

        fetch(request).then(handleUpdateResponse).then(handleUpdateSuccess.bind(null, event)).catch(handleUpdateError);
    };

    checkbox.addEventListener('change', updateVisibility, false);
})(window, window.document, window.ibexa);
