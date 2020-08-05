# SynologyBundle



Add this in the .env
```INI
###> damienmillet/synology-bundle ###
DSM_APP_ID=
DSM_APP_USER=
DSM_APP_PASSWORD=
###< damienmillet/synology-bundle ###
```

Add 
```YAML
# config/packages/synology.yaml
synology:
    dsm_app_id: '%env(DSM_APP_ID))%'
    dsm_app_password: '%env(DSM_APP_PASSWORD)%'
    dsm_app_url: '%env(DSM_APP_USER)%'
```

If u want use token authenticator.
```YAML
# config/routes/synology.yaml
synology:
    resource: '@SynologyBundle/Resources/config/routes.xml'
    prefix: /

```

make:auth => 0
make:user => username
          => check user passwords => no

