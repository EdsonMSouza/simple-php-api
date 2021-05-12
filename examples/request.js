const request = require('request');

const payload = {
    "username": "john",
    "password": "doe"
};

// You can try others methods (see documentation)
var url = 'http://emsapi.esy.es/rest/api/search/';

const options = {
    headers: {
        "content-Type": "application/json",
        "Authorization": "123",
    },
    method: 'POST',
    body: payload,
    json: true,
    url: url
}

request(options, function(error, response, body) {
    console.log('error:', error);
    console.log('statusCode:', response && response.statusCode);
    console.log('body:', body);
});