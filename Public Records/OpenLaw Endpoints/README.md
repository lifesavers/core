## Introduction

[![Build Status](https://travis-ci.org/compleatang/open-law-end-points.png)](https://travis-ci.org/compleatang/open-law-end-points)

This is a simple repository which i intend to keep a running journal of all the openData API's and Scrapers which relate to legal research. The intention is that it be a machine readable system which the community may add to as necessary. Each data set will be available in both YAML and JSON formats which together should be parse-able and integrate-able by most any modern programming or scripting language.

This is not meant as a comprehensive API documentation system, but rather as a starting point to let machines find the API end point.

### Organization

For now, I'm proposing to create the following folder structure:

    root
      |--legislation
      |   |
      |   |--international_organizations.yaml
      |   |--international_organizations.json
      |   |--states.yaml
      |   |--states.json
      |   |--defacto_states.yaml
      |   |--defacto_states.json
      |   |--sub_states.yaml
      |   |--sub_states.json
      |   |--municipalities.yaml
      |   |--municipalities.json
      |--regulation
      |   |
      |   |--...(same as above)
      |--cases
          |
          |--...(same as above)

### Data Set

The `yaml` files mostly use hashes whereas (obviously) the `json` files use strings. Roughly the data breaks down like this:

(international_organizations)

```yaml
united nations:
  api:
    http://....:
      - xml
      - rdf
  unprocessed:
    http://...:
      schema:
        - http://...
      formats:
        - xml
        - xhtml
        - pcc
        - pdf
      notes:
        - zip files
  scrapers:
    github:
      user/repo:
      python:
        - json
    github:
      user/repo:
        lang:
          -ruby
        formats:
          - xml
world trade organization:
    ...
```

(states)

```yaml
somalia:
  api:
    http://....:
    - xml
    - rdf
  unprocessed:
    http://....:
    - html
    - txt
  scrapers:
    github:
    - user/repo
    - ruby
    - - xml
united states:
  unprocessed:
    http://uscodebeta.house.gov/download/download.shtml:
      notes:
        - zip files
      schema:
        - http://uscodebeta.house.gov/download/resources/schemaandcss.zip
      formats:
        - xml
        - xhtml
        - pcc
        - pdf
    ...
```

(defacto_states)

```yaml
somaliland:
  api:
    http://....:
    - xml
    - rdf
  unprocessed:
    http://....:
    - html
    - txt
  scrapers:
    github:
    - user/repo
    - ruby
    - - xml
western sahara:
  unprocessed:
    http://...:
      notes:
        - zip files
      schema:
        - http://...
      formats:
        - xml
        - xhtml
        - pcc
        - pdf
    ...
```

(sub_states)

```yaml
united states:
  tennessee:
    api:
      http://....:
      - xml
      - rdf
    unprocessed:
      http://....:
      - html
      - txt
    scrapers:
      github:
      - user/repo
      - ruby
      - - xml
  utah:
    unprocessed:
      http://...:
        notes:
          - zip files
        schema:
          - http://...
        formats:
          - xml
          - xhtml
          - pcc
          - pdf
      ...
```

(municipalities)

```yaml
united states:
  tennessee:
    memphis:
      api:
        http://....:
        - xml
        - rdf
      unprocessed:
        http://....:
        - html
        - txt
      scrapers:
        github:
        - user/repo
        - ruby
        - - xml
    nashville:
      unprocessed:
        http://...:
          notes:
            - zip files
          schema:
            - http://...
          formats:
            - xml
            - xhtml
            - pcc
            - pdf
      ...
```

### Notes on Classification

* `international_organizations`: UN treaties, WTO agreements, etc. (I know this is not technically legislation, but it is close enough. If you think treaties deserve their own folder log an issue and I'm happy to talk it through.) ...
* `states`: not states as in the State of Tennessee, states as in members of the UN General Assembly. Rigidly defined to members.
* `defacto_states`: operate like a state but not member of the UNGA. I work in a *defacto* state, or non-recognized state, or whatever one may want to call it. It does not fit the other criteria.
* `sub_states`: State of Tennessee, Province of Alberta, Scotland, ...
* `municipalities`: municipal codes, to the extent they exist, ...

### Using

Simply require the document you need straight from the repo; in ruby you would do:

```ruby
require 'open-uri'
require 'yaml'
url = 'https://raw.github.com/compleatang/open-law-end-points/master/legislation/states.yaml'
source = YAML.load(open( URI.escape( url ) ))
```

or, if you wanted the JSON

```ruby
require 'open-uri'
require 'json'
url = 'https://raw.github.com/compleatang/open-law-end-points/master/legislation/states.json'
source = JSON.load(open( URI.escape( url ) ))
```

and you're ready to go with an updated list of the APIs end points.

### Roadmap / Todo

If you have some ideas here, I'd love to hear them; even better if you make a pull request! I'd ask if you were going to mess with the data set that you do it on a branch and update the specs appropriately -- if that is needed. Note, there are no symbols in the YAML definition above because it will be a nightmare digging deep into the hashes and doing to_s replacements, unless some wants to code that which I'd be happy about.

- [ ] The files should probably be smarter than they currently are and incorporate ISO codes, airport codes, or some other non-ambiguous machine readable signal. If you agree, feel free to send a pull request!
- [ ] At this time they do not enforce any particular data set but do enforce harmony between the yamls and jsons only. Down the road I am proposing (to myself) to enforce more rigidity within the data set, but as this is very early it seems that is probably a waste of time. Right now, the script that runs on testing will sort based on the highest level string (e.g., state name for the states files).
- [ ] Another thing that should probably be built into the data set is a link to the schema used within the jurisdiction. This is particularly important for the various (and somewhat competing) xml markup formats.

## Contributing

Please do!

1. Fork it.
2. Add what you know; add to yaml or json as you prefer.
3. Run the ruby script so that the repo will build the yaml or json collateral file which you did not fill in. If you don't work with ruby on your system, you can go ahead and skip this step but please just let me know that in the pull request so I know to run the script and specs before I merge.
3a. Interested to participate but don't even know what `git` or `ruby` is? No problem. Just click [here](http://prose.io/#compleatang/open-law-end-points), find the file you want to add something do, add it, and I can take care of the rest! Thanks!!!!!!
4. Send a pull request.

### License

Public Domain - unlicensed.