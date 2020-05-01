<style scoped>
    .comment-block {
        padding: 1rem;
        background-color: #fff;
        display: block;
        width: 100%;
        border-radius: 0.1875rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.08);
    }

    .bottom-comment {
        color: #acb4c2;
        font-size: 0.875rem;
    }

    .comment-date {
        float: left;
    }

    .comment-actions {
        float: right;
    }

    .comment-actions li {
        display: inline;
        cursor: pointer;
    }

    .comment-actions li.complain {
        padding-right: 0.75rem;
        border-right: 1px solid #e1e5eb;
    }

    .comment-actions li.reply {
        padding-left: 0.75rem;
        padding-right: 0.125rem;
    }

    .comment-actions li:hover {
        color: #0095ff;
    }
</style>

<template>
    <div>
        <div class="container">
            <div v-for="(comment,index) in comments" :key="index">
                <div class="comment-block mb-2">
                    <h5>{{comment.user.name}}</h5>
                    <p class="comment-text">{{comment.content}}</p>
                    <div class="bottom-comment">
                        <div class="comment-date">Time</div>
                        <ul class="comment-actions">
                            <li @click="deleteComment(comment.id,index)" class="complain">Delete</li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="pt-2">
                <input @keyup.enter="sendComment()" class="form-control" type="text" placeholder="Comment here"
                       name="comment" v-model="newComment">
                <button @click="sendComment()" class="btn btn-primary mt-2" style="float:right">Submit</button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['post', 'classroom', 'currentuser'],
        data() {
            return {
                newComment: [],
                comments: []
            }

        },
        methods: {
            sendComment() {
                axios.post('/post/' + this.post.id + '/comment/submit', {
                    content: this.newComment
                }).then(response => {
                    this.comments.push({
                        id: response.data.id,
                        user: this.currentuser,
                        content: this.newComment,
                        time: this.getNow()

                    })
                    this.newComment = '';
                })


            },
            getComment() {
                axios.get('/post/' + this.post.id + '/comment').then(response => {
                    this.comments = response.data
                })
            },
            getNow() {
                const today = new Date();
                const date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                const dateTime = date + ' ' + time;
                return dateTime;
            },
            deleteComment(commentid, index) {
                axios.post('/post/' + this.post.id + '/comment/' + commentid + '/delete');
                this.comments.splice(index, 1);
            },

        },
        created() {
            this.getComment();
        }
    }
</script>
