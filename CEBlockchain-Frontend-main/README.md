# CEBlockchain-Frontend

## Requirements
This was developed using [XAMPP](https://www.apachefriends.org/index.html) to host the server, you may use your preferred php webserver or all-in-one tool. The remote server the frontend connects to must be running valid.

## Installation and setup for deployment
The following will demonstrate the use of XAMPP to get the frontend up and running on the machine that will host the Collaboration Earth website:
1. Download and install XAMPP: [www.apachefriends.org/download.html](https://www.apachefriends.org/download.html),
2. Navigate to the installation folder,
3. Go to the htdocs folder within the XAMPP installation folder,
5. Delete everything in the htdocs folder,
6. Paste all frontend documents into the htdocs folder, ensuring only frontend documents contained in the folder,
8. Run XAMPP, and start the Apache and MySQL service,
9. Go to `localhost` or the frontends web address in your browser to view the site.

![Frontend viewed from browser](https://i.imgur.com/bXtzZCN.jpeg)

### Notes
Currently connects to `https://ce-app-server-dot-stunning-vertex-280807.ts.r.appspot.com/` for server use, to change this, change the variable `$serverAddress` in `./includes/functions.inc.php` to the location of the server which is running `server.js` from the app server.
