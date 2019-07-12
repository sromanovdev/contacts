<template>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>{{ count }} new Contacts was added.</p>
        <hr>
        <p class="mb-0">
            <a href="/contacts">Contacts List</a>
        </p>
    </div>
</template>

<script>
    export default {
        name: "Alert",
        props: ['count'],
    }
</script>

<style scoped>

</style>