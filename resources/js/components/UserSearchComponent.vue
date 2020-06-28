<template>
    <div class="container">
        <div class="columns is-multiline">

            <div class="column is-4">

                <div class="columns">
                    <div class="column">
                        <h3>Search for Mixer User Streams</h3>
                        <form @submit.prevent="searchUser">
                            <div class="field">
                              <div class="control">
                                <input class="input mb-4" type="text" placeholder="Mixer Handle" v-model="user">
                                <button class="button search is-primary is-pulled-right ">Search</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="columns user-details is-mobile">
                    <div class="column is-4">
                        <img v-bind:src="avatar" />
                    </div>
                    <div class="column">
                        <p v-if="username"><span class="info-title">Handle</span> {{ username }}</p>
                        <p v-if="followers"><span class="info-title">Followers</span> {{ followers }}</p>
                        <p v-if="online"><span class="info-title">Online</span> {{ online }}</p>
                    </div>
                </div>
                

            </div>


            <div class="column is-4 is-offset-2">
                 <div class="videos">
                    <h3 v-if="videos.length>0">Latest Streams</h3>
                     <ul class="stream-links">
                      <li v-for="video in videos">
                        <a :href="video.url">{{ video.name }}</a>
                      </li>
                    </ul>
                 </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        
        data(){
            return {
              user: '',
              username: '',
              followers: '',
              online: '',
              avatar: '',
              videos: [],
              error: ''
            }
        },
        methods: {
            searchUser(){


                document.querySelector('.control').classList.add('is-loading')

                let vm = this

                axios.get('https://mixer.com/api/v1/channels/'+this.user)
                  .then(function (response) {
                    // handle success

                    console.log(response)
           
                    vm.getStreams(response.data.id)
                    vm.username = response.data.user.username
                    vm.avatar = response.data.user.avatarUrl
                    vm.followers = response.data.numFollowers
                    vm.online = response.data.online ? 'Yes' : 'No'
                  })
                  .catch(function (error) {
                    // handle error
                    document.querySelector('.control').classList.remove('is-loading')

                  })
                  .finally(function () {
                  });

            },
            getStreams(channelId)
            {
                let vm = this
                this.videos = []

                axios.get('https://mixer.com/api/v1/channels/'+channelId+'/recordings',
                {
                    params: {
                    order :  'createdAt:DESC',
                    limit :   8
                    }
                })
                .then(function (response) {

                       let vids = response.data

                       vids.forEach(function (item) {
                          //console.log(item)
                          if(item.vods.length > 0)
                            {
                                let vid = { 'url' : item.vods[0].baseUrl, 'name' : item.name  } 
                                vm.videos.push(vid)
                            }
                        });
                
                      })
                .catch(function (error) {
                        // handle error
                        document.querySelector('.control').classList.remove('is-loading')
                      })
                .finally(function () {
                       document.querySelector('.control').classList.remove('is-loading')
                      });
            }
        },
        
    }
</script>