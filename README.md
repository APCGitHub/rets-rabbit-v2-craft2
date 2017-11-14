# Rets Rabbit Craft CMS Plugin

This plugin allows you to connect to the Rets Rabbit API(v2) in order to display your listings in a clean and intuitive way.

## Installation
1. Clone or Download the plugin.
2. Copy `craft/plugins/retsrabbit` to your plugins folder.
3. Install plugin in the Craft Control Panel under Settings > Plugins
4. Go to the Rets Rabbit settings page and add your Client ID & Secret.

### Requirements
The Rets Rabbit plugin requires at least php 5.6.

## Documentation
You can interact with the Rets Rabbit API through the `PropertiesVariable` which has the following methods.

1. [craft.retsRabbit.properties.find](#findint-id-object-resoparams-bool-usecache--false-int-cacheduration) - Single listing lookup
2. [craft.retsRabbit.properties.query](#queryobject-resoparams-bool-usecache--false-int-cacheduration) - Run a raw RESO query
3. [craft.retsRabbit.properties.search](#searchint-id-object-overrides-bool-usecache--false-bool-cacheduration) - Perform a search using a saved query from a search form.

### find(*int* $id, *object* $resoParams, *bool* $useCache = false, *int* $cacheDuration)

**$id** - The MLS id of the property you want to fetch from the API.

**$resoParams** - You may pass valid RESO parameters to help filter the API results for a single listing. This can help speed up the response time if you specifically select the fields you will need from the API by using the `$select` parameter.

**$useCache** - Specify if you want the results cached.

**$cacheDuration** - Specify how long you would like the results cached for in seconds. The default is one hour.

```html
{% set listing = craft.retsRabbit.properties.find('123abc', {'$select': 'ListingId, ListPrice'}, true) %}

{% if listing is not null %}
    {{listing.ListingId}}
{% else %}
    {# An error occurred, let the user know #}
{% endif %}

```

### query(*object* $resoParams, *bool* $useCache = false, *int* $cacheDuration)

**$resoParams** - You may pass valid RESO parameters to help filter the API results for a single listing. This can help speed up the response time if you specifically select the fields you will need from the API by using the `$select` parameter.

**$useCache** - Specify if you want the results cached.

**$cacheDuration** - Specify how long you would like the results cached for in seconds. The default is one hour.

```html
{% set listings = craft.retsRabbit.properties.query({
    '$select': 'ListingId, ListPrice, PublicRemarks, StateOrProvince, City',
    '$filter': 'ListPrice ge 150000 and ListPrice le 175000 and BedroomsTotal ge 3',
    '$orderby': 'ListPrice',
    '$top': 12
}) %}

{% if listings is null %}
    {# An error occurred #}
{% else %}
    {% if listings | length %}
        {% for listing in listings %}
            <div class="card">
                <div class="card-header">
                    {{listing.ListingId}}
                </div>
                <div class="card-content">
                    {{listing.ListPrice}}
                </div>
            </div>
        {% endfor %}
    {% else %}
        {# No results for the search #}
    {% endif %}
{% endif %}
```

### search(*int* $id, *object* $overrides, *bool* $useCache = false, *bool* $cacheDuration)

**$id** - The id of the saved search parameters usually pulled from a url segment.

**$overrides** - You may pass in the following RESO parameters to help tailor your query search: `$select, $orderby, $top`.

**$useCache** - Specify if you want the results cached.

**$cacheDuration** - Specify how long you would like the results cached for in seconds. The default is one hour.

```html
{# Results URL (for example): /search/results/4 #}
{% set searchId = craft.request.getSegment(3) %}
    
{% if not craft.retsRabbit.searches.exists(searchId) %}
    {% redirect '404' %}
{% endif %}

{% set perPage = 12 %}

{% set results = craft.retsRabbit.properties.search(searchId, {
    '$top': perPage,
    '$orderby': 'ListPrice desc'
}, true) %}

{% if results is null %}
    {# An error occurred #}
{% else %}
    {% if results | length %}
        {% for listing in results %}
            {# Show listing data #}
        {% endfor %}
    {% else %}
        {# No results for the search #}
    {% endif %}
{% endif %}

```