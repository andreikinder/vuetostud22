<template>
    <div>
        <div ref="body" v-show="false">
            <slot></slot>
        </div>
    </div>

</template>

<script>

    import tippy from 'tippy.js';
    export default {
        name: "Tooltip",
        props: {
            name: {},
            placement: {default : top}
        },
        mounted() {
            document.querySelectorAll(`[data-tooltip-name=${this.name}]`)
            .forEach(el => {
                tippy(el, {
                    content: this.$refs.body.innerHTML,
                    allowHTML: true,
                    placement: this.placement
                });
            })
        }
    }
</script>

<style scoped>

</style>
