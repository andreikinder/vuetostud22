<template>
    <div style="display: flex">
        <div class="test_mini">
            <div class="test_mini_card"
                 @mouseover="updateTestimonial(testimonial)"
                 @mouseout="clearTimer()"
                 :class="testimonial.id === featured_t.id ?  'border_blue': 'border_none'"

                 v-for="testimonial in testimonials">
            </div>
<!--            @mouseout="clearTimer()"-->
        </div>
        <div class="feaured_card">
            <div class="big_card"></div>
            <h2>{{featured_t.user.name}}</h2>
            <p>{{featured_t.body}}</p>
        </div>
    </div>

</template>

<script>
    import _ from "lodash"
    export default {
        name: "Testimonials",
        data() {
            return {
                testimonials : [],
                featured_t   : {
                    user : {}
                },
                timer: null
            }
        },
        mounted() {
            axios.get('/testimonials')
                .then( response => this.setTest(response))
        },
        methods :{
            setTest(response) {
                this.testimonials = response.data
                this.featured_t =   response.data[0]//this.testimonials[0]
            },
            // updateTestimonial(testimonial){
            //     this.timer =      setTimeout(() => {
            //             this.featured_t = testimonial
            //     }, 200)
            // },

            updateTestimonial: _.debounce(function (testimonial){
                    this.featured_t = testimonial
                }, 2000)

            // clearTimer() {
            //     clearTimeout(this.timer)
            // }
        }
    }
</script>

<style scoped>
    .test_mini {
        display: flex;
        flex-wrap: wrap;
        width: 700px;
        margin-right: 50px;
    }

    .test_mini_card {
        width: 50px;
        height: 50px;
        margin: 15px;
        background: cornflowerblue;
        border-radius: 50%;
    }

    .test_mini_card:hover{
        cursor: pointer;
        border: 5px solid blue;
    }

    .feaured_card{
        width: 400px;
    }

    .border_blue {
        border: 5px solid blue;
    }

    .border_none {
        border: 5px solid transparent;
    }

    .big_card {
        width: 200px;
        height: 200px;
        margin: 15px;
        background: cornflowerblue;
        border-radius: 50%;
    }

</style>
