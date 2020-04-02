# Stone, paper, scissors: the game
SPS game prototype which allows to run different strategies for two players and output results 

Game supports different strategies for players. Strategies are based on rules system.

At the moment only 2 players are supported, but everything can be easily extended for unlimited number of players and items

## Requirements
**Docker** and **Docker Compose** tools must be installed to run application

## Quick start
Clone repository and execute `tools/app` script in project folder

## Installation
* Clone repository `https://github.com/oldinquisitor/sps-game.git`
* Execute `tools/install` script to install **composer** dependencies and build the application

## Testing
Execute `tools/test` script to run tests using **PHPUnit**

## Run
Execute `tools/run` script to run the application

## Tools
To run **composer** commands use `tools/composer` script

## Troubleshooting
Application works as expected in MacOS environment.
 
To run tool scripts in Unix or Windows environment some workaround may be needed (i.e. changing `#!/usr/bin/env bash` header in each script to `#!/bin bash`)
