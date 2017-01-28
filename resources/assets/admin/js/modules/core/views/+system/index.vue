<template>
    <div>
        <transition mode="out-in"
                    enter-active-class="zoomIn"
                    leave-active-class="zoomOut"
                    appear
        >
            <router-view class="animated"></router-view>
        </transition>
    </div>

</template>

<script>
    import Component from 'vue-class-component'

    @Component
    export default class System {
        created() {

        }
    }
</script>
<style>

</style>
