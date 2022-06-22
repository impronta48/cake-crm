<template>
    <div class="container clearfix">
        <notifications group="default" position="bottom right" :width="400" />
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        components: {
        }
    }
</script>