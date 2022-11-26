<template>
    <div class="box block">
        <article class="message" v-for="status in statuses">
            <div class="message-header">
                <p>{{ status.user.name }} said</p>
                <span>{{postedOn(status)}}</span>
<!--                <button class="delete" aria-label="delete"></button>-->
            </div>
            <div class="message-body" >
<!--                <p>a monent ago</p>-->
                <p v-text="status.body"></p>
            </div>
        </article>
    </div>
</template>

<script>
    import moment from 'moment';
    import Status from "../models/Status";
    export default {
        data(){
            return {
                statuses : []
            }
        },
        created() {
            Status.all()
                .then(({data}) => this.statuses = data)
           // axios.get('/statuses')

        },
        methods : {
            postedOn(status) {
                return  moment(status.created_at).fromNow()
            }

        }
    }
</script>
