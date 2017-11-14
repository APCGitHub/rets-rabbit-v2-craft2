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
3. [craft.retsRabbit.properties.search](#searchint-id-object-overrides-bool-usecache--false-int-cacheduration) - Perform a search using a saved query from a search form.

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

### search(*int* $id, *object* $overrides, *bool* $useCache = false, *int* $cacheDuration)

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

### Search Form

At some point your site will need to have a search form where users enter in the search criteria. We've created a markup DSL for your search HTML which will allow you to create beautiful forms for your users.

We believe that the following three search types should cover the vast majority of search form use cases.

1. Single field for a single value
2. Single field for multiple values
3. Multiple fields for a single value

Next, let's dive into creating a search form. In general our markup DSL follows a simple pattern:

`<input name="{fieldName}(operator)" value="">`.

To create a query matching case #1 above, use the following markup:

```html
<input name="StateOrProvince(eq)" value="">
```

This will create a query clause that looks like the following:

```json
$filter = StateOrProvince eq {value}
```

To create a query matching case #2 above, use the following markup:

```html
{% set exteriorAmenities = ['Backyard', 'Pond', 'Garden'] %}

<label class="label">Exterior Features</label>
{% for feature in exteriorAmenities %}
    <div class="control">
        <label class="checkbox">
            <input type="checkbox" name="rr:ExteriorFeatures(contains)[]" value="{{feature}}">
            {{feature}}
        </label>
    </div>
{% endfor %}
```

This will create a query clause that looks like the following:

```json
$filter = (contains(ExteriorFeatures, '{value1}') or (contains(ExteriorFeatures, '{value2}')))
```

To create a query matching case #3 above, use the following markup:

```html
<input class="input" placeholder="City, State, Zip..." type="text" name="rr:StateOrProvince|City|PostalCode(contains)">
```

This will create a query clause which looks like the following:

```json
$filter = (contains(StateOrProvince, {value}) or contains(City, {value}) or contains(PostalCode, {value}))
```

**Note:** By default, each input is treated as an independent {and} clause which are strung together to create a valid RESO query.

The following example contains markup which will generate a form having the following capabilities:

* Run a contains search against the fields: StateOrProvince, City, PostalCode
* Run a range search (ge and/or le) against ListPrice
* Run a range search (ge) against the fields: BathroomsFull and BedroomsTotal
* Run a multi value contains search against: ExteriorFeatures
* Run a multi value contains search against: InteriorFeatures

```html
<form method="POST" action="">
    {{getCsrfInput()}}
    <input type="hidden" name="action" value="retsRabbit/properties/search">
    <input type="hidden" name="redirect" value="search/results/{searchId}">
    <div class="field">
        <div class="control has-icons-left">
            <input class="input" placeholder="City, State, Zip..." type="text" name="rr:StateOrProvince|City|PostalCode(contains)">
            <span class="icon is-left">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-body">
            <div class="field">
                <div class="control is-expanded">
                    <div class="select is-fullwidth">
                        <select name="rr:ListPrice(ge)">
                            <option value="">Min Price</option>
                            {% for price in range(30000, 300000, 10000) %}
                                <option value="{{price}}">{{price | currency('USD', true)}}</option>
                            {% endfor %}
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="control is-expanded">
                    <div class="select is-fullwidth">
                        <select name="rr:ListPrice(le)">
                            <option value="">Max Price</option>
                            {% for price in range(30000, 300000, 10000) %}
                                <option value="{{price}}">{{price | currency('USD', true)}}</option>
                            {% endfor %}
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-body">
            <div class="field">
                <div class="control has-icons-left is-expanded">
                    <div class="select is-fullwidth">
                        <select name="rr:BathroomsFull(ge)">
                            <option value>Bathrooms</option>
                            {% for val in 0..7 %}
                                <option value="{{val}}">{{val}}+</option>
                            {% endfor %}
                        </select>
                    </div>
                    <span class="icon is-left">
                        <i class="fa fa-bath"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                <div class="control has-icons-left is-expanded">
                    <div class="select is-fullwidth">
                        <select name="rr:BedroomsTotal(ge)">
                            <option value>Bedrooms</option>
                            {% for val in 0..7 %}
                                <option value="{{val}}">{{val}}+</option>
                            {% endfor %}
                        </select>
                    </div>
                    <span class="icon is-left">
                        <i class="fa fa-bed"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-body">
            <div class="field">
                <label class="label">Exterior Features</label>
                {% for feature in exteriorAmenities %}
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" name="rr:ExteriorFeatures(contains)[]" value="{{feature}}">
                            {{feature}}
                        </label>
                    </div>
                {% endfor %}
            </div>
            <div class="field">
                <label class="label">Interior Features</label>
                {% for feature in interiorAmenities %}
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" name="rr:InteriorFeatures(contains)[]" value="{{feature}}">
                            {{feature}}
                        </label>
                    </div>
                {% endfor %}
            </div>
        </div>
    </div>
    <button class="button is-success" type="submit">
        <span class="icon">
            <i class="fa fa-search"></i>
        </span>
        <span>{{'Submit'|t}}</span>
    </button>
</form>
```

### Search Pagination

Because the Rets Rabbit plugin fetches data from an outside data source, it's not possible to use the native Craft pagination tag. We still believe it is very important to have the ability to paginate your results, so we created the `PaginationVariable` to help.

In order to pagination your listing results from our API you must use the `PropertiesVariable` in conjunction with the `PaginationVariable`. Before we go into an example of how that works, let's check out the method signature of the `properties` function in the `PaginationVariable`.

***Craft\PaginationVariable* properties(*int* $searchId, *int* $perPage = null, *string* $type = 'estimated')**

**$id** - This is the same id you will pass into the search() method.

**$perPage** - Control how many results you want to have per page.

**$type** - Specify which type of total results query you want the API to execute. Possible values are **estimated** or **exact**.

This method will return a `Craft\PaginationVariable` which is the same object returned by the native `{% paginate %}` tag. This means you can go about creating your pagination markup the same way you normally would in Craft. Here's a complete example.

```html
{% set searchId = craft.request.getSegment(3) %}
    
{% if not craft.retsRabbit.searches.exists(searchId) %}
    {% redirect '404' %}
{% endif %}

{% set perPage = 12 %}

{# Notice we pass in perPage to both properties.search & pagination.properties #}
{% set results = craft.retsRabbit.properties.search(searchId, {
    '$top': perPage,
    '$orderby': 'ListPrice desc'
}, true) %}
{% set pageInfo = craft.retsRabbit.pagination.properties(searchId, perPage, 'exact') %}

{% if results is null %}
    {# Handle error #}
{% else %}
    {% if results | length %}
        {# Show the listings #}
    {% else %}
        {# No results for this search #}
    {% endif %}
{% endif %}

{% if pageInfo.totalPages > 1 %}
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        {% if pageInfo.prevUrl %}
            <a class="pagination-previous" aria-label="Previous page" href="{{pageInfo.prevUrl}}">Previous</a>
        {% endif %}
        {% if pageInfo.nextUrl %}
            <a class="pagination-next" aria-label="Next page" href="{{pageInfo.nextUrl}}">Next page</a>
        {% endif %}

        <ul class="pagination-list">
            {% if pageInfo.currentPage > 2 %}
                <li>
                    <a href="{{pageInfo.firstUrl}}" class="pagination-link" aria-label="Goto first page">First</a>
                </li>
                <li>
                    <span class="pagination-ellipsis">&hellip;</span>
                </li>
            {% endif %}
            {% for page, url in pageInfo.getPrevUrls(2) %}
                <li>
                    <a class="pagination-link" aria-label="Goto page {{page}}" href="{{ url }}">{{ page }}</a>
                </li>
            {% endfor %}
            <li>
                <a class="pagination-link is-current" aria-label="Page {{pageInfo.currentPage}}" aria-current="page">{{pageInfo.currentPage}}</a>
            </li>
            {% for page, url in pageInfo.getNextUrls(2) %}
                <li>
                    <a class="pagination-link" href="{{ url }}" aria-label="Goto page {{page}}">{{ page }}</a>
                </li>
                {% endfor %}
                {% if pageInfo.nextUrl %}
                <li>
                    <span class="pagination-ellipsis">&hellip;</span>
                </li>
                <li>
                    <a href="{{pageInfo.lastUrl}}" class="pagination-link" aria-label="Goto last page">Last</a>
                </li>
            {% endif %}
        </ul>
    </nav>
{% endif %}
```

We used [Bulma.io](https://bulma.io/) in this example, but the above markup will generate something like the following.

![Pagination](screenshots/pagination.png "Pagination")

### Other Variables

Aside from the `PropertiesVariable`, there are a couple of other variables you have access to in your templates.

* SearchesVariable - `craft.retsRabbit.searches`

#### SearchesVariable

This template variable has the following methods:

1. [exists](#bool-existsint-id)

#### *bool* exists(*int* $id)

This method checks if a given search id exists. This method is useful for checking if a search exists before trying to execute it which will provide more predictable error handling.