<template>
    <div>
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: "Pinned",
        mounted() {
            let el = this.$el
            let elOffset = el.offsetTop

            window.addEventListener('scroll', () => {
                if (window.scrollY >= elOffset ) el.classList.add('is-fixed-top')
                else  el.classList.remove('is-fixed-top')
            })


        },
    }
</script>

<style scoped>

</style>
