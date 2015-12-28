# Web Development - Final Project
This is the repository of the final project in the Web Development course I'm following in the Polytechnic University of Tirana while studying Computer Engineering.

## Set Up the Environment
The application uses the [Scotchbox](http://box.scotch.io/) Virtual Machine as development environment. To set it up, you need to have [VirtualBox](https://www.virtualbox.org/wiki/Downloads) and [Vagrant](http://vagrantup.com/) installed.

To create the VM execute:
```bash
$ vagrant up
```

> It might require some time to set up the VM the first time, since it needs to download Ubuntu and provision it with all the tools, but this happens only the first time. When you reuse the same VM, it won' donwload anything.

The environment created contains Apache2 webserver, PHP 5.6, MySQL 5.5, and other tools (you can find the complete list [here]((http://box.scotch.io/)).

To log in the VM, execute:

```bash
$ vagrant ssh     # you can exit by typing exit
```

## Create the database
![DB schema](https://raw.githubusercontent.com/aziflaj/upt-web-dev/master/docs/eer_diagram.png)

The MySQL database schema shown above is created using [MySQL Workbench](https://www.mysql.com/products/workbench/). You can access the Workbench generated files in the `docs/` directory. You can create the database by running the [`work_portal.sql`](https://github.com/aziflaj/upt-web-dev/blob/master/work_portal.sql) file.

## License
<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br />This work by <a xmlns:cc="http://creativecommons.org/ns#" href="http://aziflaj.github.io/" property="cc:attributionName" rel="cc:attributionURL">Aldo Ziflaj</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License</a>.
