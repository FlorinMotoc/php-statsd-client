# php-statsd-client

## Installation

Install the latest version with

```bash
composer require florinmotoc/php-statsd-client
```

## Basic Usage

```dotenv
# example of .env variables
FM_STATSD_CLIENT_CUSTOM_DATADOG_HOST=localhost
FM_STATSD_CLIENT_CUSTOM_DATADOG_PORT=8125
FM_STATSD_CLIENT_CUSTOM_DATADOG_LOCAL_HOSTNAME=optional-hostname
FM_STATSD_CLIENT_CUSTOM_DATADOG_TAGS_CUSTOM_SOMETHING=something
```

- `FM_STATSD_CLIENT_CUSTOM_DATADOG_HOST`
- `FM_STATSD_CLIENT_CUSTOM_DATADOG_PORT`
  - set these to your statsd host+port
- `FM_STATSD_CLIENT_CUSTOM_DATADOG_LOCAL_HOSTNAME=optional-hostname`
    - if you want to send a custom hostname (not system hostname), you can set this .env variable
- `FM_STATSD_CLIENT_CUSTOM_DATADOG_TAGS_CUSTOM_`
    - this is a prefix.
    - anything after prefix's `_` will be sent to statsd with a prefix `c_`
    - ex: `FM_STATSD_CLIENT_CUSTOM_DATADOG_TAGS_CUSTOM_ABC=ABC` will send to statsd `c_abc=ABC`
    - ex: `FM_STATSD_CLIENT_CUSTOM_DATADOG_TAGS_CUSTOM_ABC=abc` will send to statsd `c_abc=abc`
    - ex: `FM_STATSD_CLIENT_CUSTOM_DATADOG_TAGS_CUSTOM_D=smth` will send to statsd `c_d=smth`
    - ex: `FM_STATSD_CLIENT_CUSTOM_DATADOG_TAGS_CUSTOM_ENV=prod` will send to statsd `c_env=prod`
    - ex: `FM_STATSD_CLIENT_CUSTOM_DATADOG_TAGS_CUSTOM_ENV=devel` will send to statsd `c_env=devel`
