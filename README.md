# Overview

This project is a fork of the current 'T3Deploy' in the TER build by 'AOE Media'.

It features the CLI options to run Backend administrator commands, like 'Clear page cache'.

#Requirements

For this tool to run it will need a backend CLI user named '_cli_t3deploy' and a entry in the localconf.php:
	$TYPO3_CONF_VARS['SC_OPTIONS']['GLOBAL']['cliKeys']['t3deploy']['1']= '_CLI_t3deploy';


# Features

| Feature                                                                                          | Status              |
|:-------------------------------------------------------------------------------------------------|:--------------------|
| Clear cache                                                                                      | Done                |
| Clear page cache                                                                                 | Done                |
| Clear tem_CACHED (files)                                                                         | Done                |
| Initialize SOLR Connection                                                                       | To Do               |
| Create tables based on ext_tables.sql                                                            | Done                |

# Quick start
## Usage
To be written...