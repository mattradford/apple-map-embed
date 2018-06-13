# Apple Map embed
This is WordPress plugin to embed an Apple Map, using a shortcode. It uses Mapkit JS and is a demo only - not production ready.

## Contents

The WordPress plugin includes the following files:

* `README.md`. The file that you’re currently reading.
* `apple-map-embed.php`. The file that loads the plugin, and enqueues the Mapkit JS script plus the map-specific JavaScript (map.js).
* `admin/mapkit-jwt-settings.php`. A settings page with instructions. Find it at Tools -> Apple Map embed.
* `admin/mapkit-jwt-token.php`. Token generation function using the settings stored via `admin/mapkit-jwt-settings.php`.
* `admin/JWT.php`. The JSON Web token generation library [mapkit-jwt](https://github.com/includable/mapkit-jwt) from [Includable](https://github.com/includable).
* `inc/map.js`. The JavaScript file that intialises the map. You'll want to play with this to create different maps.
* `uninstall.php`. Removes the plugin options from the database on uninstallation.
* `index.php`. Silence is golden.

## Installation

* Download the latest release
* Upload the zip file via Plugins -> Add new
* Activate
* Complete required settings in Tools -> Apple Map embed.
* Add the shortcode `[applemap]` to a page.