# BusinessTour-API
BusinessTour simple API to get basic informations

## Installation
Just clone or download the repository :
```
$ git clone https://github.com/Lil-Pepe/BusinessTour-API
```
When the bot is correctly downloaded, just change the ```xAuthToken``` value in the ```config.js``` to your BusinessTour X-Authentification token (It can be found fith [Fiddler](https://www.telerik.com/fiddler) or another network debug software).

## Usage
- Use ```include 'BusinessTour-API/functions.php'``` or ```require 'BusinessTour-API/functions.php'``` to add the functions to your ```.php``` file.

## Documentation

### getLeaderBoard()
Used to get the game 100 first player included in the leaderboard

### getUserInventory()
Used to get the xAuthToken owner inventory

### getUserData(playFabId)
Used to get the user data of the ```playFabId``` owner

### getTitleNews()
Used to get the last title news

### getFriendsList()
Used to get the friend list of the xAuthToken owner

### getPlayerProfile(playFabId)
Used to get the player profile of the ```playFabId``` owner
