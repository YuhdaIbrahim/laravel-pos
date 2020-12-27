<template>
    <div class="footer">
        <button @click="setCancel(id)" class="btn-cancel">Cancel</button>
        <button @click="setSuccess(id)" class="btn-finish">Finish</button>
    </div>
</template>

<script>
    export default {
        name: "Footer",
        props: {
            setCancel: Function,
            setSuccess: Function,
            id: String,
        }
    }
</script>

<style scoped>

</style>
