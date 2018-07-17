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
var http_server = http.createServer(app).listen(5001);

/**
* For HTTPS connection
*/
/*var https_server = https.createServer({
		key: fs.readFileSync('key.key'),
		cert: fs.readFileSync('cert.crt');
	},app).listen(5000);*/

function emitNewOrder(http_server) {
	
	var io = socket.listen(http_server);

	io.sockets.on('connection', function(socket){

		socket.on("new_employee", function(data) {

			io.emit("new_employee",data);

		});

		socket.on("new_comment", function(data) {

			io.emit("new_comment",data);

		});

	});
}

//emitNewOrder(https_server);
emitNewOrder(http_server);