# Web Development - Final Project

This is the repository of the final project in the Web Development course I'm following in the Polytechnic University of Tirana while studying Computer Engineering.

## What's Included
The software included in the virtual environment is:
- Apache2 webserver, with `php5_mod` enabled
- MySQL, with username `root` and password `jesuismysql`
- PHP 5.5.9

## Set Up the Development Environment
**Prerequisites:**
- Virtual Box, or similar VM manager
- [Vagrant](http://vagrantup.com/)
- Ruby and [Bundler](http://bundler.io/)

**Step 1**: Grab the Ruby Gems listed in the `Gemfile`. Run this in the terminal:

> You don't have to type the dollar sign; that's a placeholder for the Terminal prompt

```bash
$ bundle install
```

**Step 2**: Obtain Chef cookbooks. Run this in the terminal:

```bash
$ librarian-chef install
```

The above will download the necessary cookbooks, which are:
- [apache2](https://supermarket.chef.io/cookbooks/apache2)
- [mysql](https://supermarket.chef.io/cookbooks/mysql)
- [php](https://supermarket.chef.io/cookbooks/php)

**Step 3**: Create the Virtual Machine
Run this in the terminal:

```bash
$ vagrant up
```

This will download Ubuntu Trusty Tahr (64 bit) and will provision it with the necessary software, creating the LAMP stack.

**Step 4**: Edit your `hosts` file. Add the "domains" to the hosts file on your machine! The hosts file will redirect your requests into the virtual environment. On Mac and Linux, this file is located at `/etc/hosts`. On Windows, it is located at `C:\Windows\System32\drivers\etc\hosts`. The lines you add to this file will look like the following:

```
192.168.33.10  uptweb.dev www.uptweb.dev
```

Once you have added the domain to your hosts file, you can access the site via your web browser at [http://uptweb.dev/](http://uptweb.dev/).

To connect to the MySQL terminal, execute:

```bash
$ mysql -S /var/run/mysql-default/mysqld.sock -uroot -pjesuismysql
```
