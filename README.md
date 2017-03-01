# Mobile Website Directory Project [![Build Status](https://travis-ci.org/bcantoni/mobile-websites.svg?branch=master)](https://travis-ci.org/bcantoni/mobile-websites)

## About

This is the code which powers the mobile website directory I've been running at <http://cantoni.mobi> since 2002. I originally titled it "PDA Optimized Web Sites" and for a long time was the #1 Google search result for that funny sounding title. For a long time I actively accepted suggestions from visitors who helped me keep the links up to date. Recently there's been some interest in doing some more updates, so I'm moving everything up to GitHub to make it more accessible.

## Criteria

To be included on the list, a proposed website should:

1. Be broadly interesting. Narrow niches or very location specific usually would not qualify (e.g. Palm Beach Hotels).
2. Have an actual mobile site. Whether it's automatically detected or using a mobile-specific domain, the site should in fact be mobile-friendly (meaning works on small screens and be size efficient).

## Contributing

There are a couple ways to contribute new sites or suggest changes:

### Open an Issue

The simplest option (and only requires a GitHub account) is to [open an issue](https://github.com/bcantoni/mobile-websites/issues) here with all the details.

### Submit a Pull Request

If you're more familiar with GitHub development and the structure of the code here (see below), you can submit a [pull request](https://github.com/bcantoni/mobile-websites/pulls) to change the data file directly.

### Structure

The website is currently driven by a single PHP index file along with a set of include files, one for each category:

| Slug    | Name |
| --------|----- |
| biz     | Business |
| ent     | Entertainment |
| info    | Information |
| news    | News |
| portal  | Portal |
| search  | Search |
| shop    | Shopping |
| sports  | Sports |
| tech    | Technology |
| travel  | Travel |
| weather | Weather |

The "slug" is the short code which is used both for the data file and the category web URL. For example the slug for Business is `biz`, the data file is `biz.inc` and the web link is http://cantoni.mobi/biz.

The data files are simply PHP array definitions, with one entry for each mobile website link. Here's a sample from the `biz.inc` data file:

    array("url"=>"http://www.amexmobile.com/", "title"=>"American Express", "new"=>""), 
    array("url"=>"http://bofa.mobi/", "title"=>"Bank of America", "new"=>""), 
    array("url"=>"http://www.barclays.mobi/", "title"=>"Barclays", "new"=>""), 

The 'url' and 'title' attributes are required, and 'new' is currently unused.

### Travis

This project has a simple Travis CI (continuous integration) [project](https://travis-ci.org/bcantoni/mobile-websites.svg?branch=master) set up to do some minimal testing. At the moment it's checking to make sure all PHP files have valid syntax.

### Docker

For testing locally there is a simple Docker configuration included. The included Dockerfile creates a container using PHP and setting up a configuration which mimics cantoni.mobi.

Scripts:
* `./docker/run` - create the Docker container and start it; the website should be viewable on port 80 from your Docker host
* `./docker/stop` - stop the Docker container and clean up

## License

Copyright (C) 2002-2017 Brian Cantoni. The code and content in this project are licensed under [Creative Commons — Attribution-NonCommercial-ShareAlike 3.0](https://creativecommons.org/licenses/by-nc-sa/3.0/us/).
