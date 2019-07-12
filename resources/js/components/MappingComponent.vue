<template>
    <div class="container">
        <div class="card">
            <div class="card-body">

                <div class="row" v-for="(fileField, index) in fieldsFromFile">
                    <div class="col">
                        <p>{{ fileField }}</p>
                    </div>
                    <div class="col">
                        <form action="">
                            <div class="form-group">
                                <select name="first_name_map" class="form-control" @change="handleChange($event, index)">
                                    <option value="">Choose</option>
                                    <option v-for="(value, name) in fieldsFromModel"
                                            :value="name"
                                    >
                                        {{ value }}
                                    </option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary" @click="saveMapping">Map Fields and Save</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MappingComponent",

        props: ['fieldsFromFile', 'fieldsFromModel'],

        data() {
            return {
                mapping: []
            };
        },

        created() {
            this.mapping = Array(this.fieldsFromFile.length).fill(null);
        },

        methods: {
            handleChange(event, index) {
                this.mapping[index] = event.target.value || null;
            },

            saveMapping() {
                this.$emit('save', {
                    mapping: this.mapping
                });
            },
        }
    }
</script>

<style scoped>

</style>