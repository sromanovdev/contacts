<template>

    <div>
        <h1>Contacts</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="contact in contacts" :key="contact.id">
                    <th scope="row">{{ contact.id }}</th>
                    <td>{{ contact.first_name }}</td>
                    <td>{{ contact.last_name }}</td>
                    <td>{{ contact.phone }}</td>
                    <td>{{ contact.email }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
    export default {
        name: "ContactsComponent",

        props: ['contacts'],
    }
</script>

<style scoped>

</style>