<template>
    <div class="inbox_msg">
        <div class="inbox_people">
            <div class="headind_srch">
                <div class="recent_heading">
                    <h4>Recent</h4>
                </div>
                <div  class="srch_bar">
                    <div class="stylish-input-group">
                        <input v-model="searchKeyword" @change="search(searchKeyword)" type="text" class="search-bar"  placeholder="Search" >
                        <span class="input-group-addon">
                            <button @click="search(searchKeyword)" type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="inbox_chat" >
                <div v-if="searchKeyword === null">
                    <div v-for="chat in chats">
                        <div class="chat_list" :class="chat.id === chatId ? 'active_chat' : ''">
                            <div v-on:click="fetchMessages(chat.id)"  class="chat_people">
                                <div class="chat_img"> <img :src="chat.receiver_image" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>
                                        {{chat.receiver_name}}
                                        <span class="chat_date">
                                        {{chat.last_message_created_at}}
                                    </span>
                                    </h5>
                                    <p>
                                        {{chat.last_message}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div v-for="admin in admins">
                        <div class="chat_list">
                            <div class="chat_people">
                                <div class="chat_img"> <img :src="admin.image" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>
                                        {{admin.name}}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div  class="mesgs">
            <div v-if="messages.length !== 0">
                <div id="messages" class="msg_history">
                    <div v-for="message in messages.data">
                        <div v-if="message.from_receiver" class="incoming_msg">
                            <div class="incoming_msg_img"> <img :src="message.receiver_image" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>
                                        {{message.message}}
                                    </p>
                                    <span class="time_date">
                                        {{message.created_at}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div v-else class="outgoing_msg">
                            <div class="sent_msg">
                                <p>
                                    {{message.message}}
                                </p>
                                <span class="time_date">
                                   {{message.created_at}}
                                   <span v-if="message.is_seen">
                                    <i style="color:#5abbff" class="fas fa-check"></i> seen
                                   </span>
                                    <span v-else>
                                        <i class="fas fa-check"></i>
                                    </span>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <input v-model="message" @keyup.enter="sendMessage(chatId, message)" type="text" class="write_msg" placeholder="Type a message" />
                        <button @click="sendMessage(chatId, message)" class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="mesgs">
                    No Chat Selected
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    let host = 'http://127.0.0.1:8000';
    export default {
        data() {
          return {
              chats: [],
              chatId: null,
              messages : [],
              message : null,
              searchKeyword: null,
              admins : []
          }
        },
        methods: {
            fetchMessages(chatId) {
                this.chatId = chatId;

                axios.get(`${host}/admin/chats/${chatId}/messages`)
                    .then(response => this.messages = response.data)
                    .catch(error => console.log(error));

                this.scrollDown();
            },
            sendMessage(chatId, message) {
                axios.post(`${host}/admin/chats/sendMessage`, {chatId, message})
                    .then(response => this.messages.data.push((response.data).data))
                    .catch(error => console.log(error));

                this.message = null;

                this.scrollDown();

            },
            search(searchKeyword) {
              axios.post(`${host}/admin/chats/search`, {searchKeyword})
              .then(response => this.admins = (response.data).data )
              .catch(error => console.log(error))
            },
            scrollDown() {
                let container = $("#messages")[0];
                container.scrollTop = container.scrollHeight;
            }
        },
        created () {
            axios.get(`${host}/admin/chats/fetch`)
                .then(response => this.chats = (response.data).data)
                .catch(error => console.log(error));

            Echo.private(`admin.chats.${this.chatId}`)
                .listen('AdminSentMessage', (e) => {
                    this.messages.push(e.message);
                });

        },
    }

</script>
