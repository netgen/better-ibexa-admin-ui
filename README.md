Netgen Better Ibexa Admin UI
============================

Better Ibexa Admin UI implements an enhanced administration UI for Ibexa DXP
that adds some missing features we loved from eZ Publish Legacy administration
interface.

Installation & license
----------------------

Install the package with `composer require netgen/better-ibexa-admin-ui`. This
will automatically enable the bundle, but will not enable the new interface in
Ibexa Admin UI. To enable the interface, you need to set the design of
`admin_group` siteaccess group to `ngadmin`, e.g.:

```yaml
ibexa:
    system:
        admin_group:
            design: ngadmin
```

Next, import the routes into your project:

```yaml
netgen_better_ibexa_admin_ui:
    resource: '@NetgenBetterIbexaAdminUIBundle/Resources/config/routing.yaml'

```

Licensed under [GPLv2](LICENSE)
