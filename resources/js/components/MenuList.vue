<template>
    <div >
        <ul>
            <li v-for="item in items" >
                <slot :item="item">{{item}}</slot>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "MenuList",
        props : ['items']
    }
</script>
