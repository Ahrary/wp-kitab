# WP Kitab
WP Kitab is a simple plugin that allows you to add book post type and taxonomies to your wordpress website


## Features
- `Book Author` taxonomy
- `Book Categories` taxonomy
- `Book Main Category` taxonomy
- `Book Language` taxonomy
- `Book Publisher` taxonomy
- `Book City` taxonomy
- `Book Published Date` taxonomy
- `Book Tags` taxonomy
- Automatically update Book CPT `Title` by `Book Author` ACF Taxonomy and `Book Title` ACF Text fields
- Automatically update Book CPT `Excerpt` by `Book Description` ACF field
- Automatically assign Book CPT `Featured image` by `Book Cover` ACF Image field
- Translation ready


### Registered ACF Fields for Book CPT
- Book - Group Field
    * Volume Info - Group Field
        - Book Title - `title` ACF Text Field
        - Book Author - `author` ACF Taxonomy Field
    * Book Main Category - `main_category` ACF Taxonomy Field
    * Book Categories - `categories` ACF Taxonomy Field
    * Book Language - `language` ACF Taxonomy Field
    * Book Publisher - `publisher`  ACF Taxonomy Field
    * Book City - `city` ACF Taxonomy Field
    * Book Published Date - `published_date` ACF Taxonomy Field
    * Industry Identifiers - Group Field
        - Book ISBN - `isbn` ACF Text Field
    * Book Pages - `page_count` ACF Text Field
    * Book File - `file` ACF File Field
    * Book Cover - `cover` ACF Image Field
    * Book Description - `description` ACF Text Area Field


## Requirements:
- The plugin requires [ACF](https://www.advancedcustomfields.com) plugin
- WordPress 5.2 or higher
- PHP 7 or higher


## Installation
- Download the plugin from [GitHub](https://github.com/Ahrary/wp-kitab)
- Upload the plugin to your `/wp-content/plugins/` folder
- Activate the plugin in the `Plugins` menu in WordPress admin panel


## Changelog
### v1.0.0
- Initial release

### v1.0.1
- Added translation for Tajik language

### v1.0.2
- Added ACF fields for Book CPT to the plugin
- Fixed bug with translation
- Added notice error if ACF is not installed
- Added notice error if ACF is not activated
- Added notice error if ACF is not compatible with the plugin

### v1.0.3
- Refactored code
- Added translation for Russian language

## License
This plugin is licensed under the GPLv2 license.


## Author
- [WP Kitab](https://github.com/Ahrary/wp-kitab)
