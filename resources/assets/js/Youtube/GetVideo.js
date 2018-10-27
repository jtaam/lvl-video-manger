let axios = require('axios');
let BASE_URL = 'https://www.googleapis.com/youtube/v3/videos';

module.exports = function (options, callback) {
    if (!options.apiKey) {
        throw new Error('Youtube search require a key');
    }

    let params = {
        part: 'snippet',
        key: options.apiKey,
        id:options.videoId,
        type: 'video'
    };

    axios.get(BASE_URL, {params})
        .then(response => {
            // console.log('search response', response);
            if (callback){callback(response.data.items)}
        })
        .catch(error => console.error(error));
}