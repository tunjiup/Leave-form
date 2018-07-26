var socket = require('socket.io'),
	express = require('express'),
	https = require('https'),
	http = require('http'),
	logger = require('winston'),
	fs = require('fs');


logger.remove(new logger.transports.Console);
logger.add(new logger.transports.Console, { colorize: true, timestamp: true});
logger.info('SocketIO > Listening on Port');

var app = express();

/**
* For HTTPS connection
*/
var https_server = https.createServer({
		key: fs.readFileSync('key.key'),
		cert: fs.readFileSync('cert.crt');
	},app).listen(5000);

function emitNewOrder(https_server) {
	
	var io = socket.listen(https_server);

	io.sockets.on('connection', function(socket){

		socket.on("new_employee", function(data) {

			io.emit("new_employee",data);

		});

		socket.on("new_comment", function(data) {

			io.emit("new_comment",data);

		});

		socket.on("offline", function(data) {

			io.emit("offline",data);

		});

		socket.on("online", function(data) {

			io.emit("online",data);

		});

	});
}

emitNewOrder(https_server);