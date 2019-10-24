# CViTjs Embed

Provides a page per CViTjs plot in your Tripal site. This module also supports adding a legend to your diagram pages.

## Dependencies
- Tripal v2.x
- [CViTjs](https://github.com/LegumeFederation/cvitjs) [v0.1.0-beta](https://github.com/LegumeFederation/cvitjs/releases/tag/v0.1.0-beta)

## Installation
1. Install CViTjs as a Library in [your drupal site]/sites/all/libraries ( [Drupal HowTo](https://www.drupal.org/docs/7/modules/libraries-api/installing-an-external-library-that-is-required-by-a-contributed-module) )
2. Install Tripal and this module as you would any other Drupal module.

## Usage
1. Create your CViTjs diagrams according to the instructions included in the Library.
2. Clear the Drupal cache. Your diagrams should show up as one diagram per menu item. URLs will be [your drupal site]/cvitjs/[diagram short code].

## Tips & Tricks
- Set the title of your CViTjs pages and the labels of the links by adding a `title = Your Human Readable Title` tag in the main cvit.conf for each dataset
- You can also add a one-line description above your diagram by adding a `description = More details about the analysis, etc.` tag in the main cvit.conf for each dataset
- To make a chart private (i.e. controlled by the "View Private CViTjs plot" permission) add `access = private` to the main cvitjs.conf
- This module will generate a colour-based legend for you. Simply add the following tags in the plot cvit.conf for each visualization type you want in the legend: `legend = true`, `title = My Legend label for this type`. The module will use the colo(u)r already set for the type.
