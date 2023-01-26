<template>
    <div>
        <accordion-item
            v-for="(item, index) in items"
            :key="index"
            :item="item"
            :is-open="activeIndex == index"
            @toggled="onToggle" >

        </accordion-item>
    </div>

</template>

<script>
    import AccordionItem from "./AccordionItem"
    export default {
        components: {
            AccordionItem
        },
        props: ['items'],
        methods : {
          onToggle(index) {

              if ( this.activeIndex == index) {
                 return ( this.activeIndex = null )
              }
              this.activeIndex = index
              //console.log('the acc-item with index' + index)
          }
        },
        data() {
            return {
                activeIndex : null
            };
        }
    };
</script>
