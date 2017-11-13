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

1. [find](#find)
2. [query](#query)
3. [search](#search)

### find(*int* $id, *array* $resoParams, *bool* $useCache = false, *int* cacheDuration)
