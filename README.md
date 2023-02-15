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

Licensed under [GPLv2](LICENSE)
