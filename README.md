# Pedometer
Insert and track your daily steps

### Installation

Download or clone the project via git cli

```sh
$ git clone git@github.com:zagzter/pedometer.git
```

### Configuration

First create your database (default name: pedometer) and add the following database structure:

```sh
CREATE TABLE IF NOT EXISTS `steps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `step_date` date NOT NULL,
  `steps` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`step_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
```
### Files you Need to Modify
| Edit | Path |
| ------ | ------ |
| 1) Database | application/config/database.php |
| 2) App Config | application/config/config.php |
| 3) Htaccess | .htaccess |

1) Set up Database Credentials
2) Set up Application's Base Url
3) Check the RewriteBase (default is /pedometer)