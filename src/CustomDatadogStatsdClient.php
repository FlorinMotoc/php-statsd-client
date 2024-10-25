<?php

namespace FlorinMotoc\Statsd;

use DataDog\DogStatsd;

class CustomDatadogStatsdClient extends DatadogStatsdClient
{
    public function __construct()
    {
        $config = [
            'disable_telemetry' => true,
        ];

        if (!empty($_ENV['STATSD_CLIENT_CUSTOM_DATADOG_HOST'])) {
            $config['host'] = $_ENV['STATSD_CLIENT_CUSTOM_DATADOG_HOST'];
        }

        if (!empty($_ENV['STATSD_CLIENT_CUSTOM_DATADOG_PORT'])) {
            $config['port'] = $_ENV['STATSD_CLIENT_CUSTOM_DATADOG_PORT'];
        }

        if (!empty($_ENV['STATSD_CLIENT_CUSTOM_DATADOG_LOCAL_HOSTNAME'])) {
            $config['global_tags'] = ['host' => $_ENV['STATSD_CLIENT_CUSTOM_DATADOG_LOCAL_HOSTNAME']];
        } else {
            $config['global_tags'] = ['host' => gethostname()];
        }

        // custom tags
        $customTagsPrefix = 'STATSD_CLIENT_CUSTOM_DATADOG_TAGS_CUSTOM_';
        foreach (array_filter($_ENV, fn($key) => str_starts_with($key, $customTagsPrefix), ARRAY_FILTER_USE_KEY) as $key => $value) {
            $key = strtolower(str_replace($customTagsPrefix, '', $key));
            $config['global_tags']["c_$key"] = $value;
        }

        $this->client = new DogStatsd($config);
    }
}
