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

1. [find](#findint-id-object-resoparams-bool-usecache--false-int-cacheduration)
2. [query](#queryobject-resoparams-bool-usecache--false-int-cacheduration)
3. [search](#search)

### find(*int* $id, *object* $resoParams, *bool* $useCache = false, *int* $cacheDuration)

**$id** - The MLS id of the property you want to fetch from the API.

**$resoParams** - You may pass valid RESO parameters to help filter the API results for a single listing. This can help speed up the response time if you specifically select the fields you will need from the API by using the `$select` parameter.

**$useCache** - Specify if you want the results cached.

**$cacheDuration** - Specify how long you would like the results cached for in seconds. The default is one hour.

```html
{% set listing = craft.retsRabbit.properties.find('123abc', {'$select': 'ListingId, ListPrice'}, true) %}

{#
# You should check to see if listing is null which means an error occurred.
#}

{% if listing is not null %}
    {{listing.ListingId}}
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

{% if listings is not null %}
    {# An error occurred #}
{% else %}
    {% if listings | length %}
        {% for listing in listings %}
            <div class="card">
                <div class="card-header">
                    {{listing.ListingId}}
                </div>
            </div>
        {% endfor %}
    {% else %}
        {# No results for the search #}
    {% endif %}
{% endif %}
```