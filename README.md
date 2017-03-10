Provides a page per CViTjs plot in your Tripal site. This module also supports adding a legend to your diagram pages.

## Dependencies
- [CViTjs](https://github.com/LegumeFederation/cvitjs)

## Installation
1. Install CViTjs as a Library in [your drupal site]/sites/all/libraries ( [Drupal HowTo](https://www.drupal.org/docs/7/modules/libraries-api/installing-an-external-library-that-is-required-by-a-contributed-module) )
2. Install this module as you would any other Drupal module.
3. Create your CViTjs diagrams according to the instructions included in the Library.

## Tips & Tricks
- Set the title of your CViTjs pages and the labels of the links by adding a `title = Your Human Readable Title` tag in the main cvit.conf for each dataset
- You can also add a one-line description above your diagram by adding a `description = More details about the analysis, etc.` tag in the main cvit.conf for each dataset
- This module will generate a colour-based legend for you. Simply add the following tags in the plot cvit.conf for each visualization type you want in the legend: `legend = true`, `title = My Legend label for this type`. The module will use the colo(u)r already set for the type.
