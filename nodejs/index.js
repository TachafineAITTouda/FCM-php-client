const axios = require('axios');
require('dotenv').config()

const data = JSON.stringify({
  "notification": {
    "title": "Your Title",
    "body": "Your Text",
    "click_action": "OPEN_ACTIVITY_1"
  },
  "data": {
    "keyname": "any value you want to send and you can get it from the activity parameters"
  },
  "registration_ids": [
    "diz-7I0LRYSbj79270C65M:APA91bGNaRwNKsw2XqqPseACLrEQXgDMa5A2S3DdM5PxrcgRUqCtnkvIukLCXf0NGxM4ME3dVihHp63GBWSDByGqhggO3zzwreQydIY95pjJ1xFwniQhRmjfIMW-LoH1USkUePLspLTr"
  ]
});

const config = {
  method: 'post',
  url: 'https://fcm.googleapis.com/fcm/send',
  headers: { 
    'Authorization': 'key='+process.env.FIREBASE_CLOUD_MESSAGING_SERVICE_TOKEN+'\t', 
    'Content-Type': 'application/json'
  },
  data : data
};

axios(config)
.then(function (response) {
  console.log(JSON.stringify(response.data));
})
.catch(function (error) {
  console.log(error);
});