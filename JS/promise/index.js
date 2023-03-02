( async () => {
    const axios = require('axios')
    const gitHubApi = user => `https://api.github.com/users/${user}/repos`
    const users = ['elvis7t','rmanguinho','otaviolemos']
    
    console.time()
    
    for (const user of users){	
        const res = await axios.get(gitHubApi(user))
        console.log(res.status)
    }
    console.timeEnd()
    })()