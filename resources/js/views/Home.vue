<template>

    <div class="box block">

        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item">
                            <img src="https://bulma.io/images/bulma-type-white.png" alt="Logo">
                        </a>
                        <span class="navbar-burger" data-target="navbarMenuHeroA">
            <span></span>
            <span></span>
            <span></span>
          </span>
                    </div>
                    <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-end">
                            <a class="navbar-item is-active">
                                Home
                            </a>
                            <series-dropdown></series-dropdown>
                            <a class="navbar-item">
                                Documentation
                            </a>
                            <span class="navbar-item">
              <a class="button is-primary is-inverted">
                <span class="icon">
                  <i class="fab fa-github"></i>
                </span>
                <span>Download</span>
              </a>
            </span>
                        </div>
                    </div>
                </div>
            </nav>

        </div>
        <portal-target name="destination">
        </portal-target>

        <menu-list :items="['one', 'two','three']">
            <template  v-slot="props" >
                <h2 v-text="props.item"></h2>
            </template>

        </menu-list>

        <testimonials></testimonials>

        <ul style="margin: 100px 0; display: flex; justify-content: space-between; background: skyblue; padding: 100pxs">
            <li><a href="#">home</a></li>
            <li><a href="#">about</a></li>
            <support-button></support-button>
        </ul>

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
    import Testimonials from "../components/Testimonials";
    import SeriesDropdown from "../../js/components/SeriesDropdown";
    import SupportButton from "../components/SupportButton";
    export default {
        components : {SupportButton, MenuList, AddToStream, Carousel, Testimonials, SeriesDropdown},
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
