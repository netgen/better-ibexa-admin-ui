const path = require('path');

module.exports = (ibexaConfig, ibexaConfigManager) => {
    ibexaConfigManager.add({
        ibexaConfig,
        entryName: 'ibexa-admin-ui-location-view-js',
        newItems: [path.resolve(__dirname, '../public/js/scripts/admin.content.always_available.js')],
    });
};
