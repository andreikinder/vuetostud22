<template>
    <div class="main-carousel">
        <slot></slot>
    </div>
</template>

<script>
    import Flicky from "flickity";
    import "flickity/dist/flickity.min.css";
    export default {
        name: "Carousel",
        props: {
            "wraparound" : {
                default: true
            },
            "autoplay" : {
                default: false
            },
        },
        mounted() {
            new Flicky(this.$el, {
                wrapAround : this.wraparound,
                autoPlay : this.autoplay,
                cellAlign : 'left',
                contain : true
            })
        }
    }
</script>

<style scoped>

</style>
