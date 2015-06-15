# Flat File Menu's

A Wordpress plugin to create flat file menu's

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/undefinedio/flat-menu/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/undefinedio/flat-menu/?branch=develop)

## How to use

Create a folder in your themes folder called `menu`. For each menu add a json file. This is an example json File:

```
{
    "name": "main",
    "menu": [
        {
            "title": "Home",
            "pageId": 4
        },
        {
            "title": "About",
            "pageId": 7
        }
    ]
}
```