# DI Project Submission

### Table of Contents
- [Requirements](#requirements)
- [Setup Steps](#setup-steps)
- [What This Does](#what-this-does)
- [Tools Used](#tools-used)
- [Project Niceties](#project-niceties)
- [Thoughts, Assumptions, Miscellaneous Notes](#thoughts)

## Requirements
- PHP
- Composer
- PHPUnit

## Setup Steps
- clone this repository to your local machine
- cd into `deal-contact`
- run `composer install`
- edit `local.config.php` to match your local settings
- edit `config.php` to match remote server settings, if using on remote server

### Please Note:
By default, class `DatabaseConnect` uses `local.config.php` to connect to a database.
To change this, simple edit the include path in `DatabaseConnect` to include `config.php` instead.

- Use whatever database tool you are comfortable with to run `init.sql` or match its commands manually in a console

Once the above steps have been taken you can run `phpunit` for tests and `php -S 127.0.0.1:9999 -t public` for viewing and using

## What This Does
- Validates and accepts a user’s fullname (required)
- Validates and accepts a user’s email (required)
- Validates and accepts a user’s message (required)
- Validates and accepts a user’s phone (optional)
- Thematically matches provided materials
- Provides response confirmation of contact form submission
- Sends an email to `guy-smiley@example.com` with contact form’s information
- Saves contact form’s information into a provided database
- Passes PHPUnit tests
- Provides a database schema and programmatic methods to build a duplicate database

## Tools Used
- Composer
- PHPMailer
- PHPUnit

## Project Niceties
- accessible titles added to menu navigation links for screen readers
- HTML5 form patterns
- JavaScript used for form submission and success/error communication to user for smoother visual experience
- horizontal layout for larger screens (simple vertical layout for all smaller screens) 

## Thoughts
- [Assumption] - Most humans are dumb (myself included) and can quite easily break forms without validation(s) in place
- [Assumption] - Some humans are script kiddies and try to break forms purposefully. May they fail in their attempts.
- [Thought] - I believe this is a good form. I do not believe it is a perfect form.
- [Notes] - PHPUnit is a tool I unfortunately have little experience with, but holy cow it is a very cool tool I would very much like to know much more fully, and use on a regular basis.