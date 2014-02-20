var messenger={
	init : function(){
		this.io = require('socket.io').listen(8080);
		this.users = [];
		this.io.sockets.on('connection',this.listen);
	},
	listen : function(socket){
		socket.on('connect',function(datas){
			messenger.users[datas.user]=this.id;
			socket.emit('connected',this.id); 
		});
		socket.on('message',function(datas){
			messenger.io.sockets.socket(messenger.users[datas.to]).emit('message',datas);
		});
	},
	
}
messenger.init();
