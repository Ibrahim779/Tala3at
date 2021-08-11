<template>
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
                    <input v-model="message" @keyup.enter="sendMessage(message)" type="text" class="write_msg" placeholder="Type a message" />
                    <button @click="sendMessage(message)" class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <div v-else>
            <div class="mesgs">
                No Chat Selected
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    let host = 'http://127.0.0.1:8000';
    export default {
        props: {
            chatId
        },
        data() {
            return {
                messages : [],
                message : null,
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
            scrollDown() {
                let container = $("#messages")[0];
                container.scrollTop = container.scrollHeight;
            }
        },
        created () {
            this.fetchMessages();

            Echo.private(`admin.chats`)
                .listen('AdminSentMessage', (e) => {
                    this.messages.push(e.message);
                });
        },
    }
</script>
