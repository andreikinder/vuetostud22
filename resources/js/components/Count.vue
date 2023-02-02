<template>
    <span class="counter_st">
        {{this.count}}
    </span>
</template>

<script>

    import inViewport  from   'in-viewport';
    export default {
        name: "Count",
        props: ['to'],
        computed : {
          increment() {
              return Math.ceil(this.to / 200 )
          }
        },
        data() {
            return {
                count : 0,
                interval : null
            }
        },
        mounted() {
            inViewport( this.$el, () =>{
                this.interval = setInterval( this.tick, 40 )
            })

        },
        methods: {
            tick(){
                if (this.count + this.increment >= this.to){
                    this.count = this.to
                    return clearInterval()
                }
                return (this.count += this.increment )
            }
        }
    }
</script>

<style scoped>
    .counter_st{
        display: inline-block;
        padding: 8px;
        background: grey;
    }

</style>
