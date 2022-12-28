<template>
    <a class="navbar-item"
        @mouseover="isActive = true"
        @mouseout="isActive =  false" >
        Series
    </a>

    <portal to="destination">
        <div class="mega_series"
             @mouseover="isActive = true"
             @mouseout="isActive =  false"
             v-show="isActive" >
            <div class="container">
                <p>hello</p>
            </div>
        </div>
    </portal>

</template>

<script>
    export default {
        name: "SeriesDropdown",
        data() {
            return {
                isActive :false
            }
        }
    }
</script>

<style scoped>
    .mega_series{
        padding: 50px;
        color: #fff;
        height: 300px;
        width: 100%;
        background: #2d3748;
        /*margin-top: 100px;*/
        position: absolute;
        /*top: 0;*/
        left: 0;
        right: 0;
        z-index: 1000
    }

</style>
