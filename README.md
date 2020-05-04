# Stone, paper, scissors: the game
SPS game prototype which allows to run multiple rounds for two players and output results: https://en.wikipedia.org/wiki/Rock_paper_scissors

Game supports different strategies for the players. Strategies are based on rules system. Rules, strategies, player titles and rounds quantity are predefined

At the moment only two players are supported, but everything can be easily extended for unlimited number of players and items

Some kind of test task which shows developer skills: SOLID, different design patterns, unit testing, DI container via YAML files with service descriptions, docker environment, documentation, PSR etc.

## Requirements
**Docker** and **Docker Compose** tools must be installed to run an application

## Quick start
Clone repository and execute `docker/start.sh` script in project folder. This action does the following:
* Build the application
* Install composer dependencies
* Run unit tests
* Run the application

## Installation
* Clone repository `https://github.com/oldinquisitor/sps-game.git`
* Execute `docker/build.sh` script to build the application

## Testing
Execute `docker/run.sh test` command to run tests using **PHPUnit**

## Run
Execute `docker/run.sh app` command to run the application (make sure that application is already built and service is run)

## Tools
To install **composer** dependencies execute `docker/run.sh dep` command

## Troubleshooting
Application works as expected in Unix environment
 
To run tool scripts in MacOS or Windows environment some workaround may be necessary (i.e. changing `#!/bin/bash` header in each tool script)
