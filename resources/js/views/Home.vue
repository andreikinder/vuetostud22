<template>
    <div class="box block">

        <menu-list :items="['one', 'two','three']">
            <template  v-slot="props" >
                <h2 v-text="props.item"></h2>
            </template>

        </menu-list>

        <carousel :autoplay="true">
            <div class="carousel-cell">
                <img src="http://placekitten.com/g/800/300?v=1" alt="">
            </div>
            <div class="carousel-cell">
                <img src="http://placekitten.com/g/800/300?v=2" alt="">
            </div>
            <div class="carousel-cell">
                <img src="http://placekitten.com/g/800/300?v=3" alt="">
            </div>
            <div class="carousel-cell">
                <img src="http://placekitten.com/g/800/300?v=4" alt="">
            </div>
        </carousel>

        <add-to-stream @completed="addStatus"></add-to-stream>

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
    import AddToStream from "../components/AddToStream";
    import MenuList from "../components/MenuList";
    import Carousel from "../components/Carousel";
    export default {
        components : {MenuList, AddToStream, Carousel},
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
            },

            addStatus(status) {
                this.statuses.unshift(status)
                alert('your status has been added to the stream')

                window.scrollTo(0, 0)
            }

        }
    }
</script>
