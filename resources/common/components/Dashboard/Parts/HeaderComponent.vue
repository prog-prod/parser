<template>
    <div>
        <header id="page-topbar"></header>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {}
            }
        },
        created() {
            this.user = this.$store.getters.user;
        }
    }
</script>
