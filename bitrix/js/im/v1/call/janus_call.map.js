{"version":3,"sources":["janus_call.js"],"names":["BX","namespace","janus","ajaxActions","invite","cancel","answer","decline","hangup","ping","Call","JanusCall","params","this","superclass","constructor","apply","arguments","roomId","server","apiSecret","isJanusInited","isJanusConnected","publishers","main","screen","signaling","Signaling","call","peers","initPeers","extend","AbstractCall","prototype","self","i","users","length","userId","Peer","onStreamReceived","e","console","log","runCallback","onStreamRemoved","onStateChanged","__onPeerStateChanged","bind","inviteUsers","userIds","type","isArray","initJanus","then","connect","publishStream","catch","error","sendAnswer","sendDecline","destroy","publisherTag","sendHangup","tag","result","Promise","reject","Error","localStreams","Publisher","stream","onPublished","state","resolve","onPublishersUpdated","_onPublishersUpdated","onDestroyed","_onPublisherDestroyed","onError","Janus","init","debug","callback","apisecret","success","destroyed","publisher","isNotEmptyString","display","substr","parseInt","attachFeed","id","UserState","Failed","isAnyoneParticipating","isParticipating","config","mediaState","video","audio","webrtcState","callbacks","onAttached","isFunction","DoNothing","onDetached","onRoomJoined","onRoomLeft","onPublisherLeft","onWebrtcState","pluginHandle","localStream","attach","plugin","consentDialog","media","hasOwnProperty","target","onmessage","onMessage","onlocalstream","onremotestream","oncleanup","ondetached","getPlugin","getId","joinRoom","errorCode","request","room","ptype","send","message","data","createOffer","audioRecv","videoRecv","audioSend","videoSend","jsep","unpublishStream","changeStream","setTimeout","msg","event","undefined","handlers","joined","onMessageJoinedRoom","onMessageRoomDestroyed","leaving","onMessagePublisherLeaving","unpublished","onMessagePublisherLeft","onMessageError","handleRemoteJsep","myid","detach","signalingConnected","ready","declined","calculatedState","Idle","feeds","feedId","Feed","_onStreamReceived","_onStreamRemoved","updateCalculatedState","calculateState","previousState","Calling","Declined","push","Ready","Connected","Connecting","failed","connectionTag","onRemoteStream","JSON","stringify","createAnswer","body","feed","__runAjaxAction","signalName","isPlainObject","callId","callInstanceId","instanceId","requestId","CallEngine","getUuidv4","ajax","runAction"],"mappings":"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","file":"janus_call.map.js"}